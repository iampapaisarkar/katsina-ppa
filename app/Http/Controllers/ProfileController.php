<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Rules\CurrentPasswordCheckRule;

class ProfileController extends Controller
{
    public function profile(){

        return view('profile.profile');
    }

    public function profileUpdate(Request $request){

        $this->validate($request, [
            'first_name' => [
                'required', 'min:3', 'max:255'
            ],
            'sur_name' => [
                'required', 'min:3', 'max:255'
            ],
            'phone_number' => [
                'required', 'min:10', 'max:12'
            ],
        ]);

        auth()->user()->update([
            'first_name' => $request->first_name,
            'sur_name' => $request->sur_name,
            'phone_number' => $request->phone_number,
        ]);

        return back()->withSuccess('Profile information updated successfully.');
    }

    public function profilePassword(){
        return view('profile.profile-password');
    }

    public function profilePasswordUpdate(Request $request){

        $authUser = Auth::user();

        $user = User::find(auth()->user()->id);

        $this->validate($request, [
            'old_password' => ['required', new CurrentPasswordCheckRule],
            'password' => ['confirmed','min:6','required_with:confirmed_password', 'different:old_password'],
        ]);

        if(!Hash::check($request->old_password, Auth::user()->password)){
            return back()->withError('Can not set old password as a new password');
        }

        auth()->user()->update([
            'password' => Hash::make($request->get('password')),
        ]);


        return back()->withSuccess('Profile password updated successfully.');
    }
}
