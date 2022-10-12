<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

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



Route::view('','home');
Route::view('contact','contact');
Route::resource('shop', ProductsController::class);

Route::post('/',[CartController::class, 'store'])->name('cart.store');

Route::resource('/order',OrderController::class);

Route::post('/cart/{rowid}',[CartController::class, 'destroy'])->name('cart.destroy');
Route::get('/cart',[CartController::class, 'index'])->name('cart.index');

Route::get('/dashboard', function () {
    $orders = Order::where('user_id','=',Auth::user()->id)->get();
    return view('dashboard',['orders'=>$orders]);
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
