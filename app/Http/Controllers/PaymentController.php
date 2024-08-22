<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Requeest;
use App\Services\Stripegateway;
use App\Contracts\NotificationContractsService;



class PaymentController extends Controller
{
    //

    protected $notification_service;

    public function __construct(NotificationContractsService $notification_service)
    {
        $this->notification_service=$notification_service;

    }

    public function pay()
    {
        $user=User::find(1);
        $message="bhean ka lun ";
        $stripe= new Stripegateway(1120);
        echo $stripe->charge()." ".$this->notification_service->sent_notification($user,$message);

    }
}
