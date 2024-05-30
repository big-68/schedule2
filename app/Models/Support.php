<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'description',
        'flag'
    ];

    protected function casts()
    {
        return [
            'email' => 'string',
            'description' => 'string',
            'flag' => 'integer'
        ];
    }
}
