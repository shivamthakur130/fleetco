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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->nullable();
            $table->string('order_type')->nullable();
            $table->string('internal_id')->nullable();
            $table->string('schedule_date')->nullable();
            $table->string('schedule_time')->nullable();
            $table->string('customer')->nullable();
            $table->string('facilitator')->nullable();
            $table->string('driver_assign')->nullable();
            $table->string('ad_hoc')->nullable();
            $table->string('dispatch_immediately')->nullable();
            $table->string('require_proof_of_delivery')->nullable();
            $table->string('service')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
