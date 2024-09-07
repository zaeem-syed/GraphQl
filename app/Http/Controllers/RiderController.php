<?php

// app/Http/Controllers/RiderController.php

namespace App\Http\Controllers;

use App\Models\OrderAssignment;
use Illuminate\Http\Request;

class RiderController extends Controller
{
    public function dashboard()
    {
        return view('resturant.rider');
    }

    public function acceptDelivery($id)
    {
        $assignment = OrderAssignment::findOrFail($id);

        // Ensure that only the assigned rider can accept
        if ($assignment->rider_id != auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $assignment->update(['status' => 'accepted']);

        return response()->json(['message' => 'Delivery accepted!']);
    }

    public function rejectDelivery($id)
    {
        $assignment = OrderAssignment::findOrFail($id);

        // Ensure that only the assigned rider can reject
        if ($assignment->rider_id != auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $assignment->update(['status' => 'rejected']);

        return response()->json(['message' => 'Delivery rejected!']);
    }
}
