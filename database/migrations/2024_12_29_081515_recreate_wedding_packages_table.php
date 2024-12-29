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
        Schema::dropIfExists('wedding_packages');

        Schema::create('wedding_packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('event_location');
            $table->string('event_type');
            $table->string('package_details')->nullable();
            $table->string('payment_method');
            $table->integer('base_price');
            $table->integer('additional_price')->default(0);
            $table->integer('admin_fee')->default(3000);
            $table->integer('total_price');
            $table->enum('status', ['Pending', 'Confirmed', 'Cancelled'])->default('Pending');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wedding_packages', function (Blueprint $table) {});
    }
};
