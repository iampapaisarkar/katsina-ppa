<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'code',
        'contract_value',
        'registration_fee',
        'renewal_fee',
    ];
}
