<?php

namespace App\Http\Controllers;

use App\Contracts\DelieveryServiceContract;
use Illuminate\Http\Request;

class DeleiveryController extends Controller
{
    //

    protected $delievery_system;

    public function __construct(DelieveryServiceContract $delievery_system )
    {
        $this->delievery_system=$delievery_system;
    }


    public function track_package()
    {
        $num=110;
        $track=$this->delievery_system->track_package($num);
        return response()->json([
            "response" => $track
        ]);
    }

    public function total_weight()
    {
        $weight=40;
        $result=$this->delievery_system->getshippingcost($weight);
        return response()->json([
            "response" => "the cost is ".$result
        ]);
    }




}
