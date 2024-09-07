<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $price=[1000,120,130,450,490,630,900];
        $items=["burger","pizza","bbq","dhai bhalay","lazania","sajji","biryani daig"];
        foreach($price as $key => $value)
        {
            Menu::Create([
                "restaurant_id" => Restaurant::inRandomOrder()->first()->id,
                 "item_name" => $items[$key],
                 'price' => $value
            ]);
        }



    }
}
