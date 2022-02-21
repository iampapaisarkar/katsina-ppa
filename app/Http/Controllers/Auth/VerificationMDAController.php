<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class VerificationMDAController extends Controller
{
    public function verifyMdaUser(Request $request){
        $user = User::where(['token' => $request->token, 'email' => $request->email]);

        if($user->exists()){

            // $currentDateTime = Carbon::now()->format('Y-m-d H:i:s');
            // $expireAt = Carbon::parse($user->first()->created_at)->addMinute(5)->format('Y-m-d H:i:s');

            $user = $user->first();
            $email = $user->email;
            $token = $user->token;

            return view('auth.passwords.md-reset', compact('email', 'token'));
          
        }else{
            return abort(404);
        }
    }

    public function updateMdaUserPassword(Request $request){

        $this->validate($request, [
            'password' => ['required','min:6'],
            'password' => ['confirmed','min:6','required_with:confirmed_password'],
        ]);

        $user = User::where(['token' => $request->token, 'email' => $request->email]);

        if($user->exists()){
            $user = User::where(['token' => $request->token, 'email' => $request->email])
            ->update([
                'email_verified_at' => date('Y-m-d H:i:s'),
                'token' => null,
                'password' => Hash::make($request->password)
            ]);

            return redirect('login')->withSuccess('Password set successfully please login.');
          
        }else{
            return abort(404);
        }
    }
}
