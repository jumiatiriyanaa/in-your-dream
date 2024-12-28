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
        Schema::create('weddings', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Client name
            $table->string('email')->unique(); // Client email
            $table->string('phone_number'); // Client phone number
            $table->text('address'); // Event location address
            $table->date('start_date'); // Event start date
            $table->date('end_date'); // Event end date
            $table->text('event_location'); // Full event location
            $table->enum('event_type', ['indoor', 'outdoor'])->default('indoor'); // Event type (indoor/outdoor)
            $table->string('package_details')->nullable(); // Other package details
            $table->enum('payment_method', ['cash', 'bank_transfer'])->default('cash'); // Payment method
            $table->timestamps(); // Created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weddings');
    }
};
