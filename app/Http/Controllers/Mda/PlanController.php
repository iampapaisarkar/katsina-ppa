<?php

namespace App\Http\Controllers\Mda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function plans(){
        return view('mda.plans.plans');
    }

    public function projects(){
        return view('mda.plans.projects');
    }

    public function projectDetails(){
        return view('mda.plans.project-details');
    }
}
