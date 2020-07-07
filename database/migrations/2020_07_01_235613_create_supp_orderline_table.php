<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppOrderlineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supp_orderline', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lineId')->unsigned()->index();
            $table->integer('numIngre')->unsigned()->index();
            $table->foreign('lineId')->references('id')->on('orderline')->onDelete('cascade');
            $table->foreign('numIngre')->references('id')->on('supplements')->onDelete('cascade');
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
        Schema::dropIfExists('supp_orderline');
    }
}
