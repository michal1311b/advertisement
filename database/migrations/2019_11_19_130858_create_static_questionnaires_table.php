<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaticQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_questionnaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sex');
            $table->string('age');
            $table->bigInteger('specialization_id')->unsigned();
            $table->bigInteger('specializationp_id')->unsigned();
            $table->string('worktime');
            $table->text('description');
            $table->text('criteria');
            $table->string('email');
            $table->boolean('term1');

            $table->foreign('specialization_id')->references('id')->on('specializations');
            $table->foreign('specializationp_id')->references('id')->on('specializations');
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
        Schema::dropIfExists('static_questionnaires');
    }
}
