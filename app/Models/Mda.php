<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mda extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'code', 'type', 'has_head'
    ];

    public function mda_type() {
        return $this->hasOne(MdaType::class, 'id','type');
    }
}
