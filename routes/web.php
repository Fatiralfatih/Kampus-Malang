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
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\pengunjung\PengunjungController;
use Illuminate\Support\Facades\Route;

// pengunjung
Route::get('/', [PengunjungController::class, 'dashboard'])->name('pengunjung.dashboard');
Route::get('kampus/detail/{kampus}', [PengunjungController::class, 'detailKampus'])->name('pengunjung.kampus.detail');
Route::get('notifikasi', [PengunjungController::class, 'notifikasi'])->name('pengunjung.notifikasi');
Route::get('fakultas/{fakultas}', [PengunjungController::class, 'detailFakultas'])->name('pengunjung.fakultas.detail');
// middleware admin
Route::middleware(['auth', 'admin'])->group(function () {
    // dashboard for admin
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    // data kampus for admin
    Route::prefix('admin/kampus')->group(function () {
        Route::get('/', [KampusController::class, 'index'])->name('admin.kampus');
        Route::get('show/{kampus}', [KampusController::class, 'show'])->name('admin.kampus.show');
        Route::get('create', [KampusController::class, 'create'])->name('admin.kampus.create');
        Route::post('store', [KampusController::class, 'store'])->name('admin.kampus.store');
        Route::get('edit/{kampus}', [KampusController::class, 'edit'])->name('admin.kampus.edit');
        Route::put('update/{kampus}', [KampusController::class, 'update'])->name('admin.kampus.update');
        Route::delete('delete/{kampus}', [KampusController::class, 'delete'])->name('admin.kampus.delete');
        Route::get('history', [KampusController::class, 'history'])->name('admin.kampus.history');
        Route::post('restore/{id}', [KampusController::class, 'restore'])->name('admin.kampus.restore');
        Route::delete('delete-permanen/{id}', [KampusController::class, 'forceDelete'])->name('admin.kampus.delete.permanen');
    });

    // data gambar kampus for admin
    Route::prefix('admin/gambar')->group(function () {
        Route::get('{kampus}', [GambarKampusController::class, 'navItem'])->name('admin.gambar');
        Route::post('tambah/kampus/{kampus}', [GambarKampusController::class, 'store'])->name('admin.tambah.gambar.kampus');
        Route::put('update/{id}', [GambarKampusController::class, 'update'])->name('admin.update.gambar.kampus');
        Route::delete('delete/{id}', [GambarKampusController::class, 'delete'])->name('admin.delete.gambar.kampus');
        Route::get('history/{kampus}', [GambarKampusController::class, 'history'])->name('admin.history.gambar.kampus');
        Route::post('restore/{id}', [GambarKampusController::class, 'restore'])->name('admin.restore.gambar.kampus');
        Route::delete('delete-permanen/{id}', [GambarKampusController::class, 'forceDelete'])->name('admin.delete.permanen.gambar.kampus');
    });

    // Data kontak for admin
    Route::prefix('admin/kontak')->group(function () {
        Route::get('/{kampus}', [KontakController::class, 'navItem'])->name('admin.kontak');
        Route::post('/tambah/{kampus}', [KontakController::class, 'store'])->name('admin.kampus.tambah.kontak');
        Route::put('/edit/{kampus}', [KontakController::class, 'update'])->name('admin.kampus.edit.kontak');
    });

    // data fakultas kampus for admin
    Route::prefix('admin/fakultas')->group(function () {
        Route::get('/{kampus}', [FakultasController::class, 'navItem'])->name('admin.fakultas');
        Route::get('tambah/{kampus}', [FakultasController::class, 'create'])->name('admin.fakultas.create');
        Route::post('store/{kampus}', [FakultasController::class, 'store'])->name('admin.fakultas.store');
        Route::get('edit/{fakultas}', [FakultasController::class, 'edit'])->name('admin.fakultas.edit');
        Route::put('update/{fakultas}', [FakultasController::class, 'update'])->name('admin.fakultas.update');
        Route::delete('delete/{fakultas}', [FakultasController::class, 'delete'])->name('admin.fakultas.delete');
        Route::get('history/{kampus}', [FakultasController::class, 'history'])->name('admin.fakultas.history');
        Route::post('restore/{slug}', [FakultasController::class, 'restore'])->name('admin.fakultas.restore');
        Route::delete('delete-permanen/{id}', [FakultasController::class, 'forceDelete'])->name('admin.fakultas.delete.permanen');
    });

    // data jurusan for admin
    Route::prefix('admin/jurusan')->group(function () {
        Route::get('/{kampus}', [JurusanController::class, 'navItem'])->name('admin.jurusan');
        Route::get('tambah/{kampus}', [JurusanController::class, 'create'])->name('admin.jurusan.create');
        Route::post('store/{kampus}', [JurusanController::class, 'store'])->name('admin.jurusan.store');
        Route::get('edit/{jurusan}', [JurusanController::class, 'edit'])->name('admin.jurusan.edit');
        Route::put('update/{jurusan}', [JurusanController::class, 'update'])->name('admin.jurusan.update');
        Route::delete('delete/{jurusan}', [JurusanController::class, 'delete'])->name('admin.jurusan.delete');
        Route::get('history/{kampus}', [JurusanController::class, 'history'])->name('admin.jurusan.history');
        Route::post('restore/{id}', [JurusanController::class, 'restore'])->name('admin.jurusan.restore');
        Route::delete('hapus-permanent/{id}', [JurusanController::class, 'forceDelete'])->name('admin.jurusan.delete.permanen');
    });

    // pembayaran jurusan for admin
    Route::prefix('admin/pembayaran')->group(function () {
        Route::get('create/{jurusan}', [PembayaranController::class, 'create'])->name('admin.jurusan.pembayaran.create');
        Route::post('store/{jurusan}', [PembayaranController::class, 'store'])->name('admin.jurusan.pembayaran.store');
        Route::put('update/{id}', [PembayaranController::class, 'update'])->name('admin.jurusan.pembayaran.update');
        Route::delete('delete/{id}', [PembayaranController::class, 'delete'])->name('admin.jurusan.pembayaran.delete');
    });

    // pelaksanaan jurusan for admin
    Route::prefix('admin/pelaksanaan')->group(function () {
        Route::get('create/{jurusan}', [PelaksanaanController::class, 'create'])->name('admin.jurusan.pelaksanaan.create');
        Route::post('store/{jurusan}', [PelaksanaanController::class, 'store'])->name('admin.jurusan.pelaksanaan.store');
        Route::put('update/{id}', [PelaksanaanController::class, 'update'])->name('admin.jurusan.pelaksanaan.update');
        Route::delete('delete/{id}', [PelaksanaanController::class, 'delete'])->name('admin.jurusan.pelaksanaan.delete');
    });

    // data member for admin
    Route::prefix('admin/member')->group(function () {
        Route::get('data', [MemberController::class, 'index'])->name('admin.member');
        Route::put('aktif/{id}', [MemberController::class, 'aktif'])->name('admin.member.aktif');
        Route::put('nonaktif/{id}', [MemberController::class, 'nonaktif'])->name('admin.member.nonaktif');
    });

    // data mahasiswa for admin
    Route::prefix('admin/mahasiswa')->group(function () {
        Route::get('data', [MahasiswaController::class, 'index'])->name('admin.mahasiswa');
        Route::put('terima/{id}', [MahasiswaController::class, 'terima'])->name('admin.mahasiswa.terima');
        Route::put('tolak/{id}', [MahasiswaController::class, 'tolak'])->name('admin.mahasiswa.tolak');
    });
});

// middleware member
Route::middleware('auth')->group(function () {
    // pendaftaran mahasiswa
    Route::prefix('pendaftaran')->group(function () {
        Route::get('{kampus}', [PendaftaranController::class, 'daftar'])->name('pendaftaran');
        Route::post('store/{kampus}', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
    });
});



require __DIR__ . '/auth.php';
