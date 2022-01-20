<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stockId');
            $table->integer('supplierId');
            $table->integer('productId');
            $table->integer('sizeId');
            $table->integer('colorId');
            $table->integer('unitPrice');
            $table->integer('stockAmount'); 
            $table->integer('stock_temp_out')->default(0); 
            $table->integer('stock_out')->default(0); 
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
        Schema::dropIfExists('stock_details');
    }
}
