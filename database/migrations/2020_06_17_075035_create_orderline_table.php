<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderlineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderline', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('OrderNum')->unsigned()->index();
            $table->integer('ProductCode')->unsigned()->index();
            $table->double('price');
            $table->integer('nb');
            $table->foreign('OrderNum')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('productCode')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('orderline');
    }
}
