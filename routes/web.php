<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductsController;

use App\Http\Controllers\OrdersController;

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
Route::get('/',[ProductsController::class,'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect',[ProductsController::class,'redirect']);

route::get('/product_details/{id}',[ProductsController::class,'product_details']);

route::post('/add_cart/{id}',[OrdersController::class,'add_cart']);

route::get('/show_orders',[OrdersController::class,'show_orders']);

route::get('/remove_orders/{id}',[OrdersController::class,'remove_orders']);

route::get('/cash_order',[OrdersController::class,'cash_order']);



