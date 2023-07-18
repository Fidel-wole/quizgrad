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
        Schema::create('quiz_topics', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('topics');
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('quiz_categories');
            $table->bigInteger('subjectId')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_topics');
    }
};
