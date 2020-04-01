<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_user', function (Blueprint $table) {
            $table->integer('facility_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
      
            $table->unique(['facility_id', 'user_id']);
            $table->index(['facility_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facility_user');
    }
}
