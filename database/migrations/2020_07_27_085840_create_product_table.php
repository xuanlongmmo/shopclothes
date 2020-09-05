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
            $table->integer('sale_percent')->default(0);
            $table->text('short_description');
            $table->text('description');
            $table->integer('id_large_category')->unsigned();
            $table->foreign('id_large_category')->references('id_large_category')->on('large_category_product')->onDelete('cascade');
            $table->integer('id_small_category')->unsigned();
            $table->foreign('id_small_category')->references('id_small_category')->on('small_category_product')->onDelete('cascade');
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
