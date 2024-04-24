<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\CreateProdukController;
use App\Http\Controllers\LoginControllers;



Route::get('/', function () {
    return view('login');
})->middleware('guest');

// Rute untuk login
Route::post('login', [LoginControllers::class, 'login'])->name('login.post');

// Rute untuk logout
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/profil', [ProfilController::class, 'show'])->name('profil');
Route::get('/createproduk', [CreateProdukController::class, 'show'])->name('createproduk');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/sales-purchases/chart-data', 'HomeController@salesPurchasesChart')->name('sales-purchases.chart');

    Route::get('/current-month/chart-data', 'HomeController@currentMonthChart')->name('current-month.chart');

    Route::get('/payment-flow/chart-data', 'HomeController@paymentChart')->name('payment-flow.chart');
});
