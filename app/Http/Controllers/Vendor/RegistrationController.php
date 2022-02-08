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
use App\Http\Services\FileUpload;
use App\Http\Services\Checkout;

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


                    $passport = FileUpload::upload($director['passport'], $private = true, 'vendor', 'passport'.$key);
                    $identification = FileUpload::upload($director['identification'], $private = true, 'vendor', 'identification'.$key);
                    $certificates = FileUpload::upload($director['certificates'], $private = true, 'vendor', 'certificates'.$key);

                    CompanyDirectors::create([
                        'registration_id' => $registration->id,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'email' => $request->email,
                        'phone_number' => $request->phone_number,
                        'address' => $request->address,
                        'passport' => $passport,
                        'identification' => $identification,
                        'certificates' => $certificates,
                    ]);
                }
            }


            if($request->services){
                foreach($request->services as $key => $service) {
                    ProductServices::create([
                        'registration_id' => $registration->id,
                        'service_id' => $service,
                    ]);
                }
            }

            $attachment_1 = FileUpload::upload($request->file('attachment_1'), $private = true, 'vendor', 'attachment_1');
            $attachment_2 = FileUpload::upload($request->file('attachment_2'), $private = true, 'vendor', 'attachment_2');
            $attachment_3 = FileUpload::upload($request->file('attachment_3'), $private = true, 'vendor', 'attachment_3');
            $attachment_4 = FileUpload::upload($request->file('attachment_4'), $private = true, 'vendor', 'attachment_4');
            $attachment_5 = FileUpload::upload($request->file('attachment_5'), $private = true, 'vendor', 'attachment_5');
            $attachment_6 = FileUpload::upload($request->file('attachment_6'), $private = true, 'vendor', 'attachment_6');
            $attachment_7 = FileUpload::upload($request->file('attachment_7'), $private = true, 'vendor', 'attachment_7');
            $attachment_8 = FileUpload::upload($request->file('attachment_8'), $private = true, 'vendor', 'attachment_8');
            $attachment_9 = FileUpload::upload($request->file('attachment_9'), $private = true, 'vendor', 'attachment_9');

            CategoryDocuments::create([
                'registration_id' => $registration->id,
                'registration_category_id' => $request->registration_category_id,
                'attachment_1' => $attachment_1,
                'attachment_2' => $attachment_2,
                'attachment_3' => $attachment_3,
                'attachment_4' => $attachment_4,
                'attachment_5' => $attachment_5,
                'attachment_6' => $attachment_6,
                'attachment_7' => $attachment_7,
                'attachment_8' => $attachment_8,
                'attachment_9' => $attachment_9,
            ]);
           
            $response = Checkout::checkout($registration = ['id' => $registration->id], 'registration');

            DB::commit();

                return redirect()->route('invoices.show', ['id' => $response['id']])
                ->with('success', 'Application successfully submitted. Please pay amount for further action');

        }catch(Exception $e) {
            DB::rollback();
            return back()->with('error','There something internal server errore');
        }
    }
}
