<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Events\DeliveryAssigned;
use App\Jobs\AssignOrderToRider;

class OrderController extends Controller
{
    //

    public function placeOrder(Request $request)
    {
        $order = Order::create([
            'restaurant_id' => 1,
            'user_id' => 3,
            'total_price' => 100.00,
            'status' => 'pending',
        ]);

        // dd($order);

        // Start the job to assign the order to a rider
        AssignOrderToRider::dispatch($order);

        broadcast(new DeliveryAssigned($order));

        return response()->json(['message' => 'Order placed successfully!']);
    }
}
