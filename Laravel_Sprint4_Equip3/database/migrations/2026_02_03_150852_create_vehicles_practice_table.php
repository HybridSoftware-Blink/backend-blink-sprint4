<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('vehicles_practice', function (Blueprint $table) {
            $table->id('vehicle_id');
            $table->string('license_plate')->unique();
            $table->string('brand');
            $table->string('model');
            $table->string('year');
            $table->string('color')->nullable();
            $table->enum('status', ['available', 'rented', 'maintenance', 'out_of_service'])->default('available');
            $table->decimal('current_latitude', 10, 8)->nullable();
            $table->decimal('current_longitude', 11, 8)->nullable();
            $table->timestamp('last_location_update')->nullable();
            $table->integer('battery_level')->default(100);
            $table->integer('range_km')->nullable();
            $table->boolean('is_active')->default(true);
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicles_practice');
    }
};