<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('audit_findings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('audit_id')->constrained('audits')->onDelete('cascade');
            $table->text('description');
            $table->string('severity')->default('low')->index();
            $table->string('status')->default('open')->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('audit_findings');
    }
};
