<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('academic_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('base_grade')->default(20);
            $table->unsignedSmallInteger('min_passing_grade')->default(11);
            $table->decimal('absence_percentage', 5, 2)->default(30.00);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('academic_settings');
    }
};
