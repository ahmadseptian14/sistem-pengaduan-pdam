<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\UpdatePasswordController;
use App\Models\Pengaduan;
use App\Models\Penilaian;
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

// Halaman Utama
// Route::get('/', [HomeController::class, 'index'])->name('home');

// Penilaian


Route::middleware(['auth','pelanggan'])->group( function() {
    Route::get('/', [PengaduanController::class, 'pengaduan_pelanggan'])->name('pengaduan.pelanggan');
    Route::get('/input-pengaduan', [PengaduanController::class, 'create'])->name('pengaduan.create');
    Route::post('/input-pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
    Route::get('/detail-pengaduan/{id}', [PengaduanController::class, 'detail_pengaduan'])->name('pengaduan.detail');


    Route::get('/input-penilaian/{id}', [PenilaianController::class, 'create'])->name('penilaian.create');
    Route::post('/input-penilaian', [PenilaianController::class, 'store'])->name('penilaian.store');
});

   

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function() {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    // Pengaduan
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::get('/detail-pengaduan/{id}', [PengaduanController::class, 'show'])->name('pengaduan.show');
    Route::delete('/pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');
    Route::get('/cetak-laporan', [PengaduanController::class, 'cetakForm'])->name('cetak.form');
    Route::get('/cetak-laporan-pengaduan', [PengaduanController::class, 'cetakLaporan'])->name('cetak.laporan');


    // Tanggapan
    Route::get('/tanggapan/{id}', [TanggapanController::class, 'show'])->name('tanggapan.show');
    Route::post('/tanggapan', [TanggapanController::class, 'store'])->name('tanggapan.store');

    // Petugas
    Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.index');
    Route::get('create-petugas', [PetugasController::class, 'create'])->name('petugas.create');
    Route::post('/create-petugas', [PetugasController::class, 'store'])->name('petugas.store');
    
    // customer
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/edit-customer/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('/edit-customer/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/customer-delete/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');

    //Penialain
    // Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
    Route::get('/grafik-penilaian', [PenilaianController::class, 'grafik'])->name('grafik.index');

    // Ubah Password
    Route::get('/password/edit', [UpdatePasswordController::class, 'edit'])->name('password.edit');
    Route::put('/password/edit', [UpdatePasswordController::class, 'update']);
});





Auth::routes();
