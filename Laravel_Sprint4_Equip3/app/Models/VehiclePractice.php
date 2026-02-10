<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehiclePractice extends Model
{
    protected $table = 'vehicles_practice';
    protected $primaryKey = 'vehicle_id';

    protected $fillable = [
        'license_plate',
        'brand',
        'model',
        'year',
        'color',
        'status',
        'current_latitude',
        'current_longitude',
        'last_location_update',
        'battery_level',
        'range_km',
        'is_active'
    ];

    protected $casts = [
        'current_latitude' => 'decimal:8',
        'current_longitude' => 'decimal:8',
        'last_location_update' => 'datetime',
        'is_active' => 'boolean',
    ];
}