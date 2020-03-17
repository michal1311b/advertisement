<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trackings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('session_key')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('state_id')->unsigned();
            $table->bigInteger('location_id')->unsigned();
            $table->bigInteger('specialization_id')->unsigned();

            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('specialization_id')->references('id')->on('specializations');
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
        Schema::dropIfExists('trackings');
    }
}
