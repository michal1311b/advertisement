<?php

namespace App\Http\Service;

use App\ForeignVisit;
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

    public static function storeForeignVisit($user_id, $advertisement_id, $is_doctor = false)
    {
        ForeignVisit::create([
            'user_id' => $user_id,
            'foreign_offer_id' => $advertisement_id,
            'is_doctor' => $is_doctor
        ]);
    }
}