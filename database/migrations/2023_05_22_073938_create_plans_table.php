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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id');
            $table->text('name');
            $table->integer('number_of_days');
            $table->enum('duration_unit', ['days', 'hours'])->default('days');
            $table->decimal('price',8,2);
            $table->unsignedBigInteger('tenant_id')->index();
            $table->boolean('active')->default(false); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
