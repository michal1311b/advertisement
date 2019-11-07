<?php

namespace App\Http\Service;

use App\Visit as AppVisit;

class Visit 
{
    public static function storeVisit($user_id, $advertisement_id, $is_doctor = false)
    {
        AppVisit::create([
            'user_id' => $user_id,
            'advertisement_id' => $advertisement_id,
            'is_doctor' => $is_doctor
        ]);
    }
}