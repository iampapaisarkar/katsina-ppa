<?php

namespace App\Http\Controllers\FormData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FormData\ServiceTypeRequest;
use App\Models\ServiceType;

class ServiceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $types = ServiceType::latest();

        if($request->per_page){
            $perPage = (integer) $request->per_page;
        }else{
            $perPage = 10;
        }

        if(!empty($request->search)){
            $search = $request->search;
            $types = $types->where(function($q) use ($search){
                $q->where('service_types.title', 'like', '%' .$search. '%');
            });
        }

        $types = $types->paginate($perPage);

        return view('ppa.form-data.service-type.index', compact('types'));
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
    public function store(ServiceTypeRequest $request)
    {
        ServiceType::create([
            'title' => $request->title
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
    public function update(ServiceTypeRequest $request, $id)
    {
        ServiceType::where('id', $id)->update([
            'title' => $request->title
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
        ServiceType::where('id', $id)->delete();

        return back()->withSuccess('Data deleted successfully.');
    }
}
