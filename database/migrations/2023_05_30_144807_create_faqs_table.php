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
            $table->string('question_one');
            $table->longText('answer_one');
            $table->string('question_two');
            $table->longText('answer_two');
            $table->string('question_three');
            $table->longText('answer_three');
            $table->string('question_four');
            $table->longText('answer_four');
            $table->string('question_five');
            $table->longText('answer_five');
            $table->string('question_six');
            $table->longText('answer_six');
            $table->string('question_seven');
            $table->longText('answer_seven');
            $table->string('question_eight');
            $table->longText('answer_eight');
            $table->string('question_nine');
            $table->longText('answer_nine');
            $table->string('question_ten');
            $table->longText('answer_ten');
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
