<?php


namespace App\Services;


class Stripegateway extends PaymentService{
    public function charge()
    {
        return "paid via stripe {$this->amount}";
    }
}
