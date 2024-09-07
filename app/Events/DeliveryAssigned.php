<?php

namespace App\Events;

use App\Models\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DeliveryAssigned implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $assignment;

    public function __construct(Order $assignment)
    {
        $this->assignment = $assignment->load('restaurant');
    }

    public function broadcastOn()
    {
        return new Channel('rider.' . $this->assignment->rider_id);
    }

    public function broadcastWith()
    {
        return [
            'assignment_id' => $this->assignment->id,
            'order_id' => $this->assignment->id,
            'restaurant_name' => $this->assignment->restaurant->name,
            'order_total_price' => $this->assignment->total_price,
        ];
    }

    public function broadcastAs()
    {
        return 'DeliveryAssigned';
    }
}
