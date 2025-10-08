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
        Schema::table('monthly_data', function (Blueprint $table) {
            //
            $table->dropForeign(['budget_code_id']);
            $table->dropColumn('budget_code_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('monthly_data', function (Blueprint $table) {
            //
        });
    }
};
