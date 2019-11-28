<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewslettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsletters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('mailinglist_id')->unsigned();
			$table->string('title')->nullable();
			$table->string('subject')->nullable();
            $table->text('message')->nullable();
            $table->boolean('sent')->nullable()->default(false);
            $table->datetime('sending_date')->nullable();
            $table->timestamps();

            $table->foreign('mailinglist_id')->references('id')->on('mailinglists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('newsletters');
    }
}
