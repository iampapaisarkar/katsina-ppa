<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $casts = [
        'year' => 'date'
    ];

    protected $fillable = [
        'year', 
        'description', 
        'uploaded_by', 
        'status'
    ];
}
