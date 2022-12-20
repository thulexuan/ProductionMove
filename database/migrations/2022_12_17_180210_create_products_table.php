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
        Schema::create('products', function (Blueprint $table) {
            $table->string('product_code')->primary();
            $table->string('product_line');
            $table->string('brand');
            $table->string('product_name');
            $table->string('status');
            $table->string('factory_code')->nullable();
            $table->string('store_code')->nullable();
            $table->string('warranty_center_code')->nullable();
            $table->dateTime('manufacturing_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
