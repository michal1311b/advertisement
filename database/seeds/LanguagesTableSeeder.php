<?php

use App\Language;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            ['Polish', 'Polski', 'pl_PL'], 
            ['English', 'English', 'en_EN'], 
            ['Germany', 'Deutschland', 'de_DE'], 
            ['Russian', 'русский', 'ru_RU']
        ];

        foreach($languages as $language) {
            Language::create([
                'name' => $language[0],
                'local_name' => $language[1],
                'lang_key' => $language[2]
            ]);
        }
    }
}
