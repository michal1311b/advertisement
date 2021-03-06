<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('city');
            $table->float('longitude', 8, 5);
            $table->float('latitude', 8, 5);
            $table->timestamps();
        });

        // \Eloquent::unguard();

        // $zip = new ZipArchive;
        // $res = $zip->open('database/locations.zip');
        // if ($res === TRUE) {
        //     $zip->extractTo('database/');
        //     $zip->close();
        //     echo 'woot!';
        // } else {
        //     echo 'doh!';
        // }
        
        // $path = 'database/locations.sql';
        // \DB::statement(file_get_contents($path));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
