<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::with(['reservations'])->get();
        return response()->json($vehicles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'license_plate' => 'required|string|max:20|unique:vehicles,license_plate',
            'brand' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'year' => 'nullable|integer|min:1900|max:2100',
            'color' => 'nullable|string|max:50',
            'status' => 'nullable|string|in:available,reserved,maintenance,inactive',
            'current_latitude' => 'nullable|numeric|between:-90,90',
            'current_longitude' => 'nullable|numeric|between:-180,180',
        ]);

        $vehicle = Vehicle::create($validated);
        
        return response()->json($vehicle, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vehicle = Vehicle::with(['reservations', 'tickets'])->findOrFail($id);
        return response()->json($vehicle);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        
        $validated = $request->validate([
            'license_plate' => 'sometimes|string|max:20|unique:vehicles,license_plate,' . $id . ',vehicle_id',
            'brand' => 'sometimes|string|max:100',
            'model' => 'sometimes|string|max:100',
            'year' => 'nullable|integer|min:1900|max:2100',
            'color' => 'nullable|string|max:50',
            'status' => 'sometimes|string|in:available,reserved,maintenance,inactive',
            'current_latitude' => 'nullable|numeric|between:-90,90',
            'current_longitude' => 'nullable|numeric|between:-180,180',
        ]);

        $vehicle->update($validated);
        
        return response()->json($vehicle);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        
        return response()->json(['message' => 'Vehículo eliminado correctamente'], 200);
    }

    /**
     * Get reservations for a specific vehicle.
     */
    public function reservations(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $reservations = $vehicle->reservations()->with('user')->get();
        
        return response()->json($reservations);
    }

    /**
     * Update vehicle location.
     */
    public function updateLocation(Request $request, string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        
        $validated = $request->validate([
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ]);

        $vehicle->update([
            'current_latitude' => $validated['latitude'],
            'current_longitude' => $validated['longitude'],
            'last_location_update' => now(),
        ]);
        
        return response()->json($vehicle);
    }

    /**
     * Get available vehicles for given dates.
     */
    public function available(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $startDate = $validated['start_date'];
        $endDate = $validated['end_date'];

        // Obtenir IDs de vehicles amb reserves solapades
        $reservedVehicleIds = Reservation::whereIn('status', ['pending', 'active'])
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate])
                    ->orWhereBetween('end_date', [$startDate, $endDate])
                    ->orWhere(function ($q) use ($startDate, $endDate) {
                        $q->where('start_date', '<=', $startDate)
                          ->where('end_date', '>=', $endDate);
                    });
            })
            ->pluck('vehicle_id')
            ->toArray();

        // Vehicles disponibles
        $availableVehicles = Vehicle::whereNotIn('vehicle_id', $reservedVehicleIds)
            ->where('status', 'available')
            ->get();

        return response()->json([
            'available_vehicles' => $availableVehicles,
            'count' => $availableVehicles->count(),
            'date_range' => [
                'start' => $startDate,
                'end' => $endDate
            ]
        ]);
    }

    /**
     * Get calendar of reservations for a vehicle.
     */
    public function calendar(Request $request, string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        
        $month = $request->input('month', Carbon::now()->month);
        $year = $request->input('year', Carbon::now()->year);

        $startOfMonth = Carbon::create($year, $month, 1)->startOfMonth();
        $endOfMonth = Carbon::create($year, $month, 1)->endOfMonth();

        $reservations = Reservation::where('vehicle_id', $id)
            ->whereIn('status', ['pending', 'active', 'completed'])
            ->where(function ($query) use ($startOfMonth, $endOfMonth) {
                $query->whereBetween('start_date', [$startOfMonth, $endOfMonth])
                    ->orWhereBetween('end_date', [$startOfMonth, $endOfMonth])
                    ->orWhere(function ($q) use ($startOfMonth, $endOfMonth) {
                        $q->where('start_date', '<=', $startOfMonth)
                          ->where('end_date', '>=', $endOfMonth);
                    });
            })
            ->with('user:user_id,name,email')
            ->get();

        return response()->json([
            'vehicle' => $vehicle,
            'month' => $month,
            'year' => $year,
            'reservations' => $reservations
        ]);
    }
}
