<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_of_week', // день недели
        'callingSchedule_id', // номер урока, начало урока и т.д
        'classRoom_id', //кабинет где проводятся занятия
        'item_id', // названеи предмета
        'teacher_id', //учитель который ведет занятие
        'schoolClass_id' // класс
    ];

    protected function casts()
    {
        return [
            'date_of_week' => 'string',
            'callingSchedule_id' => 'integer',
            'classRoom_id' => 'integer',
            'item_id' => 'integer',
            'teacher_id' => 'integer',
            'schoolClass_id' => 'integer'
        ];
    }
    public function schoolClass()
    {
        return $this->hasOne(SchoolClass::class,'id', 'schoolClass_id');
    }
    public function callingSchedule()
    {
        return $this->hasOne(CallingSchedule::class, 'id', 'callingSchedule_id');
    }
    public function classroom()
    {
        return $this->hasOne(Classroom::class, 'id', 'classRoom_id');
    }
    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'id', 'teacher_id');
    }
    public function item()
    {
        return $this->hasOne(Item::class, 'id', 'item_id');
    }
}
