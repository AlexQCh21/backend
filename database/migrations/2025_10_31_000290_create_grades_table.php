<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id')->constrained('exams')->onDelete('cascade');
            $table->foreignId('enrollment_id')->constrained('enrollments')->onDelete('cascade');
            $table->decimal('grade', 5, 2);
            $table->text('feedback')->nullable();
            $table->timestamps();
            $table->unique(['exam_id', 'enrollment_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
