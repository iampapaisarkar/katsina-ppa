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
            if($registration->status == 'queried'){
                return [
                    'success' => true,
                ];
            }
            return [
                'success' => false,
                'message' => 'You have already submit registration form.'
            ];
        }

    }


    public static function status(){
        
        $registration = Registration::where(['user_id' => Auth::user()->id, 'type' => 'vendor_registration'])
        ->latest()->first();

        if($registration){
            if($registration->status == 'pending'){
                return $response = [
                    'success' => true,
                    'title' => 'Registration Under Review',
                    'caption' => 'Your vendor registration is under review.',
                    'message' => 'The BPP is currently evaluating your application and would get back to you one it is done. Please monitor your email for updates from us. Thank You',
                    'color' => 'warning',
                    'icon' => 'layers'
                ];
            }
            if($registration->status == 'queried'){
                return $response = [
                    'success' => true,
                    'title' => 'Registration Queried',
                    'caption' => 'Your vendor registration has been queried.',
                    'message' => 'REASON(S)',
                    'reason' => $registration->query,
                    'color' => 'danger',
                    'icon' => 'alert-triangle',
                    'edit-link' => route('registration')
                ];
            }
            if($registration->status == 'approved'){
                return $response = [
                    'success' => true,
                    'title' => 'Congratulations',
                    'caption' => 'Your vendor registration has been approved.',
                    'message' => 'You are now open to bid for and hundreds of public opportunities
                    published weekly from various Ministries, Departments and Agencies onbehalf of the
                    Katsina State Government. These opportunities are published here as they are
                    advertised to give you the opportunity to participate.',
                    'color' => 'success',
                    'icon' => 'award',
                    'download-link' => '-'
                ];
            }
        }else{
            return $response = [
                'success' => false,
                'title' => 'No registration application found',
                'color' => 'warning',
                'icon' => 'layers'
            ];
        }
    }
}