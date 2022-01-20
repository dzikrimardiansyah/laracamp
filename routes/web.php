<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\HomeController;
use GuzzleHttp\Promise\Create;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// Route::get('checkout/{camps:slug}', function () {
//     return view('checkout');
// })->name('checkout');




Route::get('success_checkout', function () {
})->name('success_checkout');

Route::get('sign-in-google',[UserController::class,'google'])->name('user.login.google');
Route::get('/auth/google/callback',[UserController::class,'handleProviderCallback'])->name('user.google.callback');

Route::get('dashboard', [HomeController::class,'dashboard'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('checkout/{camps:slug}', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('checkout/{camps}', [CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('dashboard', [HomeController::class,'dashboard'])->name('dashboard');
    
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
