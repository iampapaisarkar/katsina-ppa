<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\ChildService;
use App\Models\ServiceFeeMeta;
use App\Models\Payment;
use DB;
use Mail;
use App\Mail\VendorRegistrationPayment;
use App\Mail\VendorRegistrationQuery;
use App\Mail\VendorRegistrationApproved;

class EmailSend
{
    public static function sendVendorRegistrationPayment($data){

        try {
            DB::beginTransaction();

            Mail::to($data['user']['email'])->send(new VendorRegistrationPayment($data));

            DB::commit();
            return ['success' => true];
        }catch(Exception $e) {
            DB::rollback();
            return ['success' => false];
        }  
    }

    public static function sendVendorRegistrationQuery($data){

        try {
            DB::beginTransaction();

            Mail::to($data['user']['email'])->send(new VendorRegistrationQuery($data));

            DB::commit();
            return ['success' => true];
        }catch(Exception $e) {
            DB::rollback();
            return ['success' => false];
        }  
    }

    public static function sendVendorRegistrationApproved($data){

        try {
            DB::beginTransaction();

            Mail::to($data['user']['email'])->send(new VendorRegistrationApproved($data));

            DB::commit();
            return ['success' => true];
        }catch(Exception $e) {
            DB::rollback();
            return ['success' => false];
        }  
    }
}