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
        Schema::dropIfExists('other_packages');

        Schema::create('other_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('package_type');
            $table->date('reservation_date');
            $table->text('additional_info')->nullable();
            $table->string('payment_method');
            $table->decimal('base_price', 10, 2);
            $table->decimal('admin_fee', 10, 2);
            $table->decimal('total_price', 10, 2);
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('other_packages', function (Blueprint $table) {});
    }
};
