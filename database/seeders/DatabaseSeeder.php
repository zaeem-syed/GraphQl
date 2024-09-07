<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();

        // Post::factory()->create(10);
        // Post::factory()->count(10)->create();

        $this->call(AreaSeeder::class);
        $this->call(ResturantSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(RiderSeeder::class);
        // $this->call(orderSeeder::class);





        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call(MovieSeeder::class);
        // User::factory()->create(10);
    }
}
