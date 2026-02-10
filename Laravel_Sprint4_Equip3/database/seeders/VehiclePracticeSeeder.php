<?php

namespace Database\Seeders;

use App\Models\VehiclePractice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehiclePracticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicles = [
            [
                'license_plate' => '1234ABC',
                'brand' => 'Tesla',
                'model' => 'Model 3',
                'year' => '2024',
                'color' => 'white',
                'status' => 'available',
                'current_latitude' => 41.3851,
                'current_longitude' => 2.1734,
                'battery_level' => 85,
                'range_km' => 450,
                'is_active' => true,
            ],
            [
                'license_plate' => '5678XYZ',
                'brand' => 'BMW',
                'model' => 'i4',
                'year' => '2023',
                'color' => 'black',
                'status' => 'available',
                'current_latitude' => 41.3879,
                'current_longitude' => 2.1699,
                'battery_level' => 92,
                'range_km' => 520,
                'is_active' => true,
            ],
            [
                'license_plate' => '9012DEF',
                'brand' => 'Nissan',
                'model' => 'Leaf',
                'year' => '2022',
                'color' => 'blue',
                'status' => 'rented',
                'current_latitude' => 41.3901,
                'current_longitude' => 2.1589,
                'battery_level' => 65,
                'range_km' => 320,
                'is_active' => true,
            ],
            [
                'license_plate' => '3456GHI',
                'brand' => 'Renault',
                'model' => 'Zoe',
                'year' => '2023',
                'color' => 'red',
                'status' => 'maintenance',
                'current_latitude' => 41.3833,
                'current_longitude' => 2.1834,
                'battery_level' => 45,
                'range_km' => 200,
                'is_active' => false,
            ],
            [
                'license_plate' => '7890JKL',
                'brand' => 'Volkswagen',
                'model' => 'ID.3',
                'year' => '2024',
                'color' => 'grey',
                'status' => 'available',
                'current_latitude' => 41.3917,
                'current_longitude' => 2.1649,
                'battery_level' => 100,
                'range_km' => 425,
                'is_active' => true,
            ],
        ];

        foreach ($vehicles as $vehicle) {
            VehiclePractice::create($vehicle);
        }
    }
}
