<?php

namespace App\Models;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameTeacher',
        'item_id'
    ];

    protected function casts()
    {
        return [
            'nameTeacher' => 'string'
        ];
    }

    public function item()
    {
        return $this->hasOne(Item::class, 'id', 'item_id');
    }
}
