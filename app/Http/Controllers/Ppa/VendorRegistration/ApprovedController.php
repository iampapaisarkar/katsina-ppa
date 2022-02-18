<?php

namespace App\Http\Controllers\Ppa\VendorRegistration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration;

class ApprovedController extends Controller
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
            'company_details.company_state', 
            'company_directors', 
            'product_service_types', 
            'product_services', 
            'category_documents.registration_category'
        )
        ->where([
            'type' => 'vendor_registration',
            'status' => 'approved',
            'payment' => true
        ]);

        if($request->per_page){
            $perPage = (integer) $request->per_page;
        }else{
            $perPage = 10;
        }

        $registrations = $registrations->paginate($perPage);

        return view('ppa.vendor-registration.approved.index', compact('registrations'));
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
        //
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
}
