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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('tenant_id')->index();
            $table->foreignId('team_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image')->default('default.png');
            $table->integer('category_id');
            $table->json('overview');
            $table->string('address');
            $table->integer('user_id');
            $table->double('latitude');
            $table->double('longitude');
            $table->integer('view_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
