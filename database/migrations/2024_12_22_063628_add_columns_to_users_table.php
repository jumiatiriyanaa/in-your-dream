<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number')->nullable()->after('email_verified_at');
            $table->string('avatar')->nullable()->after('remember_token');
            $table->string('login_type')->nullable()->after('avatar');
            $table->tinyInteger('level')->default(1)->after('login_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone_number', 'avatar', 'login_type', 'level']);
        });
    }
};
