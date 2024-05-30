<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallingSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'start_time',
        'end_time',
        'break_time'
    ];
}
