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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->nullable();
            $table->text('service_name')->nullable();
            $table->text('service_order_type')->nullable();
            $table->text('base_fee')->nullable();
            $table->string('rate_calculation_method')->nullable();
            $table->string('duration_terms')->nullable();
            $table->string('cash_on_delivery')->nullable();
            $table->string('peak_hours')->nullable();
            $table->string('restrict_service_area')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
