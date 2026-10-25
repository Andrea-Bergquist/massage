<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $table = 'treatments';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'duration_minutes',
        'ís_active'
    ];
}
