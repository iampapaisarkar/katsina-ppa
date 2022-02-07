<?php

namespace App\Http\Controllers\FormData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FormData\MdaTypeRequest;
use App\Models\MdaType;

class MdaTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $MdaTypes = MdaType::latest();

        if($request->per_page){
            $perPage = (integer) $request->per_page;
        }else{
            $perPage = 10;
        }

        if(!empty($request->search)){
            $search = $request->search;
            $MdaTypes = $MdaTypes->where(function($q) use ($search){
                $q->where('users.title', 'like', '%' .$search. '%');
                // $q->orWhere('users.lastname', 'like', '%' .$search. '%');
            });
        }

        $MdaTypes = $MdaTypes->latest()->paginate($perPage);

        return view('ppa.form-data.mda-type.index', compact('MdaTypes'));
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
    public function store(MdaTypeRequest $request)
    {
        MdaType::create([
            'title' => $request->title,
            'amount' => $request->amount
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
    public function update(MdaTypeRequest $request, $id)
    {
        MdaType::where('id', $id)->update([
            'title' => $request->title,
            'amount' => $request->amount
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
        MdaType::where('id', $id)->delete();

        return back()->withSuccess('Data deleted successfully.');

    }
}
