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
        Schema::create('selfphoto_photobox', function (Blueprint $table) {
            $table->id();
            $table->string('user_name'); // Nama pengguna
            $table->string('email'); // Email pengguna
            $table->string('phone_number'); // Nomor telepon pengguna
            $table->string('schedule_date'); // Jadwal tanggal
            $table->string('schedule_time'); // Jadwal waktu
            $table->string('background_choice'); // Pilihan background
            $table->integer('number_of_friends')->default(0); // Jumlah teman yang dibawa
            $table->string('payment_method'); // Metode pembayaran
            $table->string('virtual_account_number')->nullable(); // Virtual Account
            $table->integer('subtotal_package'); // Subtotal paket
            $table->integer('additional_person_cost')->nullable(); // Biaya tambahan orang
            $table->integer('admin_fee'); // Biaya admin
            $table->integer('total_payment'); // Total pembayaran
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('selfphoto_photobox');
    }
};
