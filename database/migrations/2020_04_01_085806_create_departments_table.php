<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name')->nullable();
            $table->text('slug')->nullable();
            $table->timestamps();
        });

        DB::table('departments')->insert([
            [
                'name' => 'Ambulatorium chirurgiczne',
                'slug' => Str::slug('Alergologia'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Ambulatorium chirurgiczne dla dzieci',
                'slug' => Str::slug('Ambulatorium chirurgiczne dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Ambulatorium kardiologiczne',
                'slug' => Str::slug('Ambulatorium kardiologiczne'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Ambulatorium ogólne',
                'slug' => Str::slug('Ambulatorium ogólne'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Ambulatorium okulistyczne',
                'slug' => Str::slug('Ambulatorium okulistyczne'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Ambulatorium pediatryczne',
                'slug' => Str::slug('Ambulatorium pediatryczne'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Ambulatorium stomatologiczne',
                'slug' => Str::slug('Ambulatorium stomatologiczne'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Ambulatorium stomatologiczne dla dzieci',
                'slug' => Str::slug('Ambulatorium stomatologiczne dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Apteka szpitalna',
                'slug' => Str::slug('Apteka szpitalna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Bank krwi',
                'slug' => Str::slug('Bank krwi'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Bank tkanek',
                'slug' => Str::slug('Bank tkanek'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Blok operacyjny',
                'slug' => Str::slug('Blok operacyjny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Blok operacyjny dziecięcy',
                'slug' => Str::slug('Blok operacyjny dziecięcy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dział (pracownia) balneoterapii',
                'slug' => Str::slug('Dział (pracownia) balneoterapii'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dział (pracownia) balneoterapii dla dzieci',
                'slug' => Str::slug('Dział (pracownia) balneoterapii dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dział (pracownia) fizjoterapii dziecięcej',
                'slug' => Str::slug('Dział (pracownia) fizjoterapii dziecięcej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dział (pracownia) fizykoterapii',
                'slug' => Str::slug('Dział (pracownia) fizykoterapii'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dział (pracownia) fizykoterapii dla dzieci',
                'slug' => Str::slug('Dział (pracownia) fizykoterapii dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dział (pracownia) hydroterapii',
                'slug' => Str::slug('Dział (pracownia) hydroterapii'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dział (pracownia) hydroterapii dla dzieci',
                'slug' => Str::slug('Dział (pracownia) hydroterapii dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dział (pracownia) kinezyterapii',
                'slug' => Str::slug('Dział (pracownia) kinezyterapii'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dział (pracownia) kinezyterapii dla dzieci',
                'slug' => Str::slug('Dział (pracownia) kinezyterapii dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dział (pracownia) krioterapii',
                'slug' => Str::slug('Dział (pracownia) krioterapii'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dział (pracownia) krioterapii dla dzieci',
                'slug' => Str::slug('Dział (pracownia) krioterapii dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dział (pracownia) masażu leczniczego',
                'slug' => Str::slug('Dział (pracownia) masażu leczniczego'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dział (pracownia) masażu leczniczego dla dzieci',
                'slug' => Str::slug('Dział (pracownia) masażu leczniczego dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dział anestezjologii',
                'slug' => Str::slug('Dział anestezjologii'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dział higieny i epidemiologii',
                'slug' => Str::slug('Dział higieny i epidemiologii'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dział higieny i epidemiologii dla dzieci',
                'slug' => Str::slug('Dział higieny i epidemiologii dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dział nadzoru radiologicznego',
                'slug' => Str::slug('Dział nadzoru radiologicznego'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dział nadzoru sanitarnego',
                'slug' => Str::slug('Dział nadzoru sanitarnego'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dział nadzoru zapobiegawczego',
                'slug' => Str::slug('Dział nadzoru zapobiegawczego'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => '',
                'slug' => Str::slug(''),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dział orzecznictwa o stanie zdrowia',
                'slug' => Str::slug('Dział orzecznictwa o stanie zdrowia'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dział oświaty i promocji zdrowia',
                'slug' => Str::slug('Dział oświaty i promocji zdrowia'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => '',
                'slug' => Str::slug(''),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dział oświaty i promocji zdrowia',
                'slug' => Str::slug('Dział oświaty i promocji zdrowia'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dział żywności, żywienia, przedmiotów użytku',
                'slug' => Str::slug('Dział żywności, żywienia, przedmiotów użytku'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dziecięcy oddział reumatologiczny',
                'slug' => Str::slug('Dziecięcy oddział reumatologiczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dzienny ośrodek opieki paliatywnej lub hospicyjnej',
                'slug' => Str::slug('Dzienny ośrodek opieki paliatywnej lub hospicyjnej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Dzienny ośrodek opieki geriatrycznej',
                'slug' => Str::slug('Dzienny ośrodek opieki geriatrycznej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Gabinet medycyny szkolnej',
                'slug' => Str::slug('Gabinet medycyny szkolnej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Gabinet rehabilitacyjny',
                'slug' => Str::slug('Gabinet rehabilitacyjny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Gabinet zabiegowy',
                'slug' => Str::slug('Gabinet zabiegowy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Gabinet zabiegowy dla dzieci',
                'slug' => Str::slug('Gabinet zabiegowy dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Geriatryczny zespół konsultacyjny dla lecznictwa zamkniętego',
                'slug' => Str::slug('Geriatryczny zespół konsultacyjny dla lecznictwa zamkniętego'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Geriatryczny zespół opieki domowej',
                'slug' => Str::slug('Geriatryczny zespół opieki domowej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Hospicja domowe',
                'slug' => Str::slug('Hospicja domowe'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Hospicja domowe dla dzieci',
                'slug' => Str::slug('Hospicja domowe dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Hospicja stacjonarne',
                'slug' => Str::slug('Hospicja stacjonarne'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Hospicja stacjonarne dla dzieci',
                'slug' => Str::slug('Hospicja stacjonarne dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Hostel dla osób psychicznie chorych',
                'slug' => Str::slug('Hostel dla osób psychicznie chorych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Hostel dla osób z zaburzeniami psychicznymi',
                'slug' => Str::slug('Hostel dla osób z zaburzeniami psychicznymi'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Hostel dla uzależnionych od alkoholu',
                'slug' => Str::slug('Hostel dla uzależnionych od alkoholu'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Hostel dla uzależnionych od środków psychoaktywnych',
                'slug' => Str::slug('Hostel dla uzależnionych od środków psychoaktywnych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Hostel dla uzależnionych od środków psychoaktywnych dla dzieci',
                'slug' => Str::slug('Hostel dla uzależnionych od środków psychoaktywnych dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Izba chorych',
                'slug' => Str::slug('Izba chorych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Izba przyjęć',
                'slug' => Str::slug('Izba przyjęć'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Izba przyjęć dla dzieci',
                'slug' => Str::slug('Izba przyjęć dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Lotnicze pogotowie ratunkowe',
                'slug' => Str::slug('Lotnicze pogotowie ratunkowe'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział/ośrodek rehabilitacji dla uzależnionych od substancji psychoaktywnych ze współistniejącymi zaburzeniami psychotycznymi',
                'slug' => Str::slug('Oddział/ośrodek rehabilitacji dla uzależnionych od substancji psychoaktywnych ze współistniejącymi zaburzeniami psychotycznymi'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział/ośrodek rehabilitacyjny dla uzależnionych od substancji psychoaktywnych',
                'slug' => Str::slug('Oddział/ośrodek rehabilitacyjny dla uzależnionych od substancji psychoaktywnych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział/ośrodek rehabilitacyjny dla uzależnionych od substancji psychoaktywnych dla dzieci i młodzieży',
                'slug' => Str::slug('Oddział/ośrodek rehabilitacyjny dla uzależnionych od substancji psychoaktywnych dla dzieci i młodzieży'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział/ośrodek terapii dla uzależnionych od substancji psychoaktywnych ze współistniejącymi zaburzeniami psychotycznymi',
                'slug' => Str::slug('Oddział/ośrodek terapii dla uzależnionych od substancji psychoaktywnych ze współistniejącymi zaburzeniami psychotycznymi'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział/ośrodek terapii dla uzależnionych od substancji psychoaktywnych ze współistniejącymi zaburzeniami psychotycznymi dla dzieci',
                'slug' => Str::slug('Oddział/ośrodek terapii dla uzależnionych od substancji psychoaktywnych ze współistniejącymi zaburzeniami psychotycznymi dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział/zespół chirurgii jednego dnia',
                'slug' => Str::slug('Oddział/zespół chirurgii jednego dnia'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział/zespół chirurgii jednego dnia dla dzieci',
                'slug' => Str::slug('Oddział/zespół chirurgii jednego dnia dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział AIDS',
                'slug' => Str::slug('Oddział AIDS'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział alergologiczny',
                'slug' => Str::slug('Oddział alergologiczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział alergologiczny dziecięcy',
                'slug' => Str::slug('Oddział alergologiczny dziecięcy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział anestezjologii',
                'slug' => Str::slug('Oddział anestezjologii'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział angiologiczny',
                'slug' => Str::slug('Oddział angiologiczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział audiologiczno - foniatryczny',
                'slug' => Str::slug('Oddział audiologiczno - foniatryczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział audiologiczno - foniatryczny dla dzieci',
                'slug' => Str::slug('Oddział audiologiczno - foniatryczny dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chemioterapii',
                'slug' => Str::slug('Oddział chemioterapii'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chemioterapii u dzieci',
                'slug' => Str::slug('Oddział chemioterapii u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chirurgiczny dla dzieci',
                'slug' => Str::slug('Oddział chirurgiczny dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chirurgiczny ogólny',
                'slug' => Str::slug('Oddział chirurgiczny ogólny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chirurgii endokrynologicznej',
                'slug' => Str::slug('Oddział chirurgii endokrynologicznej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chirurgii klatki piersiowej',
                'slug' => Str::slug('Oddział chirurgii klatki piersiowej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chirurgii naczyniowej',
                'slug' => Str::slug('Oddział chirurgii naczyniowej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chirurgii noworodka',
                'slug' => Str::slug('Oddział chirurgii noworodka'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chirurgii onkologicznej',
                'slug' => Str::slug('Oddział chirurgii onkologicznej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chirurgii onkologicznej dla dzieci',
                'slug' => Str::slug('Oddział chirurgii onkologicznej dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chirurgii plastycznej',
                'slug' => Str::slug('Oddział chirurgii plastycznej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chirurgii plastycznej dla dzieci',
                'slug' => Str::slug('Oddział chirurgii plastycznej dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chirurgii przewodu pokarmowego',
                'slug' => Str::slug('Oddział chirurgii przewodu pokarmowego'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chirurgii ręki',
                'slug' => Str::slug('Oddział chirurgii ręki'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chirurgii stomatologicznej',
                'slug' => Str::slug('Oddział chirurgii stomatologicznej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chirurgii szczękowo-twarzowej',
                'slug' => Str::slug('Oddział chirurgii szczękowo-twarzowej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chirurgii szczękowo-twarzowej dla dzieci',
                'slug' => Str::slug('Oddział chirurgii szczękowo-twarzowej dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chirurgii urazowo-ortopedycznej',
                'slug' => Str::slug('Oddział chirurgii urazowo-ortopedycznej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chorób metabolicznych',
                'slug' => Str::slug('Oddział chorób metabolicznych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chorób metabolicznych dla dzieci',
                'slug' => Str::slug('Oddział chorób metabolicznych dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chorób tropikalnych',
                'slug' => Str::slug('Oddział chorób tropikalnych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chorób wewnętrznych',
                'slug' => Str::slug('Oddział chorób wewnętrznych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chorób wewnętrznych dla dzieci',
                'slug' => Str::slug('Oddział chorób wewnętrznych dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chorób zakaźnych',
                'slug' => Str::slug('Oddział chorób zakaźnych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chorób zakaźnych dla dzieci',
                'slug' => Str::slug('Oddział chorób zakaźnych dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział chorób zawodowych',
                'slug' => Str::slug('Oddział chorób zawodowych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział dermatologiczny',
                'slug' => Str::slug('Oddział dermatologiczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział dermatologii dziecięcej',
                'slug' => Str::slug('Oddział dermatologii dziecięcej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział detoksykacji (alkoholowy)',
                'slug' => Str::slug('Oddział detoksykacji (alkoholowy)'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział detoksykacji (narkotyki i inne substancje psychoaktywne)',
                'slug' => Str::slug('Oddział detoksykacji (narkotyki i inne substancje psychoaktywne)'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział diabetologiczny',
                'slug' => Str::slug('Oddział diabetologiczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział diabetologii dziecięcej',
                'slug' => Str::slug('Oddział diabetologii dziecięcej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział dla przewlekle chorych',
                'slug' => Str::slug('Oddział dla przewlekle chorych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział dziecięcy dla przewlekle chorych',
                'slug' => Str::slug('Oddział dziecięcy dla przewlekle chorych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział dzienny dla osób z autyzmem dziecięcym',
                'slug' => Str::slug('Oddział dzienny dla osób z autyzmem dziecięcym'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział dzienny psychiatryczny',
                'slug' => Str::slug('Oddział dzienny psychiatryczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział dzienny psychiatryczny dla dzieci',
                'slug' => Str::slug('Oddział dzienny psychiatryczny dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział dzienny psychiatryczny geriatryczny',
                'slug' => Str::slug('Oddział dzienny psychiatryczny geriatryczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział dzienny psychiatryczny rehabilitacyjny',
                'slug' => Str::slug('Oddział dzienny psychiatryczny rehabilitacyjny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział dzienny psychiatryczny rehabilitacyjny dla dzieci',
                'slug' => Str::slug('Oddział dzienny psychiatryczny rehabilitacyjny dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział dzienny terapii uzależnienia od alkoholu',
                'slug' => Str::slug('Oddział dzienny terapii uzależnienia od alkoholu'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział dzienny terapii uzależnienia od alkoholu dla dzieci i młodzieży',
                'slug' => Str::slug('Oddział dzienny terapii uzależnienia od alkoholu dla dzieci i młodzieży'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział dzienny terapii uzależnienia od środków psychoaktywnych',
                'slug' => Str::slug('Oddział dzienny terapii uzależnienia od środków psychoaktywnych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział dzienny terapii uzależnienia od środków psychoaktywnych dla dzieci i młodzieży',
                'slug' => Str::slug('Oddział dzienny terapii uzależnienia od środków psychoaktywnych dla dzieci i młodzieży'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział dzienny zaburzeń nerwicowych',
                'slug' => Str::slug('Oddział dzienny zaburzeń nerwicowych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział dzienny zaburzeń nerwicowych u dzieci',
                'slug' => Str::slug('Oddział dzienny zaburzeń nerwicowych u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział endokrynologiczny',
                'slug' => Str::slug('Oddział endokrynologiczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział endokrynologiczny dziecięcy',
                'slug' => Str::slug('Oddział endokrynologiczny dziecięcy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział gastroenterologiczny',
                'slug' => Str::slug('Oddział gastroenterologiczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział gastroenterologiczny dziecięcy',
                'slug' => Str::slug('Oddział gastroenterologiczny dziecięcy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział gastrologiczny',
                'slug' => Str::slug('Oddział gastrologiczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział geriatryczny',
                'slug' => Str::slug('Oddział geriatryczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział ginekologiczno-położniczy',
                'slug' => Str::slug('Oddział ginekologiczno-położniczy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział ginekologiczny',
                'slug' => Str::slug('Oddział ginekologiczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział ginekologiczny dla dzieci',
                'slug' => Str::slug('Oddział ginekologiczny dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział gruźlicy',
                'slug' => Str::slug('Oddział gruźlicy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział gruźlicy i chorób płuc',
                'slug' => Str::slug('Oddział gruźlicy i chorób płuc'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział gruźlicy i chorób płuc dzieci',
                'slug' => Str::slug('Oddział gruźlicy i chorób płuc dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział gruźlicy i chorób płuc dzieci',
                'slug' => Str::slug('Oddział gruźlicy i chorób płuc dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział hematologiczny',
                'slug' => Str::slug('Oddział hematologiczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział hematologii dziecięcej',
                'slug' => Str::slug('Oddział hematologii dziecięcej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział hepatologiczny',
                'slug' => Str::slug('Oddział hepatologiczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział hepatologiczny dziecięcy',
                'slug' => Str::slug('Oddział hepatologiczny dziecięcy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział immunologii dziecięcej',
                'slug' => Str::slug('Oddział immunologii dziecięcej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział immunologii klinicznej',
                'slug' => Str::slug('Oddział immunologii klinicznej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział intensywnego nadzoru kardiologicznego',
                'slug' => Str::slug('Oddział intensywnego nadzoru kardiologicznego'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział intensywnego nadzoru kardiologicznego dla dzieci',
                'slug' => Str::slug('Oddział intensywnego nadzoru kardiologicznego dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział intensywnej terapii',
                'slug' => Str::slug('Oddział intensywnej terapii'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział intensywnej terapii dla dzieci',
                'slug' => Str::slug('Oddział intensywnej terapii dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział intensywnej terapii noworodka',
                'slug' => Str::slug('Oddział intensywnej terapii noworodka'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział kardiochirurgiczny',
                'slug' => Str::slug('Oddział kardiochirurgiczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział kardiochirurgii dziecięcej',
                'slug' => Str::slug('Oddział kardiochirurgii dziecięcej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział kardiologiczny',
                'slug' => Str::slug('Oddział kardiologiczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział kardiologii dziecięcej',
                'slug' => Str::slug('Oddział kardiologii dziecięcej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział leczenia uzależnień',
                'slug' => Str::slug('Oddział leczenia uzależnień'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział leczenia uzależnień u dzieci',
                'slug' => Str::slug('Oddział leczenia uzależnień u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział leczenia zaburzeń nerwicowych',
                'slug' => Str::slug('Oddział leczenia zaburzeń nerwicowych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział leczenia zaburzeń nerwicowych dla dzieci i młodzieży',
                'slug' => Str::slug('Oddział leczenia zaburzeń nerwicowych dla dzieci i młodzieży'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział medycyny nuklearnej',
                'slug' => Str::slug('Oddział medycyny nuklearnej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział medycyny paliatywnej',
                'slug' => Str::slug('Oddział medycyny paliatywnej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział medycyny paliatywnej dla dzieci',
                'slug' => Str::slug('Oddział medycyny paliatywnej dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział nefrologiczny',
                'slug' => Str::slug('Oddział nefrologiczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział nefrologii dziecięcej',
                'slug' => Str::slug('Oddział nefrologii dziecięcej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział neonatologiczny',
                'slug' => Str::slug('Oddział neonatologiczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział neurochirurgiczny',
                'slug' => Str::slug('Oddział neurochirurgiczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział neurochirurgii dziecięcej',
                'slug' => Str::slug('Oddział neurochirurgii dziecięcej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział neurologiczny',
                'slug' => Str::slug('Oddział neurologiczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział neurologii dziecięcej',
                'slug' => Str::slug('Oddział neurologii dziecięcej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział niemowlęcy',
                'slug' => Str::slug('Oddział niemowlęcy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział obserwacyjno-zakaźny',
                'slug' => Str::slug('Oddział obserwacyjno-zakaźny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział obserwacyjno-zakaźny dla dzieci',
                'slug' => Str::slug('Oddział obserwacyjno-zakaźny dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział odwykowy o wzmocnionym zabezpieczeniu',
                'slug' => Str::slug('Oddział odwykowy o wzmocnionym zabezpieczeniu'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział odwykowy o wzmocnionym zabezpieczeniu dla młodzieży',
                'slug' => Str::slug('Oddział odwykowy o wzmocnionym zabezpieczeniu dla młodzieży'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział okulistyczny',
                'slug' => Str::slug('Oddział okulistyczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział okulistyczny dla dzieci',
                'slug' => Str::slug('Oddział okulistyczny dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział onkologiczny',
                'slug' => Str::slug('Oddział onkologiczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział onkologii dziecięcej',
                'slug' => Str::slug('Oddział onkologii dziecięcej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział onkologii ginekologicznej',
                'slug' => Str::slug('Oddział onkologii ginekologicznej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział oparzeń',
                'slug' => Str::slug('Oddział oparzeń'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział oparzeń dla dzieci',
                'slug' => Str::slug('Oddział oparzeń dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział otolaryngologiczny',
                'slug' => Str::slug('Oddział otolaryngologiczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział otolaryngologiczny dla dzieci',
                'slug' => Str::slug('Oddział otolaryngologiczny dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział paraplegii i tetraplegii',
                'slug' => Str::slug('Oddział paraplegii i tetraplegii'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział patologii ciąży',
                'slug' => Str::slug('Oddział patologii ciąży'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział patologii noworodka',
                'slug' => Str::slug('Oddział patologii noworodka'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział pediatryczny',
                'slug' => Str::slug('Oddział pediatryczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział położniczy',
                'slug' => Str::slug('Oddział położniczy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział położniczy rooming-in',
                'slug' => Str::slug('Oddział położniczy rooming-in'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział psychiatrii sądowej',
                'slug' => Str::slug('Oddział psychiatrii sądowej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział psychiatrii sądowej o maksymalnym zabezpieczeniu',
                'slug' => Str::slug('Oddział psychiatrii sądowej o maksymalnym zabezpieczeniu'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział psychiatrii sądowej o wzmocnionym zabezpieczeniu',
                'slug' => Str::slug('Oddział psychiatrii sądowej o wzmocnionym zabezpieczeniu'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział psychiatrii sądowej o wzmocnionym zabezpieczeniu dla młodzieży',
                'slug' => Str::slug('Oddział psychiatrii sądowej o wzmocnionym zabezpieczeniu dla młodzieży'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział psychiatryczny',
                'slug' => Str::slug('Oddział psychiatryczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział psychiatryczny dla chorych na gruźlicę',
                'slug' => Str::slug('Oddział psychiatryczny dla chorych na gruźlicę'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział psychiatryczny dla dzieci',
                'slug' => Str::slug('Oddział psychiatryczny dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział psychiatryczny dla dzieci i młodzieży',
                'slug' => Str::slug('Oddział psychiatryczny dla dzieci i młodzieży'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział psychiatryczny dla młodzieży',
                'slug' => Str::slug('Oddział psychiatryczny dla młodzieży'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział psychiatryczny dla przewlekle chorych',
                'slug' => Str::slug('Oddział psychiatryczny dla przewlekle chorych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział psychogeriatryczny (zamknięty)',
                'slug' => Str::slug('Oddział psychogeriatryczny (zamknięty)'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział psychosomatyczny',
                'slug' => Str::slug('Oddział psychosomatyczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział pulmonologii',
                'slug' => Str::slug('Oddział pulmonologii'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział pulmonologii dziecięcej',
                'slug' => Str::slug('Oddział pulmonologii dziecięcej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział radioterapii',
                'slug' => Str::slug('Oddział radioterapii'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział rehabilitacji kardiologicznej',
                'slug' => Str::slug('Oddział rehabilitacji kardiologicznej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział rehabilitacji narządu ruchu',
                'slug' => Str::slug('Oddział rehabilitacji narządu ruchu'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział rehabilitacji narządu ruchu u dzieci',
                'slug' => Str::slug('Oddział rehabilitacji narządu ruchu u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział rehabilitacji neurologicznej',
                'slug' => Str::slug('Oddział rehabilitacji neurologicznej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział rehabilitacji neurologicznej u dzieci',
                'slug' => Str::slug('Oddział rehabilitacji neurologicznej u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział rehabilitacji psychiatrycznej',
                'slug' => Str::slug('Oddział rehabilitacji psychiatrycznej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział rehabilitacyjny',
                'slug' => Str::slug('Oddział rehabilitacyjny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział rehabilitacyjny dzieci',
                'slug' => Str::slug('Oddział rehabilitacyjny dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział reumatologiczny',
                'slug' => Str::slug('Oddział reumatologiczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział terapii jodem',
                'slug' => Str::slug('Oddział terapii jodem'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział terapii uzależnienia od alkoholu',
                'slug' => Str::slug('Oddział terapii uzależnienia od alkoholu'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział terapii uzależnienia od alkoholu dla dzieci i młodzieży',
                'slug' => Str::slug('Oddział terapii uzależnienia od alkoholu dla dzieci i młodzieży'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział terapii uzależnienia od alkoholu dla dzieci i młodzieży',
                'slug' => Str::slug('Oddział terapii uzależnienia od alkoholu dla dzieci i młodzieży'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział terapii uzależnienia od narkotyków, substancji psychoaktywnych',
                'slug' => Str::slug('Oddział terapii uzależnienia od narkotyków, substancji psychoaktywnych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział terapii uzależnienia od narkotyków, substancji psychoaktywnych dla dzieci',
                'slug' => Str::slug('Oddział terapii uzależnienia od narkotyków, substancji psychoaktywnych dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział terenowy',
                'slug' => Str::slug('Oddział terenowy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział toksykologiczny',
                'slug' => Str::slug('Oddział toksykologiczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział toksykologiczny dla dzieci',
                'slug' => Str::slug('Oddział toksykologiczny dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział transplantacji nerek',
                'slug' => Str::slug('Oddział transplantacji nerek'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział transplantacji szpiku',
                'slug' => Str::slug('Oddział transplantacji szpiku'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział transplantacji szpiku dla dzieci',
                'slug' => Str::slug('Oddział transplantacji szpiku dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział transplantologiczny',
                'slug' => Str::slug('Oddział transplantologiczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział udarowy',
                'slug' => Str::slug('Oddział udarowy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział urazowo-ortopedyczny dziecięcy',
                'slug' => Str::slug('Oddział urazowo-ortopedyczny dziecięcy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział urologiczny',
                'slug' => Str::slug('Oddział urologiczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział urologii dziecięcej',
                'slug' => Str::slug('Oddział urologii dziecięcej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział wszczepiania rozruszników',
                'slug' => Str::slug('Oddział wszczepiania rozruszników'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Oddział WZW',
                'slug' => Str::slug('Oddział WZW'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Opieka domowa, rodzinna',
                'slug' => Str::slug('Opieka domowa, rodzinna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Ośrodek alzheimerowski',
                'slug' => Str::slug('Ośrodek alzheimerowski'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Ośrodek leczenia uzależnień, bliżej niescharakteryzowany',
                'slug' => Str::slug('Ośrodek leczenia uzależnień, bliżej niescharakteryzowany'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Ośrodek leczenia uzależnień, bliżej niescharakteryzowany dla dzieci',
                'slug' => Str::slug('Ośrodek leczenia uzależnień, bliżej niescharakteryzowany dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Ośrodek rehabilitacji dziennej',
                'slug' => Str::slug('Ośrodek rehabilitacji dziennej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Ośrodek rehabilitacji dziennej dzieci',
                'slug' => Str::slug('Ośrodek rehabilitacji dziennej dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pielęgniarska domowa opieka długoterminowa',
                'slug' => Str::slug('Pielęgniarska domowa opieka długoterminowa'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pielęgniarska domowa opieka długoterminowa dla dzieci',
                'slug' => Str::slug('Pielęgniarska domowa opieka długoterminowa dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia (gabinet) lekarza POZ',
                'slug' => Str::slug('Poradnia (gabinet) lekarza POZ'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia (gabinet) lekarza POZ dla dzieci',
                'slug' => Str::slug('Poradnia (gabinet) lekarza POZ dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia (gabinet) lekarza rodzinnego',
                'slug' => Str::slug('Poradnia (gabinet) lekarza rodzinnego'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia (gabinet) lekarza rodzinnego dla dzieci',
                'slug' => Str::slug('Poradnia (gabinet) lekarza rodzinnego dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia (gabinet) pielęgniarki i położnej środowiskowej',
                'slug' => Str::slug('Poradnia (gabinet) pielęgniarki i położnej środowiskowej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia (gabinet) pielęgniarki i położnej środowiskowej dla dzieci',
                'slug' => Str::slug('Poradnia (gabinet) pielęgniarki i położnej środowiskowej dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia (gabinet) pielęgniarki środowiskowej - rodzinnej',
                'slug' => Str::slug('Poradnia (gabinet) pielęgniarki środowiskowej - rodzinnej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia (gabinet) położnej środowiskowej - rodzinnej',
                'slug' => Str::slug('Poradnia (gabinet) położnej środowiskowej - rodzinnej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia (gabinet) położnej środowiskowej - rodzinnej dla dzieci',
                'slug' => Str::slug('Poradnia (gabinet) położnej środowiskowej - rodzinnej dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia AIDS',
                'slug' => Str::slug('Poradnia AIDS'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia AIDS u dzieci',
                'slug' => Str::slug('Poradnia AIDS u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia alergii oddechowych',
                'slug' => Str::slug('Poradnia alergii oddechowych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia alergii oddechowych u dzieci',
                'slug' => Str::slug('Poradnia alergii oddechowych u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia alergii pokarmowych',
                'slug' => Str::slug('Poradnia alergii pokarmowych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia alergii pokarmowych dzieci',
                'slug' => Str::slug('Poradnia alergii pokarmowych dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia alergii skórnych',
                'slug' => Str::slug('Poradnia alergii skórnych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia alergii skórnych u dzieci',
                'slug' => Str::slug('Poradnia alergii skórnych u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia alergologiczna',
                'slug' => Str::slug('Poradnia alergologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia alergologiczna dla dzieci',
                'slug' => Str::slug('Poradnia alergologiczna dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia andrologiczna',
                'slug' => Str::slug('Poradnia andrologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia antynikotynowa',
                'slug' => Str::slug('Poradnia antynikotynowa'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia audiologiczna',
                'slug' => Str::slug('Poradnia audiologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia audiologiczna dziecięca',
                'slug' => Str::slug('Poradnia audiologiczna dziecięca'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chemioterapii',
                'slug' => Str::slug('Poradnia chemioterapii'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chemioterapii dla dzieci',
                'slug' => Str::slug('Poradnia chemioterapii dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chirurgii dziecięcej',
                'slug' => Str::slug('Poradnia chirurgii dziecięcej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chirurgii dziecięcej onkologicznej',
                'slug' => Str::slug('Poradnia chirurgii dziecięcej onkologicznej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chirurgii endokrynologicznej',
                'slug' => Str::slug('Poradnia chirurgii endokrynologicznej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chirurgii endokrynologicznej dla dzieci',
                'slug' => Str::slug('Poradnia chirurgii endokrynologicznej dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chirurgii klatki piersiowej',
                'slug' => Str::slug('Poradnia chirurgii klatki piersiowej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chirurgii naczyniowej',
                'slug' => Str::slug('Poradnia chirurgii naczyniowej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chirurgii naczyniowej dla dzieci',
                'slug' => Str::slug('Poradnia chirurgii naczyniowej dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chirurgii ogólnej',
                'slug' => Str::slug('Poradnia chirurgii ogólnej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chirurgii onkologicznej',
                'slug' => Str::slug('Poradnia chirurgii onkologicznej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chirurgii plastycznej',
                'slug' => Str::slug('Poradnia chirurgii plastycznej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chirurgii plastycznej dla dzieci',
                'slug' => Str::slug('Poradnia chirurgii plastycznej dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chirurgii przewodu pokarmowego',
                'slug' => Str::slug('Poradnia chirurgii przewodu pokarmowego'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chirurgii ręki',
                'slug' => Str::slug('Poradnia chirurgii ręki'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chirurgii ręki dla dzieci',
                'slug' => Str::slug('Poradnia chirurgii ręki dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chirurgii stomatologicznej',
                'slug' => Str::slug('Poradnia chirurgii stomatologicznej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chirurgii stomatologicznej u dzieci',
                'slug' => Str::slug('Poradnia chirurgii stomatologicznej u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chirurgii szczękowo-twarzowej',
                'slug' => Str::slug('Poradnia chirurgii szczękowo-twarzowej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chirurgii szczękowo-twarzowej u dzieci',
                'slug' => Str::slug('Poradnia chirurgii szczękowo-twarzowej u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chirurgii urazowo-ortopedycznej',
                'slug' => Str::slug('Poradnia chirurgii urazowo-ortopedycznej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chirurgii urazowo-ortopedycznej dziecięca',
                'slug' => Str::slug('Poradnia chirurgii urazowo-ortopedycznej dziecięca'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chorób błon śluzowych przyzębia',
                'slug' => Str::slug('Poradnia chorób błon śluzowych przyzębia'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chorób błon śluzowych przyzębia u dzieci',
                'slug' => Str::slug('Poradnia chorób błon śluzowych przyzębia u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chorób jelitowych',
                'slug' => Str::slug('Poradnia chorób jelitowych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chorób jelitowych dla dzieci',
                'slug' => Str::slug('Poradnia chorób jelitowych dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chorób metabolicznych',
                'slug' => Str::slug('Poradnia chorób metabolicznych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chorób metabolicznych dla dzieci',
                'slug' => Str::slug('Poradnia chorób metabolicznych dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chorób mięśni',
                'slug' => Str::slug('Poradnia chorób mięśni'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chorób mięśni u dzieci',
                'slug' => Str::slug('Poradnia chorób mięśni u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chorób naczyniowych mózgu',
                'slug' => Str::slug('Poradnia chorób naczyniowych mózgu'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chorób naczyń',
                'slug' => Str::slug('Poradnia chorób naczyń'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chorób naczyń u dzieci',
                'slug' => Str::slug('Poradnia chorób naczyń u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chorób odzwierzęcych i pasożytniczych',
                'slug' => Str::slug('Poradnia chorób odzwierzęcych i pasożytniczych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chorób odzwierzęcych i pasożytniczych u dzieci',
                'slug' => Str::slug('Poradnia chorób odzwierzęcych i pasożytniczych u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chorób tropikalnych',
                'slug' => Str::slug('Poradnia chorób tropikalnych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chorób wewnętrznych',
                'slug' => Str::slug('Poradnia chorób wewnętrznych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chorób wewnętrznych dla dzieci',
                'slug' => Str::slug('Poradnia chorób wewnętrznych dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chorób zakaźnych',
                'slug' => Str::slug('Poradnia chorób zakaźnych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chorób zakaźnych u dzieci',
                'slug' => Str::slug('Poradnia chorób zakaźnych u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia chorób zawodowych',
                'slug' => Str::slug('Poradnia chorób zawodowych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia dermatologiczna',
                'slug' => Str::slug('Poradnia dermatologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia dermatologii dziecięcej',
                'slug' => Str::slug('Poradnia dermatologii dziecięcej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia diabetologiczna',
                'slug' => Str::slug('Poradnia diabetologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia diabetologiczna dziecięca',
                'slug' => Str::slug('Poradnia diabetologiczna dziecięca'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia dziecięca transplantacji nerek',
                'slug' => Str::slug('Poradnia dziecięca transplantacji nerek'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia dziecięca transplantacji szpiku',
                'slug' => Str::slug('Poradnia dziecięca transplantacji szpiku'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia endokrynologiczna',
                'slug' => Str::slug('Poradnia endokrynologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia endokrynologiczna dla dzieci',
                'slug' => Str::slug('Poradnia endokrynologiczna dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia endokrynologiczna osteoporozy',
                'slug' => Str::slug('Poradnia endokrynologiczna osteoporozy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia endokrynologiczno-ginekologiczna',
                'slug' => Str::slug('Poradnia endokrynologiczno-ginekologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia endokrynologiczno-ginekologiczna dla dzieci',
                'slug' => Str::slug('Poradnia endokrynologiczno-ginekologiczna dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia foniatryczna',
                'slug' => Str::slug('Poradnia foniatryczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia foniatryczna dziecięca',
                'slug' => Str::slug('Poradnia foniatryczna dziecięca'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia ftyzjatryczna',
                'slug' => Str::slug('Poradnia ftyzjatryczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia ftyzjatryczna dla dzieci',
                'slug' => Str::slug('Poradnia ftyzjatryczna dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia gastroenterologiczna',
                'slug' => Str::slug('Poradnia gastroenterologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia gastroenterologiczna dla dzieci',
                'slug' => Str::slug('Poradnia gastroenterologiczna dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia gastrologiczna',
                'slug' => Str::slug('Poradnia gastrologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia gastrologiczna dla dzieci',
                'slug' => Str::slug('Poradnia gastrologiczna dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia genetyczna',
                'slug' => Str::slug('Poradnia genetyczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia genetyczna dla dzieci',
                'slug' => Str::slug('Poradnia genetyczna dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia geriatryczna',
                'slug' => Str::slug('Poradnia geriatryczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia ginekologiczna',
                'slug' => Str::slug('Poradnia ginekologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia ginekologiczna dla dziewcząt',
                'slug' => Str::slug('Poradnia ginekologiczna dla dziewcząt'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia ginekologiczno-położnicza',
                'slug' => Str::slug('Poradnia ginekologiczno-położnicza'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia ginekologii onkologicznej',
                'slug' => Str::slug('Poradnia ginekologii onkologicznej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia gruźlicy i chorób płuc',
                'slug' => Str::slug('Poradnia gruźlicy i chorób płuc'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia gruźlicy i chorób płuc dla dzieci',
                'slug' => Str::slug('Poradnia gruźlicy i chorób płuc dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia hematologiczna',
                'slug' => Str::slug('Poradnia hematologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia hematologii dziecięcej',
                'slug' => Str::slug('Poradnia hematologii dziecięcej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia hepatologiczna',
                'slug' => Str::slug('Poradnia hepatologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia hepatologiczna dziecięca',
                'slug' => Str::slug('Poradnia hepatologiczna dziecięca'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia immunologiczna',
                'slug' => Str::slug('Poradnia immunologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia immunologiczna dla dzieci',
                'slug' => Str::slug('Poradnia immunologiczna dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia kardiochirurgiczna',
                'slug' => Str::slug('Poradnia kardiochirurgiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia kardiochirurgiczna dziecięca',
                'slug' => Str::slug('Poradnia kardiochirurgiczna dziecięca'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia kardiologiczna',
                'slug' => Str::slug('Poradnia kardiologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia kardiologii dziecięcej',
                'slug' => Str::slug('Poradnia kardiologii dziecięcej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia laktacyjna',
                'slug' => Str::slug('Poradnia laktacyjna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia leczenia bólu (neurologiczna)',
                'slug' => Str::slug('Poradnia leczenia bólu (neurologiczna)'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia leczenia bólu dla dzieci',
                'slug' => Str::slug('Poradnia leczenia bólu dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia leczenia jaskry',
                'slug' => Str::slug('Poradnia leczenia jaskry'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia leczenia jaskry u dzieci',
                'slug' => Str::slug('Poradnia leczenia jaskry u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia leczenia mukowiscydozy',
                'slug' => Str::slug('Poradnia leczenia mukowiscydozy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia leczenia mukowiscydozy dla dzieci',
                'slug' => Str::slug('Poradnia leczenia mukowiscydozy dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia leczenia nerwic',
                'slug' => Str::slug('Poradnia leczenia nerwic'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia leczenia nerwic u dzieci',
                'slug' => Str::slug('Poradnia leczenia nerwic u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia leczenia niepłodności',
                'slug' => Str::slug('Poradnia leczenia niepłodności'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia leczenia obrzęku limfatycznego',
                'slug' => Str::slug('Poradnia leczenia obrzęku limfatycznego'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia leczenia ran',
                'slug' => Str::slug('Poradnia leczenia ran'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia leczenia uzależnień',
                'slug' => Str::slug('Poradnia leczenia uzależnień'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia leczenia uzależnień u dzieci',
                'slug' => Str::slug('Poradnia leczenia uzależnień u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia leczenia zeza',
                'slug' => Str::slug('Poradnia leczenia zeza'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia leczenia zeza u dzieci',
                'slug' => Str::slug('Poradnia leczenia zeza u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia logopedyczna',
                'slug' => Str::slug('Poradnia logopedyczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia logopedyczna dla dzieci',
                'slug' => Str::slug('Poradnia logopedyczna dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia medycyny nuklearnej',
                'slug' => Str::slug('Poradnia medycyny nuklearnej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia medycyny paliatywnej',
                'slug' => Str::slug('Poradnia medycyny paliatywnej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia medycyny paliatywnej dla dzieci',
                'slug' => Str::slug('Poradnia medycyny paliatywnej dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia medycyny pracy',
                'slug' => Str::slug('Poradnia medycyny pracy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia medycyny sportowej',
                'slug' => Str::slug('Poradnia medycyny sportowej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia medycyny sportowej dla dzieci i mlodzieży',
                'slug' => Str::slug('Poradnia medycyny sportowej dla dzieci i mlodzieży'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia nadciśnienia tętniczego',
                'slug' => Str::slug('Poradnia nadciśnienia tętniczego'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia nefrologiczna',
                'slug' => Str::slug('Poradnia nefrologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia nadciśnienia tętniczego dla dzieci',
                'slug' => Str::slug('Poradnia nadciśnienia tętniczego dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia nefrologii dziecięcej',
                'slug' => Str::slug('Poradnia nefrologii dziecięcej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia neonatologiczna',
                'slug' => Str::slug('Poradnia neonatologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia neurochirurgiczna',
                'slug' => Str::slug('Poradnia neurochirurgiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia neurochirurgiczna dziecięca',
                'slug' => Str::slug('Poradnia neurochirurgiczna dziecięca'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia neurologiczna',
                'slug' => Str::slug('Poradnia neurologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia neurologii dziecięcej',
                'slug' => Str::slug('Poradnia neurologii dziecięcej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia nowotworów krwi',
                'slug' => Str::slug('Poradnia nowotworów krwi'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia nowotworów krwi u dzieci',
                'slug' => Str::slug('Poradnia nowotworów krwi u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia okresu przekwitania',
                'slug' => Str::slug('Poradnia okresu przekwitania'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia okulistyczna',
                'slug' => Str::slug('Poradnia okulistyczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia okulistyczna dziecięca',
                'slug' => Str::slug('Poradnia okulistyczna dziecięca'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia onkologiczna',
                'slug' => Str::slug('Poradnia onkologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia onkologiczna dla dzieci',
                'slug' => Str::slug('Poradnia onkologiczna dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia oparzeń',
                'slug' => Str::slug('Poradnia oparzeń'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia oparzeń u dzieci',
                'slug' => Str::slug('Poradnia oparzeń u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia ortodontyczna',
                'slug' => Str::slug('Poradnia ortodontyczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia ortodontyczna dla dzieci',
                'slug' => Str::slug('Poradnia ortodontyczna dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia osteoporozy',
                'slug' => Str::slug('Poradnia osteoporozy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia otolaryngologiczna',
                'slug' => Str::slug('Poradnia otolaryngologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia otolaryngologiczna u dzieci',
                'slug' => Str::slug('Poradnia otolaryngologiczna u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia padaczki',
                'slug' => Str::slug('Poradnia padaczki'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia padaczki dziecięcej',
                'slug' => Str::slug('Poradnia padaczki dziecięcej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia parkinsonizmu i chorób układu pozapiramidowego',
                'slug' => Str::slug('Poradnia parkinsonizmu i chorób układu pozapiramidowego'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia patologii ciąży',
                'slug' => Str::slug('Poradnia patologii ciąży'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia pediatryczna',
                'slug' => Str::slug('Poradnia pediatryczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia pediatryczna szczepień dla dzieci z grup wysokiego ryzyka',
                'slug' => Str::slug('Poradnia pediatryczna szczepień dla dzieci z grup wysokiego ryzyka'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia planowania rodziny i rozrodczości',
                'slug' => Str::slug('Poradnia planowania rodziny i rozrodczości'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia preluksacyjna',
                'slug' => Str::slug('Poradnia preluksacyjna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia profilaktyki chorób piersi',
                'slug' => Str::slug('Poradnia profilaktyki chorób piersi'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia proktologiczna',
                'slug' => Str::slug('Poradnia proktologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia promocji zdrowia',
                'slug' => Str::slug('Poradnia promocji zdrowia'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia promocji zdrowia dla dzieci',
                'slug' => Str::slug('Poradnia promocji zdrowia dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia protetyki stomatologicznej',
                'slug' => Str::slug('Poradnia protetyki stomatologicznej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia protetyki stomatologicznej dla dzieci',
                'slug' => Str::slug('Poradnia protetyki stomatologicznej dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia psychologiczna',
                'slug' => Str::slug('Poradnia psychologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia psychologiczna dziecięca',
                'slug' => Str::slug('Poradnia psychologiczna dziecięca'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia psychosomatyczna',
                'slug' => Str::slug('Poradnia psychosomatyczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia psychosomatyczna dziecięca',
                'slug' => Str::slug('Poradnia psychosomatyczna dziecięca'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia psychoterapii',
                'slug' => Str::slug('Poradnia psychoterapii'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia psychoterapii u dzieci',
                'slug' => Str::slug('Poradnia psychoterapii u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia pulmonologiczna',
                'slug' => Str::slug('Poradnia pulmonologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia pulmonologiczna dla dzieci',
                'slug' => Str::slug('Poradnia pulmonologiczna dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia radioterapii',
                'slug' => Str::slug('Poradnia radioterapii'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia rehabilitacji kardiologicznej',
                'slug' => Str::slug('Poradnia rehabilitacji kardiologicznej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia rehabilitacji kardiologicznej dzieci',
                'slug' => Str::slug('Poradnia rehabilitacji kardiologicznej dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia rehabilitacji narządu ruchu',
                'slug' => Str::slug('Poradnia rehabilitacji narządu ruchu'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia rehabilitacji narządu ruchu dzieci',
                'slug' => Str::slug('Poradnia rehabilitacji narządu ruchu dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia rehabilitacji neurologicznej',
                'slug' => Str::slug('Poradnia rehabilitacji neurologicznej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia rehabilitacji neurologicznej dzieci',
                'slug' => Str::slug('Poradnia rehabilitacji neurologicznej dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia rehabilitacyjna',
                'slug' => Str::slug('Poradnia rehabilitacyjna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia rehabilitacyjna dla dzieci',
                'slug' => Str::slug('Poradnia rehabilitacyjna dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia reumatologiczna',
                'slug' => Str::slug('Poradnia reumatologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia reumatologiczna dla dzieci',
                'slug' => Str::slug('Poradnia reumatologiczna dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia schorzeń tarczycy',
                'slug' => Str::slug('Poradnia schorzeń tarczycy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia schorzeń tarczycy u dzieci',
                'slug' => Str::slug('Poradnia schorzeń tarczycy u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia seksuologiczna i patologii współżycia',
                'slug' => Str::slug('Poradnia seksuologiczna i patologii współżycia'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia stomatologiczna',
                'slug' => Str::slug('Poradnia stomatologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia stomatologiczna dla dzieci',
                'slug' => Str::slug('Poradnia stomatologiczna dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia stomatologii zachowawczej',
                'slug' => Str::slug('Poradnia stomatologii zachowawczej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia stwardnienia rozsianego',
                'slug' => Str::slug('Poradnia stwardnienia rozsianego'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia terapii uzależnienia i współuzależnienia od alkoholu',
                'slug' => Str::slug('Poradnia terapii uzależnienia i współuzależnienia od alkoholu'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia terapii uzależnienia od substancji psychoaktywnych',
                'slug' => Str::slug('Poradnia terapii uzależnienia od substancji psychoaktywnych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia terapii uzależnienia od substancji psychoaktywnych u dzieci',
                'slug' => Str::slug('Poradnia terapii uzależnienia od substancji psychoaktywnych u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia toksykologiczna',
                'slug' => Str::slug('Poradnia toksykologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia transplantacji nerek',
                'slug' => Str::slug('Poradnia transplantacji nerek'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia transplantacji serca',
                'slug' => Str::slug('Poradnia transplantacji serca'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia transplantacji szpiku',
                'slug' => Str::slug('Poradnia transplantacji szpiku'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia transplantacji wątroby',
                'slug' => Str::slug('Poradnia transplantacji wątroby'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia transplantacji wątroby dla dzieci',
                'slug' => Str::slug('Poradnia transplantacji wątroby dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia transplantologiczna',
                'slug' => Str::slug('Poradnia transplantologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia urologiczna',
                'slug' => Str::slug('Poradnia urologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia urologiczna dziecięca',
                'slug' => Str::slug('Poradnia urologiczna dziecięca'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia wad postawy',
                'slug' => Str::slug('Poradnia wad postawy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia wad serca',
                'slug' => Str::slug('Poradnia wad serca'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia wad serca u dzieci',
                'slug' => Str::slug('Poradnia wad serca u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia wenerologiczna',
                'slug' => Str::slug('Poradnia wenerologiczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia WZW',
                'slug' => Str::slug('Poradnia WZW'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia WZW u dzieci',
                'slug' => Str::slug('Poradnia WZW u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia zaburzeń i wad rozwojowych dzieci',
                'slug' => Str::slug('Poradnia zaburzeń i wad rozwojowych dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia zaopatrzenia ortopedycznego',
                'slug' => Str::slug('Poradnia zaopatrzenia ortopedycznego'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia zaopatrzenia ortopedycznego dla dzieci',
                'slug' => Str::slug('Poradnia zaopatrzenia ortopedycznego dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia zdrowia psychicznego',
                'slug' => Str::slug('Poradnia zdrowia psychicznego'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia zdrowia psychicznego dla dzieci',
                'slug' => Str::slug('Poradnia zdrowia psychicznego dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Poradnia zdrowia psychicznego dla młodzieży',
                'slug' => Str::slug('Poradnia zdrowia psychicznego dla młodzieży'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia (punkt zaopatrzenia) w środki optyczne',
                'slug' => Str::slug('Pracownia (punkt zaopatrzenia) w środki optyczne'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia (punkt zaopatrzenia) w środki wspomagania słuchu',
                'slug' => Str::slug('Pracownia (punkt zaopatrzenia) w środki wspomagania słuchu'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia akupresury i akupunktury',
                'slug' => Str::slug('Pracownia akupresury i akupunktury'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia angiografii',
                'slug' => Str::slug('Pracownia angiografii'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia diagnostyczna',
                'slug' => Str::slug('Pracownia diagnostyczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia diagnostyczna dla dzieci',
                'slug' => Str::slug('Pracownia diagnostyczna dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia diagnostyczna i terapeutyczna',
                'slug' => Str::slug('Pracownia diagnostyczna i terapeutyczna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia diagnostyczna i terapeutyczna dla dzieci',
                'slug' => Str::slug('Pracownia diagnostyczna i terapeutyczna dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia diagnostyki laboratoryjnej',
                'slug' => Str::slug('Pracownia diagnostyki laboratoryjnej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia diagnostyki mikrobiologicznej',
                'slug' => Str::slug('Pracownia diagnostyki mikrobiologicznej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia diagnostyki obrazowej',
                'slug' => Str::slug('Pracownia diagnostyki obrazowej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia diagnostyki obrazowej dla dzieci',
                'slug' => Str::slug('Pracownia diagnostyki obrazowej dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia endoskopii',
                'slug' => Str::slug('Pracownia endoskopii'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia endoskopii dla dzieci',
                'slug' => Str::slug('Pracownia endoskopii dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia medyczna dziecięca inna',
                'slug' => Str::slug('Pracownia medyczna dziecięca inna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia medyczna inna',
                'slug' => Str::slug('Pracownia medyczna inna'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia protetyki stomatologicznej',
                'slug' => Str::slug('Pracownia protetyki stomatologicznej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia rentgenodiagnostyki ogólnej',
                'slug' => Str::slug('Pracownia rentgenodiagnostyki ogólnej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia rentgenodiagnostyki zabiegowej',
                'slug' => Str::slug('Pracownia rentgenodiagnostyki zabiegowej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia rezonansu magnetycznego',
                'slug' => Str::slug('Pracownia rezonansu magnetycznego'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia scyntygrafii',
                'slug' => Str::slug('Pracownia scyntygrafii'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia środków pomocniczych',
                'slug' => Str::slug('Pracownia środków pomocniczych'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia tomografii komputerowej',
                'slug' => Str::slug('Pracownia tomografii komputerowej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia usg',
                'slug' => Str::slug('Pracownia usg'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia usg dla dzieci',
                'slug' => Str::slug('Pracownia usg dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Pracownia ziołolecznictwa',
                'slug' => Str::slug('Pracownia ziołolecznictwa'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Prosektorium',
                'slug' => Str::slug('Prosektorium'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Punkt felczerski',
                'slug' => Str::slug('Punkt felczerski'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Punkt pobrań krwi',
                'slug' => Str::slug('Punkt pobrań krwi'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Punkt pobrań materiałów do badań',
                'slug' => Str::slug('Punkt pobrań materiałów do badań'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Punkt pobrań materiałów do badań dla dzieci',
                'slug' => Str::slug('Punkt pobrań materiałów do badań dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Punkt pobrań tkanek i szpiku kostnego',
                'slug' => Str::slug('Punkt pobrań tkanek i szpiku kostnego'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Punkt szczepień',
                'slug' => Str::slug('Punkt szczepień'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Punkt szczepień dla dzieci',
                'slug' => Str::slug('Punkt szczepień dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Sala porodowa',
                'slug' => Str::slug('Sala porodowa'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Sanatorium uzdrowiskowe',
                'slug' => Str::slug('Sanatorium uzdrowiskowe'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Sanatorium uzdrowiskowe dla dzieci',
                'slug' => Str::slug('Sanatorium uzdrowiskowe dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Stacja dializ',
                'slug' => Str::slug('Stacja dializ'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Stacja dializ dla dzieci',
                'slug' => Str::slug('Stacja dializ dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Sterylizatornia',
                'slug' => Str::slug('Sterylizatornia'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => '>Szkoła rodzenia',
                'slug' => Str::slug('>Szkoła rodzenia'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Szpitalny oddział ratunkowy',
                'slug' => Str::slug('Szpitalny oddział ratunkowy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Szpitalny oddział ratunkowy dziecięcy',
                'slug' => Str::slug('Szpitalny oddział ratunkowy dziecięcy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Szpital uzdrowiskowy',
                'slug' => Str::slug('Szpital uzdrowiskowy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Szpital uzdrowiskowy dla dzieci',
                'slug' => Str::slug('Szpital uzdrowiskowy dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Wodne pogotowie ratunkowe',
                'slug' => Str::slug('Wodne pogotowie ratunkowe'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zakład/oddział dzienny opiekuńczo-leczniczy psychiatryczny',
                'slug' => Str::slug('Zakład/oddział dzienny opiekuńczo-leczniczy psychiatryczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zakład/oddział dzienny pielęgnacyjno-opiekuńczy psychiatryczny',
                'slug' => Str::slug('Zakład/oddział dzienny pielęgnacyjno-opiekuńczy psychiatryczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zakład/oddział medycyny sądowej',
                'slug' => Str::slug('Zakład/oddział medycyny sądowej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zakład medycyny nuklearnej',
                'slug' => Str::slug('Zakład medycyny nuklearnej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zakład medycyny nuklearnej dla dzieci',
                'slug' => Str::slug('Zakład medycyny nuklearnej dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zakład opiekuńczo-leczniczy',
                'slug' => Str::slug('Zakład opiekuńczo-leczniczy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zakład opiekuńczo-leczniczy dla dzieci',
                'slug' => Str::slug('Zakład opiekuńczo-leczniczy dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zakład opiekuńczo-leczniczy psychiatryczny',
                'slug' => Str::slug('Zakład opiekuńczo-leczniczy psychiatryczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zakład patomorfologii',
                'slug' => Str::slug('Zakład patomorfologii'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zakład pielęgnacyjno-opiekuńczy',
                'slug' => Str::slug('Zakład pielęgnacyjno-opiekuńczy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zakład pielęgnacyjno-opiekuńczy',
                'slug' => Str::slug('Zakład pielęgnacyjno-opiekuńczy'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zakład pielęgnacyjno-opiekuńczy psychiatryczny',
                'slug' => Str::slug('Zakład pielęgnacyjno-opiekuńczy psychiatryczny'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zakład pielęgnacyjno-opiekuńczy psychiatryczny dla dzieci',
                'slug' => Str::slug('Zakład pielęgnacyjno-opiekuńczy psychiatryczny dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zespół (oddział) leczenia środowiskowego (domowego)',
                'slug' => Str::slug('Zespół (oddział) leczenia środowiskowego (domowego)'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zespół (oddział) leczenia środowiskowego (domowego) dla dzieci',
                'slug' => Str::slug('Zespół (oddział) leczenia środowiskowego (domowego) dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zespół długoterminowej opieki domowej',
                'slug' => Str::slug('Zespół długoterminowej opieki domowej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zespół długoterminowej opieki domowej dla dzieci',
                'slug' => Str::slug('Zespół długoterminowej opieki domowej dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zespół domowego leczenia tlenem',
                'slug' => Str::slug('Zespół domowego leczenia tlenem'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zespół domowego leczenia tlenem u dzieci',
                'slug' => Str::slug('Zespół domowego leczenia tlenem u dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zespół domowej dializoterapii otrzewnowej',
                'slug' => Str::slug('Zespół domowej dializoterapii otrzewnowej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zespół domowej dializoterapii otrzewnowej dziecięcej',
                'slug' => Str::slug('Zespół domowej dializoterapii otrzewnowej dziecięcej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zespół leczenia środowiskowego (domowego) dla osób z autyzmem',
                'slug' => Str::slug('Zespół leczenia środowiskowego (domowego) dla osób z autyzmem'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zespół lotnictwa sanitarnego',
                'slug' => Str::slug('Zespół lotnictwa sanitarnego'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zespół opieki domowej przy zakładzie/oddziale pielęgnacyjnoopiekuńczym lub opiekuńczo-leczniczym psychiatrycznym',
                'slug' => Str::slug('Zespół opieki domowej przy zakładzie/oddziale pielęgnacyjnoopiekuńczym lub opiekuńczo-leczniczym psychiatrycznym'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zespół rehabilitacji domowej',
                'slug' => Str::slug('Zespół rehabilitacji domowej'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zespół rehabilitacji domowej dla dzieci',
                'slug' => Str::slug('Zespół rehabilitacji domowej dla dzieci'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zespół transportu sanitarnego',
                'slug' => Str::slug('Zespół transportu sanitarnego'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zespół wyjazdowy kardiologiczny K',
                'slug' => Str::slug('Zespół wyjazdowy kardiologiczny K'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zespół wyjazdowy neonatologiczny N',
                'slug' => Str::slug('Zespół wyjazdowy neonatologiczny N'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zespół wyjazdowy ogóln',
                'slug' => Str::slug('Zespół wyjazdowy ogóln'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zespół wyjazdowy reanimacyjny R',
                'slug' => Str::slug('Zespół wyjazdowy reanimacyjny R'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zespół wyjazdowy reanimacyjny R',
                'slug' => Str::slug('Zespół wyjazdowy reanimacyjny R'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Zespół wyjazdowy wypadkowy W',
                'slug' => Str::slug('Zespół wyjazdowy wypadkowy W'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Żłobek',
                'slug' => Str::slug('Żłobek'),
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
        Schema::dropIfExists('departments');
    }
}
