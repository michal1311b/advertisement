<?php

use App\Page;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach(range(1, 10) as $index) {
            $title = $faker->sentence(5);

            Page::create([
                'title' => $title,
                'shot_description' => $faker->sentence(10),
                'body' => $faker->paragraph(4),
                'slug' => str_slug($title, '-')
            ]);
        }
    }
}
