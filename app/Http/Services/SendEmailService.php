<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\Auth;
use App\Mail\VerifyMdaEmail;
use Mail;
use DB;

class SendEmailService
{
    public static function sendVerifyMdaEmail($user, $role, $token){
        try {
            DB::beginTransaction();

            $data = [
                'verify_url' => route('verify-mda-user') .'?token='. $token . '&email='. $user->email,
                'user_name' => $user->first_name .' '. $user->sur_name,
                'mda_type' => $role->role,
                'expire_in' => env('MDA_VERIFY_EXPIRE_IN')
            ];

            Mail::to($user->email)->send(new VerifyMdaEmail($data));

            DB::commit();
            return ['success' => true];
        }catch(Exception $e) {
            DB::rollback();
            return ['success' => false];
        } 
    }
}