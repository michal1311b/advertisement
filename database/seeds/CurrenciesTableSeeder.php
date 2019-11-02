<?php

use Illuminate\Database\Seeder;
use App\Currency;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            ['PLN', 'PLN'], 
            ['Dolar', '$'], 
            ['Euro', '€'], 
            ['Pound', '£']
        ];

        foreach($currencies as $currency) {
            Currency::create([
                'name' => $currency[0],
                'symbol' => $currency[1]
            ]);
        }
    }
}
