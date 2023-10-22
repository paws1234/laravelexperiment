<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ulokcontroller;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
Route::get('/chat', 'App\Http\Controllers\ChatController@index')->name('chat');
Route::post('/send-message', 'App\Http\Controllers\MessagesController@sendMessage');
Route::get('/get-messages/{receiver_id}', 'App\Http\Controllers\MessagesController@getMessages');
Route::get('/get-messages', [MessagesController::class, 'getMessages']);
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('edit');
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::middleware(['auth'])->group(function () {

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{id}/buy', [ProductController::class, 'buy'])->name('products.buy');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
});

Route::middleware(['auth', 'admin'])->group(function () {
    
   
    Route::get('/admin', [ulokcontroller::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/products', [ulokcontroller::class, 'index'])->name('admin.products.index');
    Route::resource('/admin/products', App\Http\Controllers\ulokcontroller::class)->except(['show']);
    Route::get('/admin/products/create', [App\Http\Controllers\ulokcontroller::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [App\Http\Controllers\ulokcontroller::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{id}/edit', [App\Http\Controllers\ulokcontroller::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{id}/edit', [App\Http\Controllers\ulokcontroller::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{id}', [App\Http\Controllers\ulokcontroller::class, 'destroy'])->name('admin.products.destroy');
 
    
    Route::get('/admin/products', function () {
        if (auth()->user() && !auth()->user()->isAdmin()) {
            return redirect()->route('products.index');
        } else {
            return view('admin.products.index');
        }
    })->name('admin.products.index');
});

Route::get('/payments/create', [App\Http\Controllers\PaymentController::class, 'create'])->name('payments.create');
Route::post('/payments/store', [PaymentController::class, 'store'])->name('payments.store');
Route::get('/payments/error', [App\Http\Controllers\PaymentController::class, 'error'])->name('payment.error');
Route::get('/payments/confirmation', [App\Http\Controllers\PaymentController::class, 'confirmation'])->name('payments.confirmation');
Route::get('/payments/confirmation', 'App\Http\Controllers\PaymentController@confirmation')->name('payments.confirmation');
Route::get('/checkout/reset', [CheckoutController::class, 'resetCheckout'])->name('checkout.reset');
Route::get('/payment/paymentSuccessful', [CheckoutController::class, 'CheckoutController@paymentSuccessful'])->name('payment.successful');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/votinghome', function () {
    return view('votinghome');
})->name('votinghome');

Route::resource('candidates', App\Http\Controllers\CandidatesController::class);
Route::get('/dashboard', 'App\Http\Controllers\UserController@dashboard')->name('user.dashboard');
Route::post('/vote/{candidate}', 'App\Http\Controllers\UserController@vote')->name('user.vote');
Route::get('/results', 'App\Http\Controllers\ResultsController@index')->name('results.index');
Route::get('/voter/dashboard', 'App\Http\Controllers\UserController@dashboard')->name('voter.dashboard');
Route::get('/results', [App\Http\Controllers\ResultsController::class, 'index'])->name('results.index');
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/ecommerce', [App\Http\Controllers\HomeController::class, 'ecommerce'])->name('ecommercehome');
