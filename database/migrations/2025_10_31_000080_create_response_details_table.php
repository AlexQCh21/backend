<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('response_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_response_id')->constrained('survey_responses')->onDelete('cascade');
            $table->foreignId('survey_question_id')->constrained('survey_questions')->onDelete('cascade');
            $table->unsignedTinyInteger('score')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('response_details');
    }
};
