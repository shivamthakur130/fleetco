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
        Schema::create('general_repairs', function (Blueprint $table) {
            $table->string('unique_id')->nullable();
            $table->text('fleet')->nullable();
            $table->text('vehicle')->nullable();
            $table->text('type')->nullable();
            $table->text('date')->nullable();
            $table->string('maintenance_type')->nullable();
            $table->string('meter')->nullable();
            $table->string('po_number')->nullable();
            $table->string('supplier')->nullable();
            $table->string('system_date')->nullable();
            $table->string('cost')->nullable();
            $table->string('pay_ref')->nullable();
            $table->string('remarks')->nullable();
            $table->string('enterd_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_repairs');
    }
};
