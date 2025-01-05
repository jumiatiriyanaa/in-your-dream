<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('backgrounds', function (Blueprint $table) {
            $table->string('type')->after('description')->default('Photobox')->comment('Photobox or Self Photo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('backgrounds', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
