<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\FakultasController;
use App\Http\Controllers\admin\GambarKampusController;
use App\Http\Controllers\admin\KampusController;
use App\Http\Controllers\admin\KontakController;
use App\Http\Controllers\admin\JurusanController;
use App\Http\Controllers\admin\MahasiswaController;
use App\Http\Controllers\admin\MemberController;
use App\Http\Controllers\admin\PelaksanaanController;
use App\Http\Controllers\admin\PembayaranController;
use App\Http\Controllers\pengunjung\PengunjungController;
use Illuminate\Support\Facades\Route;

// pengunjung
Route::get('/', [PengunjungController::class, 'dashboard'])->name('pengunjung.dashboard');
Route::get('kampus/{slug}', [PengunjungController::class, 'detailKampus'])->name('pengunjung.kampus.detail');
Route::get('notifikasi', [PengunjungController::class, 'notifikasi'])->name('pengunjung.notifikasi');
Route::get('fakultas/{slug}', [PengunjungController::class, 'detailFakultas'])->name('pengunjung.fakultas.detail');
// middleware admin
Route::middleware(['auth', 'admin'])->group(function () {
    // dashboard for admin
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    // data kampus for admin
    Route::prefix('admin/kampus')->group(function () {
        Route::get('/', [KampusController::class, 'index'])->name('admin.kampus');
        Route::get('/create', [KampusController::class, 'create'])->name('admin.kampus.create');
        Route::post('/store', [KampusController::class, 'store'])->name('admin.kampus.store');
        Route::get('/{slug}/edit', [KampusController::class, 'edit'])->name('admin.kampus.edit');
        Route::put('/{slug}/update', [KampusController::class, 'update'])->name('admin.kampus.update');
        Route::delete('/{slug}/delete', [KampusController::class, 'delete'])->name('admin.kampus.delete');
        Route::get('history', [KampusController::class, 'history'])->name('admin.kampus.history');
        Route::post('/{slug}/restore', [KampusController::class, 'restore'])->name('admin.kampus.restore');
        Route::delete('/{slug}/force-delete', [KampusController::class, 'forceDelete'])->name('admin.kampus.delete.permanen');
    });

    // data gambar kampus for admin
    Route::prefix('admin/gambar')->group(function () {
        Route::get('/{kampus}', [GambarKampusController::class, 'navItem'])->name('admin.gambar');
        Route::post('/kampus/{slug}/tambah', [GambarKampusController::class, 'store'])->name('admin.tambah.gambar.kampus');
        Route::put('/{id}/delete', [GambarKampusController::class, 'update'])->name('admin.update.gambar.kampus');
        Route::delete('/{id}/delete', [GambarKampusController::class, 'delete'])->name('admin.delete.gambar.kampus');
        Route::get('/kampus/{slug}/history', [GambarKampusController::class, 'history'])->name('admin.history.gambar.kampus');
        Route::post('/restore/{id}', [GambarKampusController::class, 'restore'])->name('admin.restore.gambar.kampus');
        Route::delete('/{id}/delete-permanen', [GambarKampusController::class, 'forceDelete'])->name('admin.delete.permanen.gambar.kampus');
        Route::put('/{kampus}/thumbnail', [GambarKampusController::class, 'thumbnail'])->name('admin.gambar.thumbnail');
    });

    // Data kontak for admin
    Route::prefix('admin/kontak')->group(function () {
        Route::get('/{slug}', [KontakController::class, 'navItem'])->name('admin.kontak');
        Route::post('/{slug}/tambah', [KontakController::class, 'store'])->name('admin.kampus.tambah.kontak');
        Route::put('/{slug}/edit', [KontakController::class, 'update'])->name('admin.kampus.edit.kontak');
    });

    // data fakultas kampus for admin
    Route::prefix('admin/fakultas')->group(function () {
        Route::get('/{slug}', [FakultasController::class, 'navItem'])->name('admin.fakultas');
        Route::get('/{slug}/tambah', [FakultasController::class, 'create'])->name('admin.fakultas.create');
        Route::post('/{slug}/store', [FakultasController::class, 'store'])->name('admin.fakultas.store');
        Route::get('/{slug}/edit', [FakultasController::class, 'edit'])->name('admin.fakultas.edit');
        Route::put('/{slug}/update', [FakultasController::class, 'update'])->name('admin.fakultas.update');
        Route::delete('/{slug}/delete', [FakultasController::class, 'delete'])->name('admin.fakultas.delete');
        Route::get('{slug}/history', [FakultasController::class, 'history'])->name('admin.fakultas.history');
        Route::post('/{slug}/restore', [FakultasController::class, 'restore'])->name('admin.fakultas.restore');
        Route::delete('/{slug}/force-delete', [FakultasController::class, 'forceDelete'])->name('admin.fakultas.delete.permanen');
    });

    // data jurusan for admin
    Route::prefix('admin/jurusan')->group(function () {
        Route::get('/{slug}', [JurusanController::class, 'navItem'])->name('admin.jurusan');
        Route::get('/{slug}/tambah', [JurusanController::class, 'create'])->name('admin.jurusan.create');
        Route::post('/{slug}/store', [JurusanController::class, 'store'])->name('admin.jurusan.store');
        Route::get('/{slug}/edit', [JurusanController::class, 'edit'])->name('admin.jurusan.edit');
        Route::put('/{slug}/update', [JurusanController::class, 'update'])->name('admin.jurusan.update');
        Route::delete('/{slug}/delete', [JurusanController::class, 'delete'])->name('admin.jurusan.delete');
        Route::get('/{slug}/history', [JurusanController::class, 'history'])->name('admin.jurusan.history');
        Route::post('/{slug}/restore', [JurusanController::class, 'restore'])->name('admin.jurusan.restore');
        Route::delete('/{slug}/force-delete', [JurusanController::class, 'forceDelete'])->name('admin.jurusan.delete.permanen');
    });

    // pembayaran jurusan for admin
    Route::prefix('admin/pembayaran')->group(function () {
        Route::get('/{slug}/create', [PembayaranController::class, 'create'])->name('admin.jurusan.pembayaran.create');
        Route::post('/{slug}/store', [PembayaranController::class, 'store'])->name('admin.jurusan.pembayaran.store');
        Route::put('/{id}/update', [PembayaranController::class, 'update'])->name('admin.jurusan.pembayaran.update');
        Route::delete('/{id}/delete', [PembayaranController::class, 'delete'])->name('admin.jurusan.pembayaran.delete');
    });

    // pelaksanaan jurusan for admin
    Route::prefix('admin/pelaksanaan')->group(function () {
        Route::get('/{slug}/create', [PelaksanaanController::class, 'create'])->name('admin.jurusan.pelaksanaan.create');
        Route::post('/{slug}/store', [PelaksanaanController::class, 'store'])->name('admin.jurusan.pelaksanaan.store');
        Route::put('/{id}/update', [PelaksanaanController::class, 'update'])->name('admin.jurusan.pelaksanaan.update');
        Route::delete('/{id}/delete', [PelaksanaanController::class, 'delete'])->name('admin.jurusan.pelaksanaan.delete');
    });

    // data member for admin
    Route::prefix('admin/member')->group(function () {
        Route::get('/data', [MemberController::class, 'index'])->name('admin.member');
        Route::put('/{id}/aktif', [MemberController::class, 'aktif'])->name('admin.member.aktif');
        Route::put('/{id}/nonaktif', [MemberController::class, 'nonaktif'])->name('admin.member.nonaktif');
    });

    // data pendaftaran for admin
    Route::prefix('admin/pendaftaran')->group(function () {
        Route::get('data', [MahasiswaController::class, 'index'])->name('admin.pendaftaran');
        Route::put('/{id}/terima', [MahasiswaController::class, 'terima'])->name('admin.mahasiswa.terima');
        Route::put('/{id}/tolak', [MahasiswaController::class, 'tolak'])->name('admin.mahasiswa.tolak');
    });
});

// middleware member
Route::middleware('auth')->group(function () {
    // pendaftaran mahasiswa
    Route::post('pendaftaran/mahasiswa', [PengunjungController::class, 'pendaftaran'])->name('pendaftaran.store');
});



require __DIR__ . '/auth.php';
