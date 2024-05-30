<?php

namespace App\Models;

use App\Models\SchoolClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'name_class',
        'floor',
        'class_id'
    ];

    public function className()
    {
        return $this->hasOne(SchoolClass::class, 'id', 'class_id');
    }
}
