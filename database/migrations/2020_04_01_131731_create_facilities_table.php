<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name')->nullable();
            $table->text('slug')->nullable();
            $table->timestamps();
        });

        DB::table('facilities')->insert([
            [
                'name' => 'Badania diagnostyczne',
                'slug' => Str::slug('Badania diagnostyczne'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Leczenie stomatologiczne',
                'slug' => Str::slug('Leczenie stomatologiczne'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Leczenie w warunkach domowych',
                'slug' => Str::slug('Leczenie w warunkach domowych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnie i gabinety podstawowej opieki zdrowotnej (POZ)',
                'slug' => Str::slug('Poradnie i gabinety podstawowej opieki zdrowotnej (POZ)'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Przychodnie specjalistyczne',
                'slug' => Str::slug('Przychodnie specjalistyczne'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Szpitale i opieka całodobowa',
                'slug' => Str::slug('Szpitale i opieka całodobowa'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Izby przyjęć',
                'slug' => Str::slug('Izby przyjęć'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Leczenie ambulatoryjne - pomoc doraźna',
                'slug' => Str::slug('Leczenie ambulatoryjne - pomoc doraźna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Leczenie stomatologiczne - pomoc doraźna',
                'slug' => Str::slug('Leczenie stomatologiczne - pomoc doraźna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pomoc medyczna w nagłych przypadkach',
                'slug' => Str::slug('Pomoc medyczna w nagłych przypadkach'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Szpitalne oddziały ratunkowe (SOR)',
                'slug' => Str::slug('Szpitalne oddziały ratunkowe (SOR)'),
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
        Schema::dropIfExists('facilities');
    }
}
