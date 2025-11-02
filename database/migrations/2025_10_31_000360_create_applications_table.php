<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('offer_id')->constrained('offers')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('cv_path');
            $table->string('status')->default('pending')->index();
            $table->timestamps();
            $table->unique(['offer_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
