<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'order_id', 
        'reference_id', 
        'registration_id', 
        'service_id', 
        'extra_service_id', 
        'service_type', 
        'amount', 
        'service_charge',
        'total_amount', 
        'status', 
        'token',
        'is_online',
        'evidence_of_payment',
        'payment_method'
    ];
}
