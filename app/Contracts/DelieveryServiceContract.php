<?php

namespace App\Contracts;


interface DelieveryServiceContract{

    public function track_package($tracking_num);

    public function getshippingcost($total_weight);


}
