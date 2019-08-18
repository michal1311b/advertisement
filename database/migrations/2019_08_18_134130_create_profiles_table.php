<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->string('last_name')->nullable();
            $table->string('street')->nullable();
            $table->string('post_code')->nullable();
            $table->string('city')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_street')->nullable();
            $table->string('company_post_code')->nullable();
            $table->string('company_city')->nullable();
            $table->string('company_nip')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
