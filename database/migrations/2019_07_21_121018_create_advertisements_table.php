<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
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
            $table->string('city');
            $table->string('postCode');
            $table->string('street');
            $table->string('email');
            $table->string('phone');
            $table->boolean('term1')->defualt(false);
            $table->boolean('term2')->defualt(false);
            $table->boolean('term3')->defualt(false);
            $table->unsignedInteger('work_id');
            $table->unsignedInteger('state_id');
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
