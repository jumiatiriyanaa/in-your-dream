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
        Schema::table('weddings', function (Blueprint $table) {
            $table->integer('base_price')->default(0)->after('payment_method');
            $table->integer('additional_price')->default(0)->after('base_price');
            $table->integer('admin_fee')->default(0)->after('additional_price');
            $table->integer('total_price')->default(0)->after('admin_fee');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('weddings', function (Blueprint $table) {
            $table->dropColumn(['base_price', 'additional_price', 'admin_fee', 'total_price']);
        });
    }
};
