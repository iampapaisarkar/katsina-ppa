<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalFee extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'registration_fee', 'renewal_fee'
    ];
}
