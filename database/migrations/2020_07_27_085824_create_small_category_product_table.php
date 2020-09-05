<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmallCategoryProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('small_category_product', function (Blueprint $table) {
            $table->increments('id_small_category');
            $table->string('small_category_name');
            $table->string('slug_name');
            $table->integer('id_large_category')->unsigned();
            $table->foreign('id_large_category')->references('id_large_category')->on('large_category_product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('small_category_product');
    }
}
