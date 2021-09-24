<?php

use App\Http\Controllers\MasterData\DataAkunController;
use App\Http\Controllers\MasterData\DataCustomerController;
use App\Http\Controllers\MasterData\DataKategoriController;
use Illuminate\Support\Facades\Route;

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Data Master
Route::prefix('master-data')->group(function () {
    Route::resource('/data-akun', DataAkunController::class);
    Route::resource('/data-customer', DataCustomerController::class);
    Route::resource('/data-kategori', DataKategoriController::class);
});
