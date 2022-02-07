<?php

namespace App\Http\Controllers\FormData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FormData\AdditionalFeeRequest;
use App\Models\AdditionalFee;

class AdditionalFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fees = AdditionalFee::latest();

        if($request->per_page){
            $perPage = (integer) $request->per_page;
        }else{
            $perPage = 10;
        }

        if(!empty($request->search)){
            $search = $request->search;
            $fees = $fees->where(function($q) use ($search){
                $q->where('additional_fees.description', 'like', '%' .$search. '%');
            });
        }

        $fees = $fees->paginate($perPage);

        return view('ppa.form-data.additional-fee.index', compact('fees'));
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
    public function store(AdditionalFeeRequest $request)
    {
        AdditionalFee::create([
            'description' => $request->description,
            'registration_fee' => $request->registration_fee,
            'renewal_fee' => $request->renewal_fee,
        ]);

        return back()->withSuccess('Data insert successfully.');
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
    public function update(AdditionalFeeRequest $request, $id)
    {
        AdditionalFee::where('id', $id)->update([
            'description' => $request->description,
            'registration_fee' => $request->registration_fee,
            'renewal_fee' => $request->renewal_fee,
        ]);

        return back()->withSuccess('Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdditionalFee::where('id', $id)->delete();

        return back()->withSuccess('Data deleted successfully.');
    }
}
