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
        Schema::table('level02s', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('activity_log_id');
            $table->foreign('activity_log_id')->references('id')->on('activity_logs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('level02s', function (Blueprint $table) {
            //
        });
    }
};
