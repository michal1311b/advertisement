<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description');
            $table->text('profits')->nullable();
            $table->text('requirements')->nullable();
            $table->string('postCode');
            $table->string('street');
            $table->string('email');
            $table->string('phone');
            $table->integer('min_salary');
            $table->integer('max_salary');
            $table->boolean('term1')->defualt(0);
            $table->boolean('term2')->defualt(0);
            $table->boolean('term3')->defualt(0);
            $table->boolean('negotiable')->defualt(0);
            $table->text('slug');
            $table->bigInteger('work_id')->unsigned();
            $table->bigInteger('state_id')->unsigned();
            $table->bigInteger('location_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('specialization_id')->unsigned();
            $table->bigInteger('currency_id')->unsigned();

            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('work_id')->references('id')->on('works');
            $table->foreign('specialization_id')->references('id')->on('specializations');
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->softDeletes();
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
        Schema::dropIfExists('advertisements');
    }
}
