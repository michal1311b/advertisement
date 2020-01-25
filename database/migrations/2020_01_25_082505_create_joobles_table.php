<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJooblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joobles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title')->nullable();
            $table->text('description')->nullable();
           
            $table->boolean('term1')->default(0);
            $table->boolean('term2')->default(0);
            $table->boolean('term3')->default(0);
            $table->text('location')->nullable();
            $table->text('salary')->nullable();
            $table->text('source')->nullable();
            $table->text('type')->nullable();
            $table->text('link')->nullable();
            $table->text('company')->nullable();
            $table->bigInteger('sourceId')->nullable();
            $table->string('email')->nullable();
            $table->boolean('is_accepted')->default(0);

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
        Schema::dropIfExists('joobles');
    }
}
