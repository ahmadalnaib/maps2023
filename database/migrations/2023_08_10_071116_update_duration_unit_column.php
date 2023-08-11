<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        DB::statement("ALTER TABLE `plans` CHANGE `duration_unit` `duration_unit` ENUM('days', 'hours', 'minutes') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'days';");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
