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
            $table->string('main_title');
            $table->string('main_subtitle');
            $table->string('title_one');
            $table->text('subtitle_one');
            $table->integer('price_one');
            $table->string('tag_one_one');
            $table->string('tag_one_two');
            $table->string('tag_one_three');
            $table->string('tag_one_four');
            $table->string('tag_one_five');
            $table->string('tag_one_six');

            $table->string('title_two');
            $table->text('subtitle_two');
            $table->integer('price_two');
            $table->string('tag_two_one');
            $table->string('tag_two_two');
            $table->string('tag_two_three');
            $table->string('tag_two_four');
            $table->string('tag_two_five');
            $table->string('tag_two_six');

            
            $table->string('title_three');
            $table->text('subtitle_three');
            $table->integer('price_three');
            $table->string('tag_three_one');
            $table->string('tag_three_two');
            $table->string('tag_three_three');
            $table->string('tag_three_four');
            $table->string('tag_three_five');
            $table->string('tag_three_six');


            
            $table->string('title_four');
            $table->text('subtitle_four');
            $table->integer('price_four');
            $table->string('tag_four_one');
            $table->string('tag_four_two');
            $table->string('tag_four_three');
            $table->string('tag_four_four');
            $table->string('tag_four_five');
            $table->string('tag_four_six');

           
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
