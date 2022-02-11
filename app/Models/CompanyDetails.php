<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'registration_id',
        'area_of_core_competence',
        'type_of_organization',
        'company_name',
        'cac_number',
        'default',
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
