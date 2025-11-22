<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('strategic_goals', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->json('target_roles')->nullable();
            $table->text('description')->nullable();
            $table->decimal('target_score', 3, 2);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('goal_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('strategic_goal_id')->constrained('strategic_goals')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('score');
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->unique(['strategic_goal_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('goal_ratings');
        Schema::dropIfExists('strategic_goals');
    }
};
