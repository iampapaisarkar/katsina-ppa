<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductServices extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'registration_id',
        'service_type_id',
        'service_id',
    ];
}
