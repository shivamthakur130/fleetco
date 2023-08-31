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
        Schema::create('stock_codes', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->nullable();
            $table->text('item_id')->nullable();
            $table->text('Brand')->nullable();
            $table->text('Description')->nullable();
            $table->string('Supplier')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_codes');
    }
};
