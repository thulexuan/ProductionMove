<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('customer_code')->references('customer_code')->on('customers');
            
        });
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('factory_code')->references('factory_code')->on('factories');
            $table->foreign('store_code')->references('store_code')->on('stores');
            $table->foreign('warranty_center_code')->references('warranty_center_code')->on('warranty_centers');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('customer_code');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('factory_code');
            $table->dropForeign('store_code');
            $table->dropForeign('warranty_center_code');
        });
    }
};
