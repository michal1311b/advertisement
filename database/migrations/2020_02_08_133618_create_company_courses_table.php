<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->string('postCode')->nullable();
            $table->string('street')->nullable();
            $table->string('phone')->nullable();
            $table->string('price')->nullable();
            $table->string('start_date')->nullable();
            $table->integer('points')->nullable();
            $table->string('end_date')->nullable();
            $table->float('longitude', 8, 5)->nullable();
            $table->float('latitude', 8, 5)->nullable();
            $table->boolean('term1')->defualt(0);
            $table->boolean('term2')->defualt(0);
            $table->boolean('term3')->defualt(0);
            $table->text('slug');
            $table->text('avatar')->nullable();
            $table->bigInteger('state_id')->unsigned();
            $table->bigInteger('location_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('specialization_id')->unsigned();
            $table->bigInteger('currency_id')->unsigned();

            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('specialization_id')->references('id')->on('specializations');
            $table->foreign('currency_id')->references('id')->on('currencies');
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
        Schema::dropIfExists('company_courses');
    }
}
