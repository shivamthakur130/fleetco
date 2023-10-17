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
        Schema::create('module_operations', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->nullable();
            $table->string('role_id')->nullable();
            $table->string('role_name')->nullable();
            $table->string('module')->nullable();
            $table->string('sub_module')->nullable();
            $table->string('Add')->nullable();
            $table->string('edit')->nullable();
            $table->string('delete')->nullable();
            $table->string('list')->nullable();
            $table->string('print')->nullable();
            $table->string('import')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_operations');
    }
};
