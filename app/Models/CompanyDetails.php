<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CompanyDetails extends Model
{
    use HasFactory;

    protected $casts = [
        'date_of_incorporation' => 'date'
    ];

    protected $fillable = [
        'user_id',
        'registration_id',
        'area_of_core_competence',
        'type_of_organization',
        'company_name',
        'cac_number',
        'date_of_incorporation',
        'share_capital',
        'address',
        'landmark',
        'city',
        'state',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'position',
    ];

    public function getDateOfIncorporationAttribute( $value ) {
        if($value){
            return Carbon::parse($value)->format('d-m-Y');
        }
        return null;
    }

    public function setDateOfIncorporationAttribute( $value ) {
        if($value){
            $this->attributes['date_of_incorporation'] = Carbon::parse($value)->format('Y-m-d');
        }
        return $value;
    }
    

    public function core_competence() {
        return $this->hasOne(CoreCompetence::class, 'id','area_of_core_competence');
    }

    public function organization_type() {
        return $this->hasOne(OrganizationType::class, 'id','type_of_organization');
    }

    public function company_state() {
        return $this->hasOne(State::class, 'id','state');
    }
}
