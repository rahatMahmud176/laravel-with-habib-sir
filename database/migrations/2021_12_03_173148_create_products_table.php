<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoryId');
            $table->integer('subCategoryId')->nullable();
            $table->integer('unitId');
            $table->string('title');
            $table->string('code');
            $table->string('model');
            $table->float('regularPrice', 10,2);
            $table->float('sellingPrice', 10,2);
            $table->string('metaTag')->nullable();
            $table->text('metaDescription')->nullable();
            $table->string('shortDescription')->nullable();
            $table->text('longDescription')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->text('featuredImage');
            $table->integer('clickCount')->default(0);
            $table->integer('sellCount')->default(0);
            $table->integer('sku')->default(10);
            $table->tinyInteger('featureStatus')->default(0);
            $table->tinyInteger('specialStatus')->default(0);
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
}
