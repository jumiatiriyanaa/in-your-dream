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
        Schema::dropIfExists('selfphoto_photobox');

        Schema::create('selfphoto_photobox_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('schedule_date');
            $table->time('schedule_time');
            $table->string('background_choice');
            $table->integer('number_of_friends');
            $table->string('payment_method');
            $table->string('virtual_account_number');
            $table->decimal('base_price', 10, 2);
            $table->decimal('additional_person_cost', 10, 2)->nullable();
            $table->decimal('admin_fee', 10, 2);
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['Pending', 'Confirmed', 'Cancelled'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('selfphoto_photobox_packages');
    }
};
