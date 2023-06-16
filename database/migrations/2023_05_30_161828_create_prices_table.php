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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->json('main_title');
            $table->json('main_subtitle');
            $table->json('title_one');
            $table->json('subtitle_one');
            $table->json('price_one');
            $table->json('tag_one_one');
            $table->json('tag_one_two');
            $table->json('tag_one_three');
            $table->json('tag_one_four');
            $table->json('tag_one_five');
            $table->json('tag_one_six');

            $table->json('title_two');
            $table->json('subtitle_two');
            $table->json('price_two');
            $table->json('tag_two_one');
            $table->json('tag_two_two');
            $table->json('tag_two_three');
            $table->json('tag_two_four');
            $table->json('tag_two_five');
            $table->json('tag_two_six');

            
            $table->json('title_three');
            $table->json('subtitle_three');
            $table->json('price_three');
            $table->json('tag_three_one');
            $table->json('tag_three_two');
            $table->json('tag_three_three');
            $table->json('tag_three_four');
            $table->json('tag_three_five');
            $table->json('tag_three_six');


            
            $table->json('title_four');
            $table->json('subtitle_four');
            $table->json('price_four');
            $table->json('tag_four_one');
            $table->json('tag_four_two');
            $table->json('tag_four_three');
            $table->json('tag_four_four');
            $table->json('tag_four_five');
            $table->json('tag_four_six');

           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
