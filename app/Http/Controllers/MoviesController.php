<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Repositories\MovieRepositoryInterface;

class MoviesController extends Controller
{
    //


    // public function index()
    // {
    //     $movies=Movie::all();
    //     return response()->json([
    //         'status' => 200,
    //         'data' => $movies
    //     ]);
    // }
    protected $movieRepository;

    public function __construct(MovieRepositoryInterface $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function index()
    {
        $movies = $this->movieRepository->all();
        return response()->json($movies);
    }

    public function find($id)
    {
        $movie=$this->movieRepository->find($id);
        return response()->json($movie);
    }


}
