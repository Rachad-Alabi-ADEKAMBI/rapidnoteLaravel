<?php

use Illuminate\Support\Facades\Route;

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
    return view('pages/front/home');
});

Route::get('/home', function () {
    return view('pages/front/home');
});

Route::get('/about', function () {
    return view('pages/front/about');
});

Route::get('/support', function () {
    return view('pages/front/support');
});

Route::get('/contact', function () {
    return view('pages/front/contact');
});

Route::get('/users', function () {
    return view('pages/back/users');
});

Route::get('/wallet', function () {
    return view('pages/back/wallet');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('/pages/back/dashboard');
    })->name('dashboard');
});

Route::get('/myTransactions', function () {
    return view('/pages/back/myTransactions');
});

Route::get('/transactionsApi', [
    App\Http\Controllers\TransactionController::class,
    'getTransactions',
]);

Route::get('/transactionApi/{id}', [
    App\Http\Controllers\TransactionController::class,
    'getTransaction',
]);

Route::get('/ratesApi', [
    App\Http\Controllers\RateController::class,
    'getRates',
])->name('ratesApi');

Route::get('/usersApi', [
    App\Http\Controllers\UserController::class,
    'getUsers',
])->name('usersApi');

Route::get('/userApi/{id}', [
    App\Http\Controllers\UserController::class,
    'getUser',
]);

Route::get('/rateApi/{id}', [
    App\Http\Controllers\RateController::class,
    'getRate',
]);