<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chatbot_conversations', function (Blueprint $table) {
            $table->id();
            $table->dateTime('started_at')->index();
            $table->dateTime('ended_at')->nullable()->index();
            $table->unsignedTinyInteger('satisfaction_rating')->nullable()->index();
            $table->text('feedback')->nullable();
            $table->boolean('resolved')->default(false)->index();
            $table->boolean('handed_to_human')->default(false)->index();
            $table->text('first_message')->nullable();
            $table->text('last_bot_response')->nullable();
            $table->unsignedInteger('message_count')->default(0);
            $table->foreignId('faq_matched_id')->nullable()->constrained('chatbot_faqs')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chatbot_conversations');
    }
};
