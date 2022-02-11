<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDirectors extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'registration_id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'passport',
        'identification',
        'certificates',
    ];
}
