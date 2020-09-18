<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->string('link_image');
            $table->bigInteger('price');
            $table->integer('quantity')->default(0);
            $table->integer('sold')->default(0);
            $table->integer('sale_percent')->default(0);
            $table->text('description');
            $table->integer('status')->default(0);
            $table->integer('large_category')->unsigned();
            $table->foreign('large_category')->references('id')->on('category_product')->onDelete('cascade');
            $table->integer('small_category')->unsigned()->default(0);
            $table->foreign('small_category')->references('id')->on('category_product')->onDelete('cascade');
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
        Schema::dropIfExists('product');
    }
}