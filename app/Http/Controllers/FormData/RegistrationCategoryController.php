<?php

namespace App\Http\Controllers\FormData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FormData\RegistrationCategoryRequest;
use App\Models\RegistrationCategory;

class RegistrationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = RegistrationCategory::latest();

        if($request->per_page){
            $perPage = (integer) $request->per_page;
        }else{
            $perPage = 10;
        }

        if(!empty($request->search)){
            $search = $request->search;
            $categories = $categories->where(function($q) use ($search){
                $q->where('registration_categories.title', 'like', '%' .$search. '%');
                $q->orWhere('registration_categories.code', 'like', '%' .$search. '%');
            });
        }

        $categories = $categories->paginate($perPage);

        return view('ppa.form-data.registration-category.index', compact('categories'));
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
    public function store(RegistrationCategoryRequest $request)
    {
        RegistrationCategory::create([
            'title' => $request->title,
            'code' => $request->code,
            'registration_fee' => $request->registration_fee,
            'renewal_fee' => $request->renewal_fee,
            'contract_value' => $request->threshold,
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
    public function update(RegistrationCategoryRequest $request, $id)
    {
        RegistrationCategory::where('id', $id)->update([
            'title' => $request->title,
            'code' => $request->code,
            'registration_fee' => $request->registration_fee,
            'renewal_fee' => $request->renewal_fee,
            'contract_value' => $request->threshold,
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
        RegistrationCategory::where('id', $id)->delete();

        return back()->withSuccess('Data deleted successfully.');
    }
}
