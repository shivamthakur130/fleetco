<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fleets', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->nullable();
            $table->string('internal_id')->nullable();
            $table->string('plate_number')->nullable();
            $table->string('vin_number')->nullable();
            $table->string('vehicle_make')->nullable();
            $table->string('vehicle_model')->nullable();
            $table->string('year')->nullable();
            $table->string('driver_assigned')->nullable();
            $table->string('kph')->nullable();
            $table->string('body_type')->nullable();
            $table->string('door')->nullable();
            $table->string('driver_type')->nullable();
            $table->string('length')->nullable();
            $table->string('seat')->nullable();
            $table->string('speed')->nullable();
            $table->string('transmission_type')->nullable();
            $table->string('engine_bore')->nullable();
            $table->string('engine_cc')->nullable();
            $table->string('compression')->nullable();
            $table->string('cylinder')->nullable();
            $table->string('position')->nullable();
            $table->string('power_ps')->nullable();
            $table->string('power_rpm')->nullable();
            $table->string('stroke')->nullable();
            $table->string('torque_ps')->nullable();
            $table->string('torque_rpm')->nullable();
            $table->string('valve_per_cylinder')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('fuel_cap')->nullable();
            $table->string('liter_per_km_city')->nullable();
            $table->string('liter_per_km_highway')->nullable();
            $table->string('liter_per_km_mixed')->nullable();
            $table->text('vehicle_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fleets');
    }
};
