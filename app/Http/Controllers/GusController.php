<?php

namespace App\Http\Controllers;

use App\Gus;
use App\Profile;
use Illuminate\Http\Request;

class GusController extends Controller
{
     //adresy produkcyjne
     protected $loginUrl = 'https://wyszukiwarkaregon.stat.gov.pl/wsBIR/UslugaBIRzewnPubl.svc/ajaxEndpoint/Zaloguj';
     protected $searchDataUrl = 'https://wyszukiwarkaregon.stat.gov.pl/wsBIR/UslugaBIRzewnPubl.svc/ajaxEndpoint/daneSzukaj';
     //adresy testowe
     protected $loginTestUrl = 'https://wyszukiwarkaregontest.stat.gov.pl/wsBIR/UslugaBIRzewnPubl.svc/ajaxEndpoint/Zaloguj';
     protected $searchDataTestUrl = 'https://wyszukiwarkaregontest.stat.gov.pl/wsBIR/UslugaBIRzewnPubl.svc/ajaxEndpoint/daneSzukaj';
 
     //tutaj wpisan klucz do GUS - obecnie testowy
     protected $session = null;

     protected function makeCurl($field,$url){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $field);
        curl_setopt($curl, CURLOPT_ENCODING, 'UTF-8');
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json','Content-Length: '.strlen($field), 'sid:'.$this->session]);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36');
        curl_setopt($curl, CURLOPT_HEADER, false);
        $result = curl_exec($curl);
        curl_close($curl);
        if($this->session == null){
            return json_decode($result)->d;
        }else{
            return str_replace('\u000d\u000a', '', $result);
        }
    }

    protected function login(){
        $key = env('GUS_KEY');
        $login = json_encode(["pKluczUzytkownika" => $key]);
        $result = $this->makeCurl($login, $this->loginUrl);
        
        return $result;
    }

    public function checkNip($nip){
        if($this->session == null){
            $this->session = $this->login();
        }

        $searchData = json_encode([
            'jestWojPowGmnMiej' => true,
            'pParametryWyszukiwania' => [
                'AdsSymbolGminy' => null,
                'AdsSymbolMiejscowosci' => null,
                'AdsSymbolPowiatu' => null,
                'AdsSymbolUlicy' => null,
                'AdsSymbolWojewodztwa' => null,
                'Dzialalnosci' => null,
                'FormaPrawna' => null,
                'Krs' => null,
                'Krsy' => null,
                'NazwaPodmiotu' => null,
                'Nip' => $nip,
                'Nipy' => null,
                'NumerwRejestrzeLubEwidencji' => null,
                'OrganRejestrowy' => null,
                'PrzewazajacePKD' => false,
                'Regon' => null,
                'Regony14zn' => null,
                'Regony9zn' => null,
                'RodzajRejestru' => null,
                ]
            ]
        );

        $result = $this->makeCurl($searchData, $this->searchDataUrl);
        
        $data = json_decode($result, true);
        $xml = simplexml_load_string($data['d']);

        return response()->json([
            'status' => 201,
            'data' => $xml
        ]);
    }

    public function getGUSData()
    {
        $profiles = Profile::whereNotNull('company_nip')->get();
        
        foreach($profiles as $profile) {
            $data = $this->checkNip($profile->company_nip);

            $profile->update([
                'company_name' => $data->Nazwa,
                'company_post_code' => $data->Nazwa,
                'company_city' => $data->Nazwa,
            ]);
        }
    }
}
