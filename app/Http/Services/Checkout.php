<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\Registration;
use DB;

class Checkout
{
    public static function checkout($registration, $type){

        try {
            DB::beginTransaction();

            if($type == 'meptp'){

                $application = Registration::where(['id' => $registration['id'], 'payment' => false])->first(); 

                if($application){
                    $service = Service::where('id', 1)
                    ->with('netFees')
                    ->first();

                    $totalAmount = 0;
                    foreach($service->netFees as $fee){
                        $totalAmount += $fee->amount;
                    }

                    $token = md5(uniqid(rand(), true));
                    $order_id = date('m-Y') . '-' .rand(10,1000);

                    $payment = Payment::create([
                        'user_id' => Auth::user()->id,
                        'order_id' => $order_id,
                        'application_id' => $application['id'],
                        'service_id' => $service->id,
                        'service_type' => 'meptp_training',
                        'amount' => $totalAmount,
                        'token' => $token,
                    ]);

                    $response = [
                        'success' => true,
                        'order_id' => $order_id,
                        'token' => $token,
                        'id' => $payment->id,
                    ];

                }else{
                    $response = ['success' => false];
                }
            }

            DB::commit();

            return $response;

        }catch(Exception $e) {
            DB::rollback();
            return ['success' => false];
        }  
    }


}