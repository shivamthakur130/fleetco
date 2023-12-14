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
        Schema::create('disposals', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->nullable();
            $table->text('type')->nullable();
            $table->text('fleet')->nullable();
            $table->text('date')->nullable();
            $table->string('item_code')->nullable();
            $table->string('qty')->nullable();
            $table->string('rate')->nullable();
            $table->string('brand')->nullable();
            $table->string('desc')->nullable();
            $table->string('supplier')->nullable();
            $table->string('system_Date')->nullable();
            $table->string('value')->nullable();
            $table->string('in_stock')->nullable();
            $table->string('enterd_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disposals');
    }
};
