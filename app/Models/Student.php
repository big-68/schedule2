<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'class_id',
        'group_id'
    ];

    protected function casts()
    {
        return [
            'user_id' => 'integer',
            'class_id' => 'integer',
            'group_id' => 'integer'
        ];
    }
}
