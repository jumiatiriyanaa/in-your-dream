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
        Schema::rename('weddings', 'wedding_packages');

        Schema::table('wedding_packages', function (Blueprint $table) {
            $table->dropColumn(['name', 'email', 'phone_number', 'address']);

            $table->unsignedBigInteger('user_id')->before('start_date');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('wedding_packages', function (Blueprint $table) {
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('address');

            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::rename('wedding_packages', 'weddings');
    }
};
