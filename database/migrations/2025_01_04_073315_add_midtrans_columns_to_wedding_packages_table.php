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
            $table->string('midtrans_order_id')->nullable()->after('status');
            $table->string('midtrans_snap_token')->nullable()->after('midtrans_order_id');
            $table->string('midtrans_status')->nullable()->after('midtrans_snap_token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wedding_packages', function (Blueprint $table) {
            $table->dropColumn(['midtrans_order_id', 'midtrans_snap_token', 'midtrans_status']);
        });
    }
};
