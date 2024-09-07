<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rider extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'area_id'];

    protected $hidden = ['password', 'remember_token'];
}
