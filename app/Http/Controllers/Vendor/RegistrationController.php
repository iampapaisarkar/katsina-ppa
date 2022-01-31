<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationStoreRequest;

class RegistrationController extends Controller
{
    public function registration()
    {
        return view('vendor-user.registration');
    }

    public function registrationSubmit(RegistrationStoreRequest $request)
    {
        dd($request->all());
    }
}
