<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationStoreRequest;
use App\Models\Registration;
use App\Models\CompanyDetails;
use App\Models\CompanyDirectors;
use App\Models\ProductServices;
use App\Models\CategoryDocuments;
use Illuminate\Support\Facades\Auth;
use DB;

class RegistrationController extends Controller
{
    public function registration()
    {
        return view('vendor-user.registration');
    }

    public function registrationPreview(RegistrationStoreRequest $request)
    {
        // dd($request->all());
        // return view('vendor-user.registration-preview');
        if($request->all()){
            $data = $request->all();
            $data['attachment_9'] = base64_encode($request->file('attachment_9'));
            return view('vendor-user.registration-preview', compact('data'));
        }else{
            return view('vendor-user.registration');
        }

    }

    public function registrationSubmit(RegistrationStoreRequest $request)
    {
        dd($request->all());

        try {
            DB::beginTransaction();

            $registration = Registration::create([
                'user_id' => Auth::user()->id,
                'payment' => false,
                'status' => 'pending',
            ]);

            CompanyDetails::create([
                'registration_id' => $registration->id,
                'area_of_core_competence' => $request->area_of_core_competence,
                'type_of_organization' => $request->type_of_organization,
                'company_name' => $request->company_name,
                'cac_number' => $request->cac_number,
                'default' => $request->default,
                'share_capital' => $request->share_capital,
                'address' => $request->address,
                'landmark' => $request->landmark,
                'city' => $request->city,
                'state' => $request->state,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'position' => $request->position,
            ]);

            if($request->director){
                foreach($request->director as $key => $director) {
                    CompanyDirectors::create([
                        'registration_id' => $registration->id,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'email' => $request->email,
                        'phone_number' => $request->phone_number,
                        'address' => $request->address,
                        'passport' => $request->passport,
                        'identification' => $request->identification,
                        'certificates' => $request->certificates,
                    ]);
                }
            }

            if($request->services){
                foreach($request->services as $key => $service) {
                    ProductServices::create([
                        'registration_id' => $registration->id,
                        'service_id' => $service,
                    ]);

                    if($service['childs']){
                        foreach($service['childs'] as $key => $child) {
                            ProductServices::create([
                                'registration_id' => $registration->id,
                                'service_id' => $child,
                            ]);
                        }
                    }
                }
            }

            CategoryDocuments::create([
                'registration_id' => $registration->id,
                'registration_category_id' => $request->registration_category_id,
                'attachment_1' => $request->attachment_1,
                'attachment_2' => $request->attachment_2,
                'attachment_3' => $request->attachment_3,
                'attachment_4' => $request->attachment_4,
                'attachment_5' => $request->attachment_5,
                'attachment_6' => $request->attachment_6,
                'attachment_7' => $request->attachment_7,
                'attachment_8' => $request->attachment_8,
                'attachment_9' => $request->attachment_9,
            ]);
           
            DB::commit();

            return back()->withSuccess('Registration submit successfully done');

        }catch(Exception $e) {
            DB::rollback();
            return back()->with('error','There something internal server errore');
        }
    }
}
