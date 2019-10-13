<?php

use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Eloquent::unguard();

        $path = 'public/locations.sql';
        \DB::statement(file_get_contents($path));
        $this->command->info('Locaions table seeded!');
    }
}
