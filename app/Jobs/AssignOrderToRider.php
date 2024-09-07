<?php

namespace App\Jobs;

use App\Models\Delivery; // Adjust the name to match your model
use App\Models\Order;
use App\Models\OrderAssignment;
use App\Models\Rider;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AssignOrderToRider implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;
    protected $riderIndex;

    public function __construct(Order $order, $riderIndex = 0)
    {
        $this->order = $order;
        $this->riderIndex = $riderIndex;
    }

    public function handle()
    {
        // Get the area ID from the associated restaurant
        $areaId = $this->order->restaurant->area_id;

        // Fetch the riders in the same area
        $riders = Rider::where('area_id', $areaId)->get();

        if ($this->riderIndex >= $riders->count()) {
            // No more riders left to assign
            $this->order->update(['status' => 'cancelled']);
            return;
        }

        $rider = $riders[$this->riderIndex];

        // Check if an assignment already exists
        $existingAssignment = OrderAssignment::where('order_id', $this->order->id)
                                             ->where('status', 'pending')
                                             ->first();

        if ($existingAssignment) {
            // If there's already a pending assignment, update it
            $existingAssignment->update([
                'rider_id' => $rider->id,
                'status' => 'pending',
            ]);
        } else {
            // Create a new order assignment
            OrderAssignment::create([
                'order_id' => $this->order->id,
                'rider_id' => $rider->id,
                'status' => 'pending',
            ]);
        }

        // Re-dispatch the job with a delay of 60 seconds to check if the order is accepted
        AssignOrderToRider::dispatch($this->order, $this->riderIndex + 1)
            ->delay(now()->addSeconds(60));
    }
}
