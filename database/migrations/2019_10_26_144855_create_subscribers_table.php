<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->boolean('term1')->defualt(0);
            $table->timestamp('verified_at')->nullable();
            $table->string('token')->nullable();
            $table->timestamps();
        });

        Schema::create('specialization_subscriber', function (Blueprint $table) {
            $table->integer('specialization_id')->unsigned();
            $table->integer('subscriber_id')->unsigned();
            $table->timestamps();
      
            $table->unique(['specialization_id', 'subscriber_id']);
            $table->index(['specialization_id', 'subscriber_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscribers');
        Schema::dropIfExists('specialization_subscriber');
    }
}
