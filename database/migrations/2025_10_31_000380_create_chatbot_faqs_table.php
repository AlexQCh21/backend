<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chatbot_faqs', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->text('answer');
            $table->string('category')->nullable()->index();
            $table->json('keywords')->nullable();
            $table->boolean('active')->default(true);
            $table->unsignedBigInteger('usage_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chatbot_faqs');
    }
};
