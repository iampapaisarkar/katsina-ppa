<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
    ];
   
    public function service_type() {
        return $this->hasOne(ServiceType::class, 'id','type');
    }
}
