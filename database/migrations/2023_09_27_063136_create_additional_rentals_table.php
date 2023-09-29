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
        Schema::create('additional_rentals', function (Blueprint $table) {
            $table->id();
            $table->uuid('rental_uuid'); 
            $table->unsignedBigInteger('user_id')->nullable();
            $table->dateTime('datetime')->nullable();
            $table->dateTime('end_time');
            $table->decimal('price', 8, 2);
            $table->timestamps();

            $table->foreign('rental_uuid')->references('uuid')->on('rentals');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additional_rentals');
    }
};
