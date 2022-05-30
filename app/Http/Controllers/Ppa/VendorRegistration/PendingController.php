<?php

namespace App\Http\Controllers\Ppa\VendorRegistration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Servies\MailSend;

class PendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $registrations = Registration::latest()
        ->with(
            'company_details.core_competence', 
            'company_details.organization_type', 
            'company_details.company_country', 
            'company_directors', 
            'product_service_types', 
            'product_services', 
            'category_documents.registration_category'
        )
        ->where([
            'type' => 'vendor_registration',
            'status' => 'pending',
            'payment' => true
        ]);

        if($request->per_page){
            $perPage = (integer) $request->per_page;
        }else{
            $perPage = 10;
        }

        $registrations = $registrations->paginate($perPage);

        return view('ppa.vendor-registration.pending.index', compact('registrations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registration = Registration::latest()
        ->with(
            'company_details.core_competence', 
            'company_details.organization_type', 
            'company_details.company_country', 
            'company_directors', 
            'product_service_types', 
            'product_services', 
            'category_documents.registration_category'
        )
        ->where([
            'type' => 'vendor_registration',
            'status' => 'pending',
            'payment' => true,
            'id' => $id
        ]);

        $registration = $registration->first();

        if($registration){
            $serviceTypes = [];
            $services = [];
            foreach ($registration->product_services as $key => $productService) {
                if(!in_array($productService->service_type_id, $serviceTypes)){
                    array_push($serviceTypes, $productService->service_type_id);
                }
                array_push($services, $productService->service_id);
            }
    
            return view('ppa.vendor-registration.pending.show', compact('registration', 'serviceTypes', 'services'));
        }else{
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function queryRegistration(Request $request, $id)
    {
        $this->validate($request, [
            'reason' => [
                'required', 'min:10'
            ]
        ]);

        Registration::where('id', $id)->update([
            'status' => 'queried',
            'query' => $request->reason,
            'queried_by' => Auth::user()->id,
            'queried_at' => date('Y-m-d H:i:s')
        ]);

        $registration = Registration::with(
            'user', 
            'company_details.core_competence', 
            'company_details.organization_type', 
            'company_details.company_country', 
            'company_directors', 
            'product_service_types', 
            'product_services', 
            'category_documents.registration_category')
        ->where(['id' => $id])->first();

        $data = [
            'user' => $registration->user,
            'type' => 'vendor-registration',
            'status' => 'query',
            'company_name' => $registration->company_details->company_name,
            'query' => $request->reason,
        ];
        MailSend::sendVendorRegistrationQuery($data);

        return redirect('vendor-registration-pending')->withSuccess('Queried successfully');
    }

    public function approvedRegistration(Request $request, $id)
    {
        Registration::where('id', $id)->update([
            'status' => 'approved',
            'approved_by' => Auth::user()->id,
            'approved_at' => date('Y-m-d H:i:s')
        ]);

        $registration = Registration::with(
            'user', 
            'company_details.core_competence', 
            'company_details.organization_type', 
            'company_details.company_country', 
            'company_directors', 
            'product_service_types', 
            'product_services', 
            'category_documents.registration_category')
        ->where(['id' => $id])->first();

        $registrationCount = App\Models\Registration::where([
            'type' => 'vendor_registration',
            'status' => 'approved',
            'payment' => true
        ])->count();

        $data = [
            'user' => $registration->user,
            'type' => 'vendor-registration',
            'company_name' => $registration->company_details->company_name,
            'status' => 'approved',
            'vendor-id' => 'KTBPP/'.date('y', strtotime($registration->company_details->date_of_incorporation)).'/'.$registration->company_details->organization_type->code.'/'.$registration->company_details->core_competence->code.'/'.sprintf("%06s", $registrationCount),
        ];
        MailSend::sendVendorRegistrationApproved($data);

        return redirect('vendor-registration-pending')->withSuccess('Approved successfully');
    }
}
