<?php

namespace App\Models;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'number_class',
        'class_code',
        'max_count',
        'teacher_id'
    ];

    protected function casts() {
        return [
            'number_class' => 'integer',
            'class_code' => 'string',
            'max_count' => 'integer',
            'teacher_id' => 'integer'
        ];
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
}
