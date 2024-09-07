<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResturantSeeder extends Seeder
{

    protected $model =Restaurant::class;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $name=["clicky chciken","bbq smoke","The Lost Tribe","Nirala Bar bq & Grill Fish"];
        $address=["street no 1","street no 29","street no 89","street no 190"];

        foreach($name as $key => $value)
        Restaurant::create([
            'name' => $value,
            'address' => $address[$key],
            "area_id" => Area::inRandomOrder()->first()->id
        ]);

    }
}
