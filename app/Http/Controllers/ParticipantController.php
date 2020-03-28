<?php

namespace App\Http\Controllers;

use App\CompanyCourse;
use App\Http\Requests\Participant\StoreRequest;
use App\Participant;

class ParticipantController extends Controller
{
    public function store(StoreRequest $request, $id)
    {  
        Participant::create([
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'street' => $request->street,
            'city' => $request->city,
            'post_code' => $request->post_code,
            'phone' => $request->phone,
            'company_nip' => $request->company_nip,
            'company_name' => $request->company_name,
            'company_street' => $request->company_street,
            'company_city' => $request->company_city,
            'company_post_code' => $request->company_post_code,
            'company_phone' => $request->company_phone,
            'comments' => $request->comments,
            'company_course_id' => $id,
            'term1' => $request->term1
        ]);

        session()->flash('success', trans('sentence.message-send'));

        return back();
    }

    public function delete($id)
    {
        $participant = Participant::findOrFail($id);
        
        if($participant->delete())
        {
            session()->flash('success',  trans('crudInfos.delete-participant'));

            return back();
        }
    }
}
