<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DeleiveryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/movies',[MoviesController::class,'index']);
Route::get('/movies/{id}',[MoviesController::class,'find']);


Route::get('/payment',[PaymentController::class,"pay"]);


Route::get('/track',[DeleiveryController::class,'track_package']);
route::get('/weight',[DeleiveryController::class,'total_weight']);


Route::get('/show',[PostController::class,'show']);
