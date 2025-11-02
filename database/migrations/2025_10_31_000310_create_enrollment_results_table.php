<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enrollment_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enrollment_id')->unique()->constrained('enrollments')->onDelete('cascade');
            $table->decimal('final_grade', 5, 2);
            $table->decimal('attendance_percentage', 5, 2);
            $table->string('status')->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enrollment_results');
    }
};
