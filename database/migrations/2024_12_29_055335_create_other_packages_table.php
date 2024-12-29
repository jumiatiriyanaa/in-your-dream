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
        Schema::create('other_packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_type');
            $table->string('name');
            $table->string('phone_number', 15);
            $table->text('address');
            $table->date('reservation_date');
            $table->text('additional_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other_packages');
    }
};
