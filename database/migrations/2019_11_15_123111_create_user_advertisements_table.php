<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_advertisement', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('advertisement_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('score')->nullable();
      
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('advertisement_id')->references('id')->on('advertisements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_advertisements');
    }
}
