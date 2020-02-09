<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->nullable();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('street')->nullable();
            $table->string('post_code')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_street')->nullable();
            $table->string('company_post_code')->nullable();
            $table->string('company_city')->nullable();
            $table->string('company_nip')->nullable();
            $table->string('company_phone')->nullable();
            $table->text('comments')->nullable();
            $table->boolean('term1')->defualt(0);
            $table->bigInteger('company_courses_id')->unsigned();
            $table->foreign('company_courses_id')->references('id')->on('company_courses');
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
        Schema::dropIfExists('participants');
    }
}
