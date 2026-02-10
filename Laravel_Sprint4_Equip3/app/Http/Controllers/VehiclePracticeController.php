<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VehiclePractice;
use Illuminate\Http\Request;

class VehiclePracticeController extends Controller
{
    // GET /api/v1/vehicles-practice - Listar todos
    public function index()
    {
        $vehicles = VehiclePractice::all();
        return response()->json($vehicles, 200);
    }

    // POST /api/v1/vehicles-practice - Crear nuevo
    public function store(Request $request)
    {
        $validated = $request->validate([
            'license_plate' => 'required|string|unique:vehicles_practice',
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|string',
            'color' => 'nullable|string',
            'status' => 'required|in:available,rented,maintenance,out_of_service',
            'current_latitude' => 'nullable|numeric',
            'current_longitude' => 'nullable|numeric',
            'battery_level' => 'nullable|integer|min:0|max:100',
            'range_km' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $vehicle = VehiclePractice::create($validated);
        return response()->json($vehicle, 201);
    }

    // GET /api/v1/vehicles-practice/{id} - Ver uno específico
    public function show($id)
    {
        $vehicle = VehiclePractice::findOrFail($id);
        return response()->json($vehicle, 200);
    }

    // PUT/PATCH /api/v1/vehicles-practice/{id} - Actualizar
    public function update(Request $request, $id)
    {
        $vehicle = VehiclePractice::findOrFail($id);

        $validated = $request->validate([
            'license_plate' => 'sometimes|string|unique:vehicles_practice,license_plate,' . $id . ',vehicle_id',
            'brand' => 'sometimes|string',
            'model' => 'sometimes|string',
            'year' => 'sometimes|string',
            'color' => 'nullable|string',
            'status' => 'sometimes|in:available,rented,maintenance,out_of_service',
            'current_latitude' => 'nullable|numeric',
            'current_longitude' => 'nullable|numeric',
            'battery_level' => 'nullable|integer|min:0|max:100',
            'range_km' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $vehicle->update($validated);
        return response()->json($vehicle, 200);
    }

    // DELETE /api/v1/vehicles-practice/{id} - Eliminar
    public function destroy($id)
    {
        $vehicle = VehiclePractice::findOrFail($id);
        $vehicle->delete();
        return response()->json(['message' => 'Vehicle deleted successfully'], 200);
    }

    // PATCH /api/v1/vehicles-practice/{id}/location - Actualizar ubicación
    public function updateLocation(Request $request, $id)
    {
        $vehicle = VehiclePractice::findOrFail($id);

        $validated = $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $vehicle->update([
            'current_latitude' => $validated['latitude'],
            'current_longitude' => $validated['longitude'],
            'last_location_update' => now(),
        ]);

        return response()->json($vehicle, 200);
    }
}