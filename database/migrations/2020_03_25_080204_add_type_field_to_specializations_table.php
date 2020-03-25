<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddTypeFieldToSpecializationsTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('specializations', function (Blueprint $table) {
            $table->integer('type')->default(1);
        });

        DB::table('specializations')->insert([
            [
                'name' => 'Pielęgniarstwo anestezjologiczne i intensywnej opieki',
                'slug' => Str::slug('Pielęgniarstwo anestezjologiczne i intensywnej opieki', '-'),
                'type' => 3,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pielęgniarstwo chirurgiczne',
                'slug' => Str::slug('Pielęgniarstwo chirurgiczne', '-'),
                'type' => 3,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Specjalizacja ochrony zdrowia pracujących dla pielęgniarek',
                'slug' => Str::slug('Specjalizacja ochrony zdrowia pracujących dla pielęgniarek', '-'),
                'type' => 3,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Specjalizacja onkologiczna',
                'slug' => Str::slug('Specjalizacja onkologiczna', '-'),
                'type' => 3,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Specjalizacja opieki paliatywnej',
                'slug' => Str::slug('Specjalizacja opieki paliatywnej', '-'),
                'type' => 3,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Specjalizacja psychiatryczna',
                'slug' => Str::slug('Specjalizacja psychiatryczna', '-'),
                'type' => 3,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Specjalizacja epidemiologiczna',
                'slug' => Str::slug('Specjalizacja epidemiologiczna', '-'),
                'type' => 3,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Specjalizacja rodzinna dla pielęgniarek',
                'slug' => Str::slug('Specjalizacja rodzinna dla pielęgniarek', '-'),
                'type' => 3,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Specjalizacja internistyczna',
                'slug' => Str::slug('Specjalizacja internistyczna', '-'),
                'type' => 3,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Specjalizacja operacyjna ',
                'slug' => Str::slug('Specjalizacja operacyjna ', '-'),
                'type' => 3,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('specializations', function (Blueprint $table) {
            $table->dropColumn('opinion');
        });
    }
}
