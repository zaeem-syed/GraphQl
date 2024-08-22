<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $casts = [
        'cast' => 'array',
        'genre' => 'array',
        'release_date' => 'date',
        'is_featured' => 'boolean',
    ];

}

