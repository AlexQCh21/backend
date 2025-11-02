<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('finding_evidences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('audit_finding_id')->constrained('audit_findings')->onDelete('cascade');
            $table->string('type')->nullable();
            $table->string('path');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('finding_evidences');
    }
};
