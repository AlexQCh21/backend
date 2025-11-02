<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('class_session_materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_session_id')->constrained('class_sessions')->onDelete('cascade');
            $table->string('type')->nullable();
            $table->string('material_url');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('class_session_materials');
    }
};
