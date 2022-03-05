<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\Auth;
use App\Models\MdaType;
use App\Models\Mda;
use App\Models\CoreCompetence;
use App\Models\OrganizationType;
use App\Models\RegistrationCategory;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\State;
use App\Models\Role;

use App\Models\ProcessType;
use App\Models\ProcurementMethod;
use App\Models\ProcurementTye;

use DB;

class BackendData
{
    public static function MdaTypes(){
        return MdaType::get();
    }

    public static function Mdas(){
        return Mda::get();
    }

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
        return Service::get();
    }

    public static function ServiceTypes(){
        return ServiceType::with('services')->get();
    }

    public static function States(){
        return State::get();
    }

    public static function mdaRoles(){
        return Role::whereIn('id', [3,4,5])->get();
    }

    public static function processTypes(){
        return ProcessType::get();
    }
    
    public static function procurementMethods(){
        return ProcurementMethod::get();
    }

    public static function procurementTypes(){
        return ProcurementTye::get();
    }
}