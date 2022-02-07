<?php

namespace App\Http\Controllers\FormData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FormData\OrganizationTypeRequest;
use App\Models\OrganizationType;

class OrganizationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $types = OrganizationType::latest();

        if($request->per_page){
            $perPage = (integer) $request->per_page;
        }else{
            $perPage = 10;
        }

        if(!empty($request->search)){
            $search = $request->search;
            $types = $types->where(function($q) use ($search){
                $q->where('organization_types.title', 'like', '%' .$search. '%');
                $q->orWhere('organization_types.code', 'like', '%' .$search. '%');
            });
        }

        $types = $types->paginate($perPage);

        return view('ppa.form-data.organization-type.index', compact('types'));
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
    public function store(OrganizationTypeRequest $request)
    {
        OrganizationType::create([
            'title' => $request->title,
            'code' => $request->code
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
    public function update(OrganizationTypeRequest $request, $id)
    {
        OrganizationType::where('id', $id)->update([
            'title' => $request->title,
            'code' => $request->code
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
        OrganizationType::where('id', $id)->delete();

        return back()->withSuccess('Data deleted successfully.');
    }
}
