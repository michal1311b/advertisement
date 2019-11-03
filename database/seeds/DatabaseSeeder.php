<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Role comes before User seeder here.
        $this->call(RoleTableSeeder::class);
        // User seeder will use the roles above created.
        $this->call(UserTableSeeder::class);
        $this->call(ProfileTableSeeder::class);
        $this->call(LocationTableSeeder::class);
        $this->call(SpecializationTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);
        $this->call(AdvertisementSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
    }
}
