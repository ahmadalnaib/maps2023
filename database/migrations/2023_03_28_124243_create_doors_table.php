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
        Schema::create('doors', function (Blueprint $table) {
            $table->id();
            $table->integer('locker_id');
            $table->integer('door_number');
            $table->string('rental_status')->default('available');
            $table->timestamps();
    
         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doors');
    }
};
