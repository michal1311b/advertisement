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
            $table->bigInteger('specialization_id')->unsigned()->nullable();
            $table->bigInteger('specializationp_id')->unsigned()->nullable();
            $table->string('workplace')->nullable();
            $table->string('workplace_extra')->nullable();
            $table->string('worktime');
            $table->string('social_media')->nullable();
            $table->string('social_media_extra')->nullable();
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
