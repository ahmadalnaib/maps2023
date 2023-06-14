<?php

use App\Models\How;
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
        Schema::create('hows', function (Blueprint $table) {
            $table->id();
            $table->json('main_title');
            $table->json('main_subtitle');
            $table->json('video');
            $table->json('title_one');
            $table->json('subtitle_one');
            $table->json('title_two');
            $table->json('subtitel_two');
            $table->json('title_three');
            $table->json('subtitle_three');
            $table->json('title_four');
            $table->json('subtitle_four');
            $table->timestamps();
        });

     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hows');
    }
};
