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
        Schema::create('productlines', function (Blueprint $table) {
            $table->string('productline_code')->primary();
            $table->string('productline_name');
            $table->string('make');
            $table->string('year');
            $table->string('engine_type');
            $table->string('transmission');
            $table->string('drive_type');
            $table->string('cylinder');
            $table->string('total_seats');
            $table->string('total_doors');
            $table->string('basic_warranty_years');
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
        Schema::dropIfExists('productlines');
    }
};
