<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Rider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Delievery extends Model
{
    use HasFactory;

    protected $guarded=[];


    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function rider() {
        return $this->belongsTo(Rider::class);
    }
}
