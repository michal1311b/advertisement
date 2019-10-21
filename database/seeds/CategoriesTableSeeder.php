<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Kategoria 1', 'Kategoria 2', 'Kategoria 3', 'Kategoria 4'];

        foreach($categories as $category) {
            Category::create([
                'name' => $category,
                'is_active' => true
            ]);
        }
    }
}
