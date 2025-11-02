<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tech_assets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->nullable()->index();
            $table->string('status')->default('in_use')->index();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->date('acquisition_date')->nullable();
            $table->date('expiration_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tech_assets');
    }
};
