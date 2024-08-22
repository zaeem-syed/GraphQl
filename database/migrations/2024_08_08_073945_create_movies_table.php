<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // Title of the movie
        $table->text('description')->nullable(); // Short description or synopsis
        $table->string('director')->nullable(); // Director's name
        $table->string('producer')->nullable(); // Producer's name
        $table->date('release_date')->nullable(); // Release date of the movie
        $table->integer('runtime')->nullable(); // Runtime in minutes
        $table->string('genre')->nullable(); // Genre of the movie
        $table->string('language')->nullable(); // Language of the movie
        $table->float('rating', 3, 1)->nullable(); // Average rating (e.g., 7.5)
        $table->string('poster_image')->nullable(); // Path to the poster image
        $table->string('trailer_url')->nullable(); // URL to the movie trailer
        $table->string('production_company')->nullable(); // Production company name
        $table->string('cast')->nullable(); // Cast members (stored as a JSON array or a comma-separated string)
        $table->decimal('budget', 15, 2)->nullable(); // Budget of the movie
        $table->decimal('box_office', 15, 2)->nullable(); // Box office earnings
        $table->boolean('is_featured')->default(false); // Featured movie flag
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
