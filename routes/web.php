<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Product\Create;
use App\Http\Livewire\Product\Show;

use App\Http\Livewire\Checkout;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CompleteOrderController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/products', function(){
    return view ('acreate');
});
Route::get('/show', function(){
    return view ('show');
});

Route::get('/products/{productSlug}', Show::class)->name('product.show');
Route::get('/checkout', Checkout::class)->name('checkout');
// Route::get('/checkout',function(){
//     return view ('livewire.checkout');
// });

// Route::livewire('/crear','product.create')->name('products.create');
Route::get('/paypal/payment', [PaymentController::class,'paypalPaymenteRequest'])->name('paypal.payment');
Route::get('/paypal/checkout/{status}', [PaymentController::class,'paypalCheckout'])->name('paypal.checkout');

Route::post('/stripe/checkout',[PaymentController::class,'stripeCheckout'])->name('stripe.checkout');

Route::get('/order/complete/{order}',[CompleteOrderController::class,'stripeCheckout'])->name('order.complete');
Route::post('/order/{order}',[CompleteOrderController::class,'stripeCheckout'])->name('complete');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
