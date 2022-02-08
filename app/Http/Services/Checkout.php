<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\Registration;
use App\Models\AdditionalFee;
use DB;

class Checkout
{
    public static function checkout($registration, $type){

        try {
            DB::beginTransaction();

            if($type == 'vendor_registration'){

                $_c_registration = Registration::with(
                    'company_details.core_competence', 
                    'company_details.organization_type', 
                    'company_details.company_state', 
                    'company_directors', 
                    'product_service_types', 
                    'product_services', 
                    'category_documents.registration_category'
                )
                ->where(['id' => $registration['id'], 'payment' => false])
                ->first();; 

                if($registration){
                    $AdditionalFee = AdditionalFee::where('id', 1)->first();

                    $totalAmount = floatval($AdditionalFee->registration_fee + $_c_registration->category_documents->registration_category->registration_fee);

                    $token = md5(uniqid(rand(), true));
                    $order_id = date('m-Y') . '-' .rand(10,1000);

                    $payment = Payment::create([
                        'user_id' => Auth::user()->id,
                        'order_id' => $order_id,
                        'registration_id' => $_c_registration->id,
                        'service_id' => $AdditionalFee->id,
                        'extra_service_id' => $_c_registration->category_documents->registration_category->id,
                        'service_type' => 'vendor_registration',
                        'amount' => $totalAmount,
                        'token' => $token,
                        'is_online' => false,
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