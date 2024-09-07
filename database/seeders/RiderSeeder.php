<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rider;
use App\Models\Area;
use Illuminate\Support\Facades\Hash;

class RiderSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $index) {
            Rider::create([
                "name" => "Rider " . $index,
                "area_id" => Area::inRandomOrder()->first()->id,
                "email" => $faker->unique()->safeEmail(),
                "password" => Hash::make('password') // Default password
            ]);
        }
    }
}
