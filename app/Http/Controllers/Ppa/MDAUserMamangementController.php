<?php

namespace App\Http\Controllers\Ppa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Mda\MdaStoreRequest;
use App\Http\Requests\Mda\MdaUpdateRequest;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use DB;

class MDAUserMamangementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('ppa.mda-user.index');
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
    public function store(MdaStoreRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = User::create([
                'first_name' => $request->first_name,
                'sur_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'mda' => $request->mda_type,
            ]);

            if(!Role::where('id', $request->role)->exists()){
                return back()->withError('Ivalid role selected. please select a valid role.');
            }

            UserRole::create([
                'user_id' => $user->id,
                'role_id' => $request->role
            ]);

            $user->sendEmailVerificationNotification();

            DB::commit();

            return back()->withSuccess('Mda created successfully');

        }catch(Exception $e) {
            DB::rollback();
            return back()->withError('There something internal server error');
        }
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
    public function update(MdaUpdateRequest $request, $id)
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
