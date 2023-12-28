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
        Schema::create('rebuilt_issues', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->nullable();
            $table->text('type')->nullable();
            $table->text('fleet')->nullable();
            $table->text('vehicle')->nullable();
            $table->text('item_code')->nullable();
            $table->text('date')->nullable();
            $table->string('unit_cost')->nullable();
            $table->string('qty')->nullable();
            $table->string('brand')->nullable();
            $table->string('desc')->nullable();
            $table->string('supplier')->nullable();
            $table->string('system_date')->nullable();
            $table->string('cost')->nullable();
            $table->string('remarks')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rebuilt_issues');
    }
};
