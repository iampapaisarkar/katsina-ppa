<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDetails extends Model
{
    use HasFactory;

    protected $fillable = [
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
}
