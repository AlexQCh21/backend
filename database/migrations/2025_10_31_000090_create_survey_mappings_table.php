<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('survey_mappings', function (Blueprint $table) {
            $table->id();
            $table->string('event')->index();
            $table->foreignId('survey_id')->constrained('surveys')->onDelete('cascade');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('survey_mappings');
    }
};
