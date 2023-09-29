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
        Schema::table('faqs', function (Blueprint $table) {
            //
            $table->json('question_nine')->nullable();
            $table->json('answer_nine')->nullable();
            $table->json('question_ten')->nullable();
            $table->json('answer_ten')->nullable();
            $table->json('question_eleven')->nullable();
            $table->json('answer_eleven')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('faqs', function (Blueprint $table) {
            //
            $table->dropColumn(['question_nine', 'answer_nine', 'question_ten', 'answer_ten', 'question_eleven', 'answer_eleven']);
        });
    }
};
