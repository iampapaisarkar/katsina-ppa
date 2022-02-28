<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'year', 
        'description', 
        'uploaded_by', 
        'status'
    ];

    public function upload_by() {
        return $this->hasOne(User::class, 'id','uploaded_by');
    }

    public function projects() {
        return $this->hasOne(PlanProject::class, 'plan_id','id');
    }
}
