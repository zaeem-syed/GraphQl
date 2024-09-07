<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\DeleiveryController;

use App\Http\Controllers\RiderAuth\LoginController as RiderLoginController;

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

Route::get('/index',[PostController::class,'index']);

Route::post('/post/store',[PostController::class,'store']);
Route::get('/create/post',[PostController::class,'create']);

Route::get('/weather', [WeatherController::class, 'show'])->name('weather.show');


Route::get('/order',[OrderController::class,'placeOrder']);


Route::get('/rider/dashboard', [RiderController::class, 'dashboard'])->name('rider.dashboard');
    Route::post('/rider/delivery/accept/{id}', [RiderController::class, 'acceptDelivery']);
    Route::post('/rider/delivery/reject/{id}', [RiderController::class, 'rejectDelivery']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// routes/web.php

// use App\Http\Controllers\WeatherController;
// use App\Http\Controllers\DeleiveryController;
// use App\Http\Controllers\RiderAuth\LoginController as RiderLoginController;
// use App\Http\Controllers\RiderAuth\RegisterController as RiderRegisterController;
// use App\Http\Controllers\RiderAuth\ForgotPasswordController as RiderForgotPasswordController;
// use App\Http\Controllers\RiderAuth\ResetPasswordController as RiderResetPasswordController;

Route::prefix('rider')->group(function () {
    Route::get('login', [RiderLoginController::class, 'showLoginForm'])->name('rider.login');
    Route::post('login', [RiderLoginController::class, 'login']);
    Route::post('logout', [RiderLoginController::class, 'logout'])->name('rider.logout');

    // Route::get('register', [RiderRegisterController::class, 'showRegistrationForm'])->name('rider.register');
    // Route::post('register', [RiderRegisterController::class, 'register']);

    // Route::get('password/reset', [RiderForgotPasswordController::class, 'showLinkRequestForm'])->name('rider.password.request');
    // Route::post('password/email', [RiderForgotPasswordController::class, 'sendResetLinkEmail'])->name('rider.password.email');
    // Route::get('password/reset/{token}', [RiderResetPasswordController::class, 'showResetForm'])->name('rider.password.reset');
    // Route::post('password/reset', [RiderResetPasswordController::class, 'reset'])->name('rider.password.update');
});


