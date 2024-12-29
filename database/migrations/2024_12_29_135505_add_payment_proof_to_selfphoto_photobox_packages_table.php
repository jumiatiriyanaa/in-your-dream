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
        Schema::table('selfphoto_photobox_packages', function (Blueprint $table) {
            $table->string('payment_proof')->nullable()->after('total_price')->comment('Path to payment proof image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('selfphoto_photobox_packages', function (Blueprint $table) {
            $table->dropColumn('payment_proof');
        });
    }
};
