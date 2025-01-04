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
        Schema::table('wedding_packages', function (Blueprint $table) {
            $table->string('order_id')->unique()->nullable()->after('payment_proof');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wedding_packages', function (Blueprint $table) {
            $table->string('order_id')->unique()->nullable()->after('payment_proof');
        });
    }
};
