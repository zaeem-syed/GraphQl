<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AreaSeeder extends Seeder
{
    protected $model= Area::class;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $area=["johartown", "modelTown", "lawrence garden"];
        foreach($area as $areas)
        {
            Area::Create([
                'name' => $areas
            ]);

        }


    }
}
