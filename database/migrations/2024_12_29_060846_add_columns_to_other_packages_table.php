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
        Schema::table('other_packages', function (Blueprint $table) {
            $table->string('payment_method')->after('additional_info'); // Tambah kolom metode pembayaran
            $table->decimal('base_price', 10, 2)->after('payment_method'); // Harga dasar
            $table->decimal('admin_fee', 10, 2)->after('base_price'); // Biaya admin
            $table->decimal('total_price', 10, 2)->after('admin_fee'); // Total harga
            $table->string('status')->default('Pending')->after('total_price'); // Status reservasi
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('other_packages', function (Blueprint $table) {
            $table->dropColumn(['payment_method', 'base_price', 'admin_fee', 'total_price', 'status']);
        });
    }
};
