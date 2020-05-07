<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('message');
            $table->dateTime('pub_date')->useCurrent();
            $table->integer('productCode')->unsigned()->index();
            $table->integer('clientNum')->unsigned()->index();
            $table->foreign('productCode')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('clientNum')->references('id')->on('clients')->onDelete('cascade');
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
        Schema::dropIfExists('comments');
    }
}
