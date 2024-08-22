<?php


namespace App\Services;

use App\Contracts\NotificationContractsService;

class Emailnotification implements NotificationContractsService {

public function sent_notification($user,$message)

{
    return "This mail is intended for the user {$user->name} and the message is this: {$message}";
}

}
