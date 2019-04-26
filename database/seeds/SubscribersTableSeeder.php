<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Faker\Provider\Internet;

class SubscribersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::create(2019, 3, 28, 0, 0, 0);
        $faker = \Faker\Factory::create();

        DB::table('subscribers')->insert([
            'name' => Str::random(10),
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => $faker->date($format = 'Y-m-d', $max = 'now') . ' ' . $faker->time($format = 'Y-m-d', $max = 'now'),
            'invitation' => Str::random(10),
            'got_price' => 1,
            'event_name' => Str::random(10),
        ]);
    }
}
