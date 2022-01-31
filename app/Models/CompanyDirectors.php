<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDirectors extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_id',
        'first_name',
        'last_name',
        'country',
        'language',
    ];
}
