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
        Schema::create('fuels', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->nullable();
            $table->text('fuel_station')->nullable();
            $table->text('fuel_type')->nullable();
            $table->text('fuel_price')->nullable();
            $table->text('address')->nullable();
            $table->text('deposit_kept')->nullable();
            $table->text('contact_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fuels');
    }
};
