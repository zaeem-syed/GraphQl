<?php

namespace App\Services;

use App\Contracts\DelieveryServiceContract;

class FedexService implements DelieveryServiceContract
{

    public function track_package($num)
    {
        return [
            "status " => "processing",
            "estimated_delievery" => "30-8-2024",
             "tracking_num" => $num
        ];
    }

    public function getshippingcost($total_weight)
    {

        switch ($total_weight) {
            case ($total_weight > 10):
                $shipping_cost = 20;
                break;

            case ($total_weight > 20 && $total_weight < 40):
                $shipping_cost = 15;
                break;

            case ($total_weight > 40 && $total_weight < 60):
                $shipping_cost = 25;
                break;

        }

        return "cost via fedex ".$shipping_cost;
    }
}
