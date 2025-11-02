<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('dni', 8)->after('name')->nullable()->unique();
            $table->string('fullname')->after('dni')->nullable();
            $table->string('avatar')->after('fullname')->nullable();
            $table->string('phone')->after('avatar')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['dni', 'fullname', 'avatar', 'phone']);
        });
    }
};
