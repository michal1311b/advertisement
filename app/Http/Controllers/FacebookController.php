<?php

namespace App\Http\Controllers;

use App\Advertisement;
use Illuminate\Http\Request;

class FacebookController extends Controller
{
    public function storeFacebook()
    {
        $message = 'Uwaga<br>Dodaliśmy nową funkcje komentowania ofert dla lekarzy i lekarz-dentystów.<br>Od teraz można po zalogowaniu napisać swoją opinię pod daną oferta.<br>Komentarze są tylko widoczne dla innych lekarzy. Każde konto jest weryfikowane na podstawie PWZ'; 
        
        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/112311090238540/feed?message='.$message.'&access_token=EAANyEgJ7RN0BAEyGwmWls7VsmDNv0mlPVccZBMEuaRQSobrT4pFxIMfRgJ08L8z6CKRZCIyC9o1AAHVWQDKA58UWjtCd5ZBhZCGRRrZCaQjBof9oHDGnJ26pzLwXtdQHuPZCUXIGSeHFC4XPYDOZB3lLjwkT66oHEvrOdV4YC6A1qeGjA2YS36eDsTwTVl1un8ZD');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);

        $result = curl_exec($ch);
        
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        echo $result;
    }
}
