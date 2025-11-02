<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('audit_actions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('audit_finding_id')->constrained('audit_findings')->onDelete('cascade');
            $table->foreignId('responsible_id')->nullable()->constrained('users')->onDelete('set null');
            $table->text('action_required');
            $table->date('due_date')->nullable();
            $table->string('status')->default('pending')->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('audit_actions');
    }
};
