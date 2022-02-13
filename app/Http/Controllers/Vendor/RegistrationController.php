<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationStoreRequest;
use App\Http\Requests\CompanyDetailRequest;
use App\Http\Requests\CompanyDirectorRequest;
use App\Http\Requests\ProductServiceRequest;
use App\Http\Requests\CategoryDocumentRequest;
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
        $authUser = Auth::user();
        $companyDetails = CompanyDetails::where('user_id', $authUser->id)->first();
        $companyDirectors = CompanyDirectors::where('user_id', $authUser->id)->get();
        $productServices = ProductServices::where('user_id', $authUser->id)->get();
        $serviceTypes = [];
        $services = [];
        foreach ($productServices as $key => $productService) {
            if(!in_array($productService->service_type_id, $serviceTypes)){
                array_push($serviceTypes, $productService->service_type_id);
            }
            array_push($services, $productService->service_id);
        }
        $categoryDocuments = CategoryDocuments::where('user_id', $authUser->id)->first();

        return view('vendor-user.registration', compact('companyDetails', 'companyDirectors', 'serviceTypes', 'services', 'categoryDocuments'));
    }

    public function status(){
        return view('vendor-user.registration-status');
    }

    public function registrationCompanyDetailSubmit(CompanyDetailRequest $request)
    {
        try {
            DB::beginTransaction();

            $authUser = Auth::user();
            $companyDetails = CompanyDetails::where('user_id', $authUser->id)
            ->where('registration_id', null);

            if($companyDetails->exists()){
                CompanyDetails::where('user_id', $authUser->id)->update([
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
                
                $message = 'Company Details updated successfully';

            }else{

                CompanyDetails::create([
                    'user_id' => $authUser->id,
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

                $message = 'Company Details stored successfully';

            }

            DB::commit();

            return response()->json($message, 200);


        }catch(Exception $e) {
            DB::rollback();
            return response()->json('error','There something internal server errore');
        }
    }

    public function registrationCompanyDirectorSubmit(CompanyDirectorRequest $request)
    {
        try {
            DB::beginTransaction();

            $authUser = Auth::user();
            $CompanyDirectors = CompanyDirectors::where('user_id', $authUser->id)
            ->where('registration_id', null);

            if($CompanyDirectors->exists()){

                // Store OR Update directors 
                if($request->director){
                    foreach($request->director as $key => $director) {

                        if(isset($director['id'])){ // Update
                            $previous_company_director = CompanyDirectors::where(['user_id' => $authUser->id, 'id' => $director['id']])->first();

                            // Check Passport Validation 
                            if(isset($director['passport'])){
                                $passport = FileUpload::upload($director['passport'], $private = true, 'vendor', 'passport'.$key);
                            }else{
                                $passport = $previous_company_director->passport ? $previous_company_director->passport : null;
                            }
                            // Check Identification Validation 
                            if(isset($director['identification'])){
                                $identification = FileUpload::upload($director['identification'], $private = true, 'vendor', 'identification'.$key);
                            }else{
                                $identification = $previous_company_director->identification ? $previous_company_director->identification : null;
                            }
                            // Check Certificates Validation 
                            if(isset($director['certificates'])){
                                $certificates = FileUpload::upload($director['certificates'], $private = true, 'vendor', 'certificates'.$key);
                            }else{
                                $certificates = $previous_company_director->certificates ? $previous_company_director->certificates : null;
                            }

                            CompanyDirectors::where(['id' => $previous_company_director->id, 'user_id' => $authUser->id])->update([
                                'first_name' => $director['first_name'],
                                'last_name' => $director['last_name'],
                                'email' => $director['email'],
                                'phone_number' => $director['phone_number'],
                                'address' => $director['address'],
                                'passport' => $passport,
                                'identification' => $identification,
                                'certificates' => $certificates,
                            ]);

                        }else{ // Insert
                            if(isset($director['passport'])){
                                $passport = FileUpload::upload($director['passport'], $private = true, 'vendor', 'passport'.$key);
                            }else{
                                $passport = null;
                            }
    
                            if(isset($director['identification'])){
                                $identification = FileUpload::upload($director['identification'], $private = true, 'vendor', 'identification'.$key);
                            }else{
                                $identification = null;
                            }
                            
                            if(isset($director['certificates'])){
                                $certificates = FileUpload::upload($director['certificates'], $private = true, 'vendor', 'certificates'.$key);
                            }else{
                                $certificates = null;
                            }
    
                            CompanyDirectors::create([
                                'user_id' => $authUser->id,
                                'first_name' => $director['first_name'],
                                'last_name' => $director['last_name'],
                                'email' => $director['email'],
                                'phone_number' => $director['phone_number'],
                                'address' => $director['address'],
                                'passport' => $passport,
                                'identification' => $identification,
                                'certificates' => $certificates,
                            ]);
                        }
                    }
                }

                $message = 'Directors updated successfully';
            }else{
                if($request->director){
                    foreach($request->director as $key => $director) {

                        if(isset($director['passport'])){
                            $passport = FileUpload::upload($director['passport'], $private = true, 'vendor', 'passport'.$key);
                        }else{
                            $passport = null;
                        }

                        if(isset($director['identification'])){
                            $identification = FileUpload::upload($director['identification'], $private = true, 'vendor', 'identification'.$key);
                        }else{
                            $identification = null;
                        }
                        
                        if(isset($director['certificates'])){
                            $certificates = FileUpload::upload($director['certificates'], $private = true, 'vendor', 'certificates'.$key);
                        }else{
                            $certificates = null;
                        }

                        CompanyDirectors::create([
                            'user_id' => $authUser->id,
                            'first_name' => $director['first_name'],
                            'last_name' => $director['last_name'],
                            'email' => $director['email'],
                            'phone_number' => $director['phone_number'],
                            'address' => $director['address'],
                            'passport' => $passport,
                            'identification' => $identification,
                            'certificates' => $certificates,
                        ]);
                    }
                }

                $message = 'Directors stored successfully';
            }

        DB::commit();

            return response()->json($message, 200);


        }catch(Exception $e) {
            DB::rollback();
            return response()->json('error','There something internal server errore');
        }
    }

    public function registrationProductServiceSubmit(ProductServiceRequest $request)
    {
        try {
            DB::beginTransaction();

            $authUser = Auth::user();
            $ProductServices = ProductServices::where('user_id', $authUser->id)
            ->where('registration_id', null);

            if($ProductServices->exists()){

                if($request->services){

                    ProductServices::where('user_id', $authUser->id)
                    ->where('registration_id', null)->delete();

                    foreach($request->services as $key => $service) {
                        if(isset($service['service_type'])){
                            $service_type_id = $service['service_type'];
                        }else{
                            $service_type_id = null;
                        }
                        foreach($service['service'] as $serv) {
                            ProductServices::create([
                                'user_id' => $authUser->id,
                                'service_type_id' => $service_type_id,
                                'service_id' => $serv
                            ]);
                        }
                    }
                }

                $message = 'Product & Services updated successfully';
            }else{
                
                if($request->services){
                    foreach($request->services as $key => $service) {
                        if(isset($service['service_type'])){
                            $service_type_id = $service['service_type'];
                        }else{
                            $service_type_id = null;
                        }
                        foreach($service['service'] as $serv) {
                            ProductServices::create([
                                'user_id' => $authUser->id,
                                'service_type_id' => $service_type_id,
                                'service_id' => $serv
                            ]);
                        }
                    }
                }

                $message = 'Product & Services stored successfully';
            }

        DB::commit();

            return response()->json($message, 200);


        }catch(Exception $e) {
            DB::rollback();
            return response()->json('error','There something internal server errore');
        }
    }

    public function registrationCategoryDocumentSubmit(CategoryDocumentRequest $request)
    {
        try {
            DB::beginTransaction();

            $authUser = Auth::user();
            $CategoryDocuments = CategoryDocuments::where('user_id', $authUser->id)
            ->where('registration_id', null);

            if($CategoryDocuments->exists()){

                if($request->file('attachment_1')){
                    $attachment_1 = FileUpload::upload($request->file('attachment_1'), $private = true, 'vendor', 'attachment_1');
                }else{
                    $attachment_1 = $CategoryDocuments->first()->attachment_1;
                }
                if($request->file('attachment_2')){
                    $attachment_2 = FileUpload::upload($request->file('attachment_2'), $private = true, 'vendor', 'attachment_2');
                }else{
                    $attachment_2 = $CategoryDocuments->first()->attachment_2;
                }
                if($request->file('attachment_3')){
                    $attachment_3 = FileUpload::upload($request->file('attachment_3'), $private = true, 'vendor', 'attachment_3');
                }else{
                    $attachment_3 = $CategoryDocuments->first()->attachment_3;
                }
                if($request->file('attachment_4')){
                    $attachment_4 = FileUpload::upload($request->file('attachment_4'), $private = true, 'vendor', 'attachment_4');
                }else{
                    $attachment_4 = $CategoryDocuments->first()->attachment_4;
                }
                if($request->file('attachment_5')){
                    $attachment_5 = FileUpload::upload($request->file('attachment_5'), $private = true, 'vendor', 'attachment_5');
                }else{
                    $attachment_5 = $CategoryDocuments->first()->attachment_5;
                }
                if($request->file('attachment_6')){
                    $attachment_6 = FileUpload::upload($request->file('attachment_6'), $private = true, 'vendor', 'attachment_6');
                }else{
                    $attachment_6 = $CategoryDocuments->first()->attachment_6;
                }
                if($request->file('attachment_7')){
                    $attachment_7 = FileUpload::upload($request->file('attachment_7'), $private = true, 'vendor', 'attachment_7');
                }else{
                    $attachment_7 = $CategoryDocuments->first()->attachment_7;
                }
                if($request->file('attachment_8')){
                    $attachment_8 = FileUpload::upload($request->file('attachment_8'), $private = true, 'vendor', 'attachment_8');
                }else{
                    $attachment_8 = $CategoryDocuments->first()->attachment_8;
                }
                if($request->file('attachment_9')){
                    $attachment_9 = FileUpload::upload($request->file('attachment_9'), $private = true, 'vendor', 'attachment_9');
                }else{
                    $attachment_9 = $CategoryDocuments->first()->attachment_9;
                }

                CategoryDocuments::where('user_id', $authUser->id)->update([
                    'user_id' => $authUser->id,
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

                $message = 'Category & Documents updated successfully';
            }else{

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
                    'user_id' => $authUser->id,
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

                $message = 'Category & Documents stored successfully';
            }


            $response = $this->registrationSubmit();

        DB::commit();

            if($response){
                return response()->json(['message' => 'Application successfully submitted. Please pay amount for further action', 'data' => $response], 200);
            }else{
                return response()->json(['message' => $message], 200);
            }

        }catch(Exception $e) {
            DB::rollback();
            return response()->json('error','There something internal server errore');
        }
    }

    public function registrationSubmit()
    {

        $authUser = Auth::user();
        $companyDetails = CompanyDetails::where('user_id', $authUser->id);
        $companyDirectors = CompanyDirectors::where('user_id', $authUser->id);
        $productServices = ProductServices::where('user_id', $authUser->id);
        $categoryDocuments = CategoryDocuments::where('user_id', $authUser->id);

        if($companyDetails->exists() &&
        $companyDirectors->exists() &&
        $productServices->exists() &&
        $categoryDocuments->exists()){
            $registration = Registration::create([
                'user_id' => $authUser->id,
                'payment' => false,
                'status' => 'pending',
                'type' => 'vendor_registration'
            ]);
            $companyDetails->update([
                'registration_id' => $registration->id
            ]);
            $companyDirectors->update([
                'registration_id' => $registration->id
            ]);
            $productServices->update([
                'registration_id' => $registration->id
            ]);
            $categoryDocuments->update([
                'registration_id' => $registration->id
            ]);

            $response = Checkout::checkout($registration = ['id' => $registration->id], 'vendor_registration');

            return $response;

        }else{
            return false;
        }
        
        // return redirect()->route('invoice.show', ['id' => $response['id']])
        // ->withSuccess('Application successfully submitted. Please pay amount for further action');

    }
}
