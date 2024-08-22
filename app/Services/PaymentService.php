<?php

namespace App\Services;


abstract class PaymentService {

    protected $amount;

    public function __construct($amount)
    {
        $this->amount=$amount;
    }

    abstract public function charge();

    public function get_amount()
    {
        return $this->amount;
    }




}
