<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        Movie::create([
            'title' => $faker->catchPhrase,
            'description' => $faker->paragraph,
            'director' => $faker->name,
            'producer' => $faker->name,
            'release_date' => $faker->date(),
            'runtime' => $faker->numberBetween(80, 180), // Random runtime between 80 and 180 minutes
            'genre' => json_encode($faker->randomElements(['Action', 'Drama', 'Comedy', 'Horror', 'Thriller'], 2)),
            'language' => $faker->randomElement(['English', 'French', 'Spanish', 'German', 'Japanese']),
            'rating' => $faker->randomFloat(1, 5, 10), // Rating between 5.0 and 10.0
            'poster_image' => 'images/movies/1.jpg', // You can replace this with a real image if available
            'trailer_url' => 'https://www.youtube.com/watch?v=' . $faker->regexify('[A-Za-z0-9_-]{11}'), // Generates a fake YouTube video ID
            'production_company' => $faker->company,
            'cast' => json_encode([$faker->name, $faker->name, $faker->name]), // Three fake actor names
            'budget' => $faker->numberBetween(5000000, 200000000), // Budget between 5M and 200M
            'box_office' => $faker->numberBetween(10000000, 1000000000), // Box office between 10M and 1B
            'is_featured' => $faker->boolean,
        ]);
        Movie::create([
            'title' => $faker->catchPhrase,
            'description' => $faker->paragraph,
            'director' => $faker->name,
            'producer' => $faker->name,
            'release_date' => $faker->date(),
            'runtime' => $faker->numberBetween(80, 180), // Random runtime between 80 and 180 minutes
            'genre' => json_encode($faker->randomElements(['Action', 'Drama', 'Comedy', 'Horror', 'Thriller'], 2)),
            'language' => $faker->randomElement(['English', 'French', 'Spanish', 'German', 'Japanese']),
            'rating' => $faker->randomFloat(1, 5, 10), // Rating between 5.0 and 10.0
            'poster_image' => 'images/movies/2.jpg', // You can replace this with a real image if available
            'trailer_url' => 'https://www.youtube.com/watch?v=' . $faker->regexify('[A-Za-z0-9_-]{11}'), // Generates a fake YouTube video ID
            'production_company' => $faker->company,
            'cast' => json_encode([$faker->name, $faker->name, $faker->name]), // Three fake actor names
            'budget' => $faker->numberBetween(5000000, 200000000), // Budget between 5M and 200M
            'box_office' => $faker->numberBetween(10000000, 1000000000), // Box office between 10M and 1B
            'is_featured' => $faker->boolean,
        ]);

        Movie::create([
            'title' => $faker->catchPhrase,
            'description' => $faker->paragraph,
            'director' => $faker->name,
            'producer' => $faker->name,
            'release_date' => $faker->date(),
            'runtime' => $faker->numberBetween(80, 180), // Random runtime between 80 and 180 minutes
            'genre' => json_encode($faker->randomElements(['Action', 'Drama', 'Comedy', 'Horror', 'Thriller'], 2)),
            'language' => $faker->randomElement(['English', 'French', 'Spanish', 'German', 'Japanese']),
            'rating' => $faker->randomFloat(1, 5, 10), // Rating between 5.0 and 10.0
            'poster_image' => 'images/movies/3.jpg', // You can replace this with a real image if available
            'trailer_url' => 'https://www.youtube.com/watch?v=' . $faker->regexify('[A-Za-z0-9_-]{11}'), // Generates a fake YouTube video ID
            'production_company' => $faker->company,
            'cast' => json_encode([$faker->name, $faker->name, $faker->name]), // Three fake actor names
            'budget' => $faker->numberBetween(5000000, 200000000), // Budget between 5M and 200M
            'box_office' => $faker->numberBetween(10000000, 1000000000), // Box office between 10M and 1B
            'is_featured' => $faker->boolean,
        ]);



    }
}
