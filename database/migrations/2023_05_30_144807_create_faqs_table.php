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
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->json('question_one');
            $table->json('answer_one');
            $table->json('question_two');
            $table->json('answer_two');
            $table->json('question_three');
            $table->json('answer_three');
            $table->json('question_four');
            $table->json('answer_four');
            $table->json('question_five');
            $table->json('answer_five');
            $table->json('question_six');
            $table->json('answer_six');
            $table->json('question_seven');
            $table->json('answer_seven');
            $table->json('question_eight');
            $table->json('answer_eight');
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
