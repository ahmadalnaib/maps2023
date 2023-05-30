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
            $table->string('main_title');
            $table->text('main_subtitle');
            $table->text('video');
            $table->string('title_one');
            $table->text('subtitle_one');
            $table->string('title_two');
            $table->text('subtitel_two');
            $table->string('title_three');
            $table->text('subtitle_three');
            $table->string('title_four');
            $table->text('subtitle_four');
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
