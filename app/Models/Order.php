<?php

namespace App\Models;

use App\Models\OrderItem;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $guarded=[];

    

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
