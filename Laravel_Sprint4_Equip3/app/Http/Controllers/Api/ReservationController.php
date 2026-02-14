<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::with(['user', 'vehicle'])->get();
        return response()->json($reservations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,vehicle_id',
            'start_date' => 'required|date|after:now',
            'end_date' => 'required|date|after:start_date',
            'pickup_location' => 'nullable|string|max:255',
            'dropoff_location' => 'nullable|string|max:255',
        ]);

        // Verificar disponibilitat del vehicle
        $isAvailable = $this->checkVehicleAvailability(
            $validated['vehicle_id'],
            $validated['start_date'],
            $validated['end_date']
        );

        if (!$isAvailable) {
            return response()->json([
                'message' => 'El vehicle no està disponible per aquestes dates'
            ], 422);
        }

        // Calcular cost total (exemple: €10/hora)
        $start = Carbon::parse($validated['start_date']);
        $end = Carbon::parse($validated['end_date']);
        $hours = $start->diffInHours($end);
        $totalCost = $hours * 10; // €10 per hora

        $reservation = Reservation::create([
            'user_id' => Auth::id(),
            'vehicle_id' => $validated['vehicle_id'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'pickup_location' => $validated['pickup_location'] ?? null,
            'dropoff_location' => $validated['dropoff_location'] ?? null,
            'status' => 'pending',
            'total_cost' => $totalCost,
        ]);
        
        return response()->json($reservation->load(['user', 'vehicle']), 201);
    }

    /**
     * Check if vehicle is available for given dates
     */
    private function checkVehicleAvailability($vehicleId, $startDate, $endDate)
    {
        $overlappingReservations = Reservation::where('vehicle_id', $vehicleId)
            ->whereIn('status', ['pending', 'active'])
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate])
                    ->orWhereBetween('end_date', [$startDate, $endDate])
                    ->orWhere(function ($q) use ($startDate, $endDate) {
                        $q->where('start_date', '<=', $startDate)
                          ->where('end_date', '>=', $endDate);
                    });
            })
            ->exists();

        return !$overlappingReservations;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reservation = Reservation::with(['user', 'vehicle', 'tickets'])->findOrFail($id);
        return response()->json($reservation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reservation = Reservation::findOrFail($id);
        
        $validated = $request->validate([
            'user_id' => 'sometimes|exists:users,user_id',
            'vehicle_id' => 'sometimes|exists:vehicles,vehicle_id',
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|date|after:start_date',
            'pickup_location' => 'nullable|string|max:255',
            'dropoff_location' => 'nullable|string|max:255',
            'status' => 'sometimes|string|in:pending,active,completed,cancelled',
            'total_cost' => 'nullable|numeric|min:0',
        ]);

        $reservation->update($validated);
        
        return response()->json($reservation->load(['user', 'vehicle']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        
        return response()->json(['message' => 'Reserva eliminada correctamente'], 200);
    }

    /**
     * Get reservations by user.
     */
    public function byUser(string $userId)
    {
        $reservations = Reservation::where('user_id', $userId)
            ->with(['vehicle'])
            ->orderBy('start_date', 'desc')
            ->get();
        
        return response()->json($reservations);
    }

    /**
     * Get reservations for authenticated user.
     */
    public function myReservations()
    {
        $reservations = Reservation::where('user_id', Auth::id())
            ->with(['vehicle'])
            ->orderBy('start_date', 'desc')
            ->get();
        
        return response()->json($reservations);
    }

    /**
     * Generate QR code for unlocking vehicle.
     */
    public function generateQR(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        
        // Verificar que la reserva pertany a l'usuari autenticat
        if ($reservation->user_id !== Auth::id()) {
            return response()->json(['message' => 'No autoritzat'], 403);
        }

        // Verificar que la reserva està activa
        if ($reservation->status !== 'active') {
            return response()->json([
                'message' => 'La reserva ha d\'estar activa per generar el QR'
            ], 422);
        }

        // Dades per al QR (encriptades)
        $qrData = [
            'reservation_id' => $reservation->reservation_id,
            'vehicle_id' => $reservation->vehicle_id,
            'user_id' => $reservation->user_id,
            'expires_at' => Carbon::now()->addHours(2)->toDateTimeString(),
            'token' => bin2hex(random_bytes(16))
        ];

        $encryptedData = Crypt::encryptString(json_encode($qrData));
        
        // Generar QR code en format SVG
        $qrCode = QrCode::size(300)
            ->style('round')
            ->eye('circle')
            ->gradient(16, 185, 129, 20, 184, 166, 'diagonal')
            ->margin(1)
            ->generate($encryptedData);

        return response()->json([
            'qr_code' => base64_encode($qrCode),
            'format' => 'svg',
            'expires_at' => $qrData['expires_at'],
            'reservation' => $reservation->load('vehicle')
        ]);
    }

    /**
     * Verify QR code and unlock vehicle.
     */
    public function verifyQR(Request $request)
    {
        $validated = $request->validate([
            'qr_data' => 'required|string',
        ]);

        try {
            $decrypted = Crypt::decryptString($validated['qr_data']);
            $qrData = json_decode($decrypted, true);

            // Verificar expiració
            if (Carbon::parse($qrData['expires_at'])->isPast()) {
                return response()->json(['message' => 'QR code expirat'], 422);
            }

            // Verificar reserva
            $reservation = Reservation::find($qrData['reservation_id']);
            if (!$reservation || $reservation->status !== 'active') {
                return response()->json(['message' => 'Reserva no vàlida'], 422);
            }

            return response()->json([
                'message' => 'Vehicle desbloquejat correctament',
                'vehicle_id' => $qrData['vehicle_id'],
                'reservation' => $reservation
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'QR code invàlid'], 422);
        }
    }

    /**
     * Update reservation status.
     */
    public function updateStatus(Request $request, string $id)
    {
        $reservation = Reservation::findOrFail($id);
        
        $validated = $request->validate([
            'status' => 'required|string|in:pending,active,completed,cancelled',
        ]);

        $reservation->update($validated);
        
        return response()->json($reservation);
    }
}
