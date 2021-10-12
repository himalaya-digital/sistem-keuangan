<?php

use App\Http\Controllers\Aset\AsetController;
use App\Http\Controllers\Aset\PenyusutanController;
use App\Http\Controllers\DataBahanController;
use App\Http\Controllers\DataJurnalController;
use App\Http\Controllers\DataProyekController;
use App\Http\Controllers\MasterData\DataAkunController;
use App\Http\Controllers\MasterData\DataCustomerController;
use App\Http\Controllers\MasterData\DataKategoriController;
use App\Http\Controllers\OutIn\PemasukanKasController;
use App\Http\Controllers\OutIn\PengeluaranKasController;
use App\Http\Controllers\TutupBukuController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login', function () {
    return redirect()->to('/');
})->name('login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Data Master
Route::prefix('master-data')->group(function () {
    Route::resource('/data-akun', DataAkunController::class);
    Route::resource('/data-customer', DataCustomerController::class);
    Route::resource('/data-kategori', DataKategoriController::class);
});
Route::resource('/data-proyek', DataProyekController::class);
Route::post('/data-bahan/{id_proyek}', [DataBahanController::class, 'store'])->name('data-bahan.store');
Route::delete('/data-bahan/{id_bahan}/{id_proyek}', [DataBahanController::class, 'destroy'])->name('data-bahan.destroy');
Route::resource('pemasukan-kas', PemasukanKasController::class);
Route::resource('pengeluaran-kas', PengeluaranKasController::class);

Route::resource('aset-aktif', AsetController::class);
Route::get('penyusutan', [PenyusutanController::class, 'index'])->name('penyusutan.index');
Route::get('data-jurnal', [DataJurnalController::class, 'index'])->name('data-jurnal.index');
Route::get('jurnal-result', [DataJurnalController::class, 'cari'])->name('jurnal.result');

Route::get('tutup-buku', [TutupBukuController::class, 'index'])->name('tutup-buku.index');
