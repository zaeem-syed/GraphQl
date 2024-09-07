<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class orderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // Get all restaurant IDs and user IDs
        $restaurantIds = Restaurant::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();

        // Create 50 orders with random restaurant_id and user_id
        for ($i = 0; $i < 50; $i++) {
            Order::create([
                'restaurant_id' => $restaurantIds[array_rand($restaurantIds)],
                'user_id' => $userIds[array_rand($userIds)],
                'total_price' => rand(1000, 5000) / 100, // random price between 10.00 and 50.00
                'status' => "pending",
            ]);
        }

    }
}
