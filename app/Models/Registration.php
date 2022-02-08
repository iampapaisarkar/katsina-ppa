<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment',
        'status',
        'type',
        'query'
    ];

    public function company_details() {
        return $this->hasOne(CompanyDetails::class, 'registration_id','id');
    }

    public function company_directors() {
        return $this->hasMany(CompanyDirectors::class, 'registration_id','id');
    }

    public function product_service_types() {
        return $this->hasMany(ProductServices::class, 'registration_id','id')
        ->join('service_types', 'service_types.id', 'product_services.service_type_id')
        ->select('service_types.title', 'service_types.id as service_type_id', 'product_services.service_type_id', 'product_services.registration_id', 'product_services.id');
    }

    public function product_services() {
        return $this->hasMany(ProductServices::class, 'registration_id','id')
        ->join('services', 'services.id', 'product_services.service_id')
        ->select('services.title', 'services.id as service_id', 'product_services.service_id', 'product_services.registration_id', 'product_services.id');
    }

    public function category_documents() {
        return $this->hasOne(CategoryDocuments::class, 'registration_id','id');
    }
}
