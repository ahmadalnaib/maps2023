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
            $table->uuid('locker_id');
            $table->unsignedBigInteger('tenant_id')->index();
            $table->integer('door_number');
            $table->string('name')->nullable();
            $table->string('size');
            $table->boolean('charge')->default(false);
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
