<?php

use App\Http\Controllers\Aset\AsetController;
use App\Http\Controllers\Aset\PenyusutanController;
use App\Http\Controllers\DataBahanController;
use App\Http\Controllers\DataJurnalController;
use App\Http\Controllers\DataProyekController;
use App\Http\Controllers\DataUser\UserController;
use App\Http\Controllers\Laporan\ArusKasController;
use App\Http\Controllers\Laporan\IndexController;
use App\Http\Controllers\Laporan\LabaRugiController;
use App\Http\Controllers\Laporan\PemasukanController;
use App\Http\Controllers\Laporan\LaporanDataProyekController;
use App\Http\Controllers\Laporan\PengeluaranController;
use App\Http\Controllers\MasterData\DataAkunController;
use App\Http\Controllers\MasterData\DataCustomerController;
use App\Http\Controllers\MasterData\DataKategoriController;
use App\Http\Controllers\Modal\PriveController;
use App\Http\Controllers\Modal\TambahModalController;
use App\Http\Controllers\OutIn\PemasukanKasController;
use App\Http\Controllers\OutIn\PengeluaranKasController;
use App\Http\Controllers\PelunasanProyekController;
use App\Models\PelunasanProyek;
use App\Http\Controllers\TutupBukuController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|PDF
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

Route::resource('/tambah-modal', TambahModalController::class);
Route::resource('/prive', PriveController::class);

Route::resource('/data-proyek', DataProyekController::class);
Route::post('/data-bahan/{id_proyek}', [DataBahanController::class, 'store'])->name('data-bahan.store');
Route::delete('/data-bahan/{id_bahan}/{id_proyek}', [DataBahanController::class, 'destroy'])->name('data-bahan.destroy');

// Route::resource('/pelunasan-proyek', PelunasanProyekController::class);
Route::get('pelunasan-proyek/{id_proyek}/create', [PelunasanProyekController::class, 'create'])->name('pelunasan-proyek.create');
Route::post('pelunasan-proyek/{id_proyek}/store', [PelunasanProyekController::class, 'store'])->name('pelunasan-proyek.store');
Route::get('pelunasan-proyek/{id_proyek}/detail', [PelunasanProyekController::class, 'show'])->name('pelunasan-proyek.show');
Route::get('pelunasan-proyek/{id_proyek}/print', [PelunasanProyekController::class, 'print'])->name('pelunasan-proyek.print');

Route::resource('pemasukan-kas', PemasukanKasController::class);
Route::resource('pengeluaran-kas', PengeluaranKasController::class);

Route::resource('aset-aktif', AsetController::class);
Route::get('penyusutan', [PenyusutanController::class, 'index'])->name('penyusutan.index');
Route::get('data-jurnal', [DataJurnalController::class, 'index'])->name('data-jurnal.index');
Route::get('jurnal-result', [DataJurnalController::class, 'cari'])->name('jurnal.result');

Route::get('tutup-buku', [TutupBukuController::class, 'index'])->name('tutup-buku.index');
Route::get('tutup-buku-result', [TutupBukuController::class, 'results'])->name('tutup-buku.results');

// Owner
Route::resource('data-user', UserController::class);
Route::get('laporan', [IndexController::class, 'index'])->name('laporan.index');
Route::get('laporan-pemasukan', [PemasukanController::class, 'index'])->name('laporan-pemasukan.index');
Route::get('laporan-pemasukan-results', [PemasukanController::class, 'result'])->name('laporan-pemasukan.result');
Route::post('laporan-pemasukan-export', [PemasukanController::class, 'pdf'])->name('pemasukan.pdf');

Route::get('laporan-pengeluaran', [PengeluaranController::class, 'index'])->name('laporan-pengeluaran.index');
Route::get('laporan-pengeluaran-results', [PengeluaranController::class, 'result'])->name('laporan-pengeluaran.result');
Route::post('laporan-pengeluaran-export', [PengeluaranController::class, 'pdf'])->name('pengeluaran.pdf');

Route::get('laporan-laba-rugi', [LabaRugiController::class, 'index'])->name('laba-rugi.index');
Route::get('laporan-laba-rugi-results', [LabaRugiController::class, 'result'])->name('laba-rugi.result');
Route::post('laporan-laba-rugi-export', [LabaRugiController::class, 'pdf'])->name('laba-rugi.pdf');

Route::get('laporan-arus-kas', [ArusKasController::class, 'index'])->name('laporan-arus-kas.index');
Route::get('laporan-arus-kas-results', [ArusKasController::class, 'result'])->name('laporan-arus-kas.result');
Route::post('laporan-arus-kas-export', [ArusKasController::class, 'pdf'])->name('lapran-arus-kas.pdf');

Route::prefix('laporan')->group(function () {
    Route::get('data-proyek', [LaporanDataProyekController::class, 'index'])->name('laporan-data-proyek.index');
    Route::get('data-proyek/print', [LaporanDataProyekController::class, 'print'])->name('laporan-data-proyek.print');
});
