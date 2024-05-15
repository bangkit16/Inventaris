<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->middleware('auth');
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['prefix' => 'pelaporan', 'middleware' => 'isJurusan'], function () {
    Route::get('/', [HomeController::class, 'pelaporan']);
    Route::get('/barangPdf', [PelaporanController::class, 'barangPdf']);
    Route::get('/barangExcel', [PelaporanController::class, 'barangExcel']);
    Route::get('/barangCsv', [PelaporanController::class, 'barangCsv']);
    Route::get('/transaksiPdf', [PelaporanController::class, 'transaksiPdf']);
    Route::get('/transaksiPdf', [PelaporanController::class, 'transaksiPdf']);
    Route::get('/transaksiExcel', [PelaporanController::class, 'transaksiExcel']);
    Route::get('/transaksiExcel', [PelaporanController::class, 'transaksiExcel']);
    Route::get('/transaksiExcel', [PelaporanController::class, 'transaksiExcel']);
    Route::get('/peminjamanCsv', [PelaporanController::class, 'peminjamanCsv']);
    Route::get('/peminjamanPdf', [PelaporanController::class, 'peminjamanPdf']);
    Route::get('/peminjamanExcel', [PelaporanController::class, 'peminjamanExcel']);
});
Route::group(['prefix' => 'barang', 'middleware' => 'isAdmin'], function () {
    Route::get('/', [BarangController::class, 'index']);
    // Route::get('/cetak', [BarangController::class, 'excel']);
    Route::post('/list', [BarangController::class, 'list']);
    Route::get('/create', [BarangController::class, 'create']);
    Route::post('/', [BarangController::class, 'store']);
    Route::get('/{id}', [BarangController::class, 'show']);
    Route::get('/{id}/edit', [BarangController::class, 'edit']);
    Route::put('/{id}', [BarangController::class, 'update']);
    Route::delete('/{id}', [BarangController::class, 'destroy']);
});

Route::group(['prefix' => 'barang_masuk', 'middleware' => 'isAdmin'], function () {
    Route::get('/', [BarangMasukController::class, 'index']);
    Route::post('/list', [BarangMasukController::class, 'list']);
    Route::get('/create', [BarangMasukController::class, 'create']);
    // Route::post('/', [BarangMasukController::class, 'store']);
    // Route::get('/{id}', [BarangMasukController::class, 'show']);
    // Route::get('/{id}/edit', [BarangMasukController::class, 'edit']);
    Route::put('/{id}', [BarangMasukController::class, 'update']);
    Route::delete('/{id}', [BarangMasukController::class, 'destroy']);
});

Route::group(['prefix' => 'barang_keluar', 'middleware' => 'isAdmin'], function () {
    Route::get('/', [BarangKeluarController::class, 'index']);
    Route::post('/list', [BarangKeluarController::class, 'list']);
    // Route::get('/create', [BarangKeluarController::class, 'create']);
    // Route::post('/', [BarangKeluarController::class, 'store']);
    // Route::get('/{id}', [BarangKeluarController::class, 'show']);
    Route::get('/{id}/edit', [BarangKeluarController::class, 'edit']);
    Route::put('/{id}', [BarangKeluarController::class, 'update']);
    Route::delete('/{id}', [BarangKeluarController::class, 'destroy']);
});
Route::group(['prefix' => 'user', 'middleware' => 'isJurusan'], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/list', [UserController::class, 'list']);
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::get('/{id}/edit', [UserController::class, 'edit']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});
Route::group(['prefix' => 'mahasiswa', 'middleware' => 'isAdmin'], function () {
    Route::get('/', [MahasiswaController::class, 'index']);
    Route::post('/list', [MahasiswaController::class, 'list']);
    Route::get('/create', [MahasiswaController::class, 'create']);
    Route::post('/', [MahasiswaController::class, 'store']);
    Route::get('/{id}', [MahasiswaController::class, 'show']);
    Route::get('/{id}/edit', [MahasiswaController::class, 'edit']);
    Route::put('/{id}', [MahasiswaController::class, 'update']);
    Route::delete('/{id}', [MahasiswaController::class, 'destroy']);
});
// Route::group(['prefix' => 'level'], function () {
//     Route::get('/', [LevelController::class, 'index']);
//     Route::post('/list', [LevelController::class, 'list']);
//     Route::get('/create', [LevelController::class, 'create']);
//     Route::post('/', [LevelController::class, 'store']);
//     Route::get('/{id}', [LevelController::class, 'show']);
//     Route::get('/{id}/edit', [LevelController::class, 'edit']);
//     Route::put('/{id}', [LevelController::class, 'update']);
//     Route::delete('/{id}', [LevelController::class, 'destroy']);
// });

Route::group(['prefix' => 'peminjaman', 'middleware' => 'isAdmin'], function () {
    Route::get('/', [PeminjamanController::class, 'index']);
    Route::post('/list', [PeminjamanController::class, 'list']);
    Route::get('/create', [PeminjamanController::class, 'create']);
    Route::post('/', [PeminjamanController::class, 'store']);
    // Route::get('/{id}', [PeminjamanController::class, 'show']);
    Route::get('/{id}/edit', [PeminjamanController::class, 'edit']);
    Route::put('/{id}', [PeminjamanController::class, 'update']);
    Route::delete('/{id}', [PeminjamanController::class, 'destroy']);
    Route::post('/kembali/{id}', [PeminjamanController::class, 'kembali']);
});
Route::group(['prefix' => 'pengembalian', 'middleware' => 'isAdmin'], function () {
    Route::get('/', [PengembalianController::class, 'index']);
    Route::post('/list', [PengembalianController::class, 'list']);
    // Route::get('/create', [PengembalianController::class, 'create']);
    // Route::post('/', [PengembalianController::class, 'store']);
    Route::get('/{id}', [PengembalianController::class, 'show']);
    Route::get('/{id}/edit', [PengembalianController::class, 'edit']);
    Route::put('/{id}', [PengembalianController::class, 'update']);
    Route::delete('/{id}', [PengembalianController::class, 'destroy']);
});
Route::group(['prefix' => 'denda', 'middleware' => 'isAdmin'], function () {
    Route::get('/', [DendaController::class, 'index']);
    Route::post('/list', [DendaController::class, 'list']);
    // Route::get('/create', [DendaController::class, 'create']);
    // Route::post('/', [DendaController::class, 'store']);
    Route::get('/{id}', [DendaController::class, 'show']);
    Route::get('/{id}/edit', [DendaController::class, 'edit']);
    Route::put('/{id}', [DendaController::class, 'update']);
    Route::delete('/{id}', [DendaController::class, 'destroy']);
});
