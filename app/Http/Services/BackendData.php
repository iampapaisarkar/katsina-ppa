<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\Auth;
use App\Models\CoreCompetence;
use App\Models\OrganizationType;
use App\Models\RegistrationCategory;
use App\Models\Service;
use App\Models\ServiceType;
use DB;

class BackendData
{
    public static function CoreCompetences(){
        return CoreCompetence::get();
    }

    public static function OrganizationTypes(){
        return OrganizationType::get();
    }

    public static function RegistrationCategories(){
        return RegistrationCategory::get();
    }

    public static function Services(){
        return Service::where('parent', NULL)->with('childs')->get();
    }

    public static function ServiceTypes(){
        return ServiceType::get();
    }
}