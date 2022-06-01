<?php

namespace App\Http\Controllers\Ppa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Mda\MdaStoreRequest;
use App\Http\Requests\Mda\MdaUpdateRequest;
use App\Http\Services\SendEmailService;
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
        $users = User::select('users.*', 'user_roles.role_id')
        ->latest()
        ->join('user_roles', 'user_roles.user_id', 'users.id')
        ->join('roles', 'roles.id', 'user_roles.role_id')
        ->whereIn('roles.id', [3,4,5])
        ->with(
            'mda_type', 
            'role',
        );

        if($request->per_page){
            $perPage = (integer) $request->per_page;
        }else{
            $perPage = 10;
        }

        $users = $users->paginate($perPage);

        return view('ppa.mda-user.index', compact('users'));
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

            $token = md5(uniqid(rand(), true));

            $user = User::create([
                'first_name' => $request->first_name,
                'sur_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'mda' => $request->mda_type,
                'token' => $token
            ]);

            $role = Role::where('id', $request->role)->first();

            if(!Role::where('id', $request->role)->exists()){
                return back()->withError('Invalid role selected. please select a valid role.');
            }

            UserRole::create([
                'user_id' => $user->id,
                'role_id' => $request->role
            ]);

            SendEmailService::sendVerifyMdaEmail($user, $role, $token);

            DB::commit();

            return back()->withSuccess('Mda user created successfully');

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
        try {
            DB::beginTransaction();


            $user = User::where('id', $id)->update([
                'first_name' => $request->first_name,
                'sur_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'mda' => $request->mda_type,
            ]);

            $role = Role::where('id', $request->role)->first();

            if(!Role::where('id', $request->role)->exists()){
                return back()->withError('Invalid role selected. please select a valid role.');
            }

            if(UserRole::where('user_id', $id)->first()->role_id != $request->role){

                UserRole::where('user_id', $id)->delete();

                UserRole::create([
                    'user_id' => $id,
                    'role_id' => $request->role
                ]);
            }

            DB::commit();

            return back()->withSuccess('Mda user updated successfully');

        }catch(Exception $e) {
            DB::rollback();
            return back()->withError('There something internal server error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            User::where('id', $id)->delete();
            UserRole::where('user_id', $id)->delete();

            DB::commit();

            return back()->withSuccess('Mda user deleted successfully');

        }catch(Exception $e) {
            DB::rollback();
            return back()->withError('There something internal server error');
        }
    }
}
