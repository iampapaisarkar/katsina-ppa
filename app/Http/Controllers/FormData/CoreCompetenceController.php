<?php

namespace App\Http\Controllers\FormData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FormData\CoreCompetenceRequest;
use App\Models\CoreCompetence;

class CoreCompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $competences = CoreCompetence::latest();

        if($request->per_page){
            $perPage = (integer) $request->per_page;
        }else{
            $perPage = 10;
        }

        if(!empty($request->search)){
            $search = $request->search;
            $competences = $competences->where(function($q) use ($search){
                $q->where('core_competences.title', 'like', '%' .$search. '%');
                $q->orWhere('core_competences.code', 'like', '%' .$search. '%');
            });
        }

        $competences = $competences->paginate($perPage);

        return view('ppa.form-data.core-competence.index', compact('competences'));
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
    public function store(CoreCompetenceRequest $request)
    {
        CoreCompetence::create([
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
    public function update(CoreCompetenceRequest $request, $id)
    {
        CoreCompetence::where('id', $id)->update([
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
        CoreCompetence::where('id', $id)->delete();

        return back()->withSuccess('Data deleted successfully.');
    }
}
