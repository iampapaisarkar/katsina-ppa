<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\Auth;
use App\Models\Registration;
use DB;

class CheckVendorRegistration
{
    public static function canRegistration(){

        $registration = Registration::where([
            'user_id' => Auth::user()->id
        ])
        ->first();

        if(!$registration){
            return [
                'success' => true,
            ];
        }else{
            return [
                'success' => false,
                'message' => 'You have already submit registration form.'
            ];
        }

    }
}