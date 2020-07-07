<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElemProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elem_produit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numElement')->unsigned()->index();
            $table->integer('productCode')->unsigned()->index();
            $table->foreign('numElement')->references('id')->on('elementbase')->onDelete('cascade');
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
        Schema::dropIfExists('elem_produit');
    }
}
