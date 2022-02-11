<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDocuments extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'registration_id',
        'registration_category_id',
        'attachment_1',
        'attachment_2',
        'attachment_3',
        'attachment_4',
        'attachment_5',
        'attachment_6',
        'attachment_7',
        'attachment_8',
        'attachment_9',
    ];

    public function registration_category() {
        return $this->hasOne(RegistrationCategory::class, 'id','registration_category_id');
    }
}
