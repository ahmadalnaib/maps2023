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
        Schema::create('box_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenant_id')->index();
            $table->string('name');
            $table->float('depth');
            $table->float('width');
            $table->float('height');
            $table->text('description');
            $table->boolean('ebike_option');
            $table->boolean('first_floor_option');
            $table->unsignedBigInteger('plan_id');
            $table->unsignedBigInteger('box_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('box_types');
    }
};
