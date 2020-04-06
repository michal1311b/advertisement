<?php

namespace App\Http\Service;

use App\Currency;

trait CurrencyExchange
{
    public static function convertSalary($baseCurrency)
    {
        $currencies = Currency::where('id', '!=', $baseCurrency->id)->pluck('name');
        $getSymbols = implode(', ', $currencies->toArray());
        $removeWhiteSpace = str_replace(' ', '', $getSymbols);

        return CurrencyExchange::getConvertedCurrencies($baseCurrency->name, $removeWhiteSpace);
    }

    private static function getConvertedCurrencies($baseCurrency, $convertedCurrencies)
    {
        $cURLConnection = curl_init();

        curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.ratesapi.io/api/latest?base='.$baseCurrency.'&symbols='.$convertedCurrencies.'');
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        $currencyList = curl_exec($cURLConnection);
        curl_close($cURLConnection);

        $jsonArrayResponse = json_decode($currencyList);
        
        return $jsonArrayResponse;
    }
}