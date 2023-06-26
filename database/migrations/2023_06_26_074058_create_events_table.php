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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('priority');
            $table->unsignedBigInteger('event_id');
            $table->longText('message');
            $table->dateTime('date_time');
            $table->foreignUuid('system_id')->nullable();
            $table->foreignUuid('box_id')->nullable();
            $table->unsignedBigInteger('rental_id')->nullable();
            $table->text('data')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
