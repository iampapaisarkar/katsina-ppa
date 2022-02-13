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
        'payment_date',
        'payment_method',
        'query',
        'query_by',
        'approve_by'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function queried_by() {
        return $this->hasOne(User::class, 'id','query_by');
    }

    public function approved_by() {
        return $this->hasOne(User::class, 'id','approve_by');
    }

    public function service() {
        return $this->hasOne(AdditionalFee::class, 'id','service_id');
    }

    public function extra_service() {
        return $this->hasOne(RegistrationCategory::class, 'id','extra_service_id');
    }

    public function vendor_registration() {
        return $this->hasOne(Registration::class, 'id','registration_id')
        ->where('type', 'vendor_registration')
        ->with(
            'company_details.core_competence', 
            'company_details.organization_type', 
            'company_details.company_state', 
            'company_directors', 
            'product_service_types', 
            'product_services', 
            'category_documents.registration_category'
        );
    }
}
