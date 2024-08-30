<?php

interface LoggerInterface
{
    public function log(string $message);
}

interface NotifierInterface
{
    public function notify(string $message);
}

class NotificationService implements LoggerInterface, NotifierInterface
{
    public function log(string $message)
    {
        echo "Log: $message\n";
    }

    public function notify(string $message)
    {
        echo "Notify: $message\n";
    }
}

$service = new NotificationService();
$service->log('This is a log message.');
$service->notify('This is a notification.');
