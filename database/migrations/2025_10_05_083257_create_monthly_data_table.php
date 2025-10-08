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
        Schema::create('monthly_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budget_code_id')->constrained();
            $table->foreignId('activity_log_id')->constrained();
            $table->string('year');
            $table->string('month');
            $table->string('financial')->nullable();
            $table->string('physical')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_data');
    }
};
