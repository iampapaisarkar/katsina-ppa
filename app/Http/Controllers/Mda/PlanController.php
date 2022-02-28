<?php

namespace App\Http\Controllers\Mda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PlanUplaodRequest;

class PlanController extends Controller
{
    public function plans(){
        return view('mda.plans.plans');
    }

    public function planUpload(PlanUplaodRequest $request){
        return back()->withSuccess('Plan Uploaded successfully!');
    }

    public function projects(){
        return view('mda.plans.projects');
    }

    public function projectDetails(){
        return view('mda.plans.project-details');
    }
}
