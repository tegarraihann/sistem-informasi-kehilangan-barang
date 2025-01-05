<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangTemuanController;
use App\Http\Controllers\HistoriBarangController;
use App\Http\Controllers\ClaimBarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LaporanClaimController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SecurityLapanganController;
use App\Http\Middleware\RoleMiddleware;



// Menampilkan halaman login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/', function () {
//     return redirect()->route('login'); // Pastikan route 'login' sudah terdefinisi
// });

Route::get('/unauthorized', function () {
    return response()->view('errors.unauthorized', [], 403);
})->name('unauthorized');


// Menampilkan halaman login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // Route::get('/buat-laporan', [LaporanController::class, 'index'])->name('buat.laporan');
    // Route::post('/buat-laporan', [LaporanController::class, 'store'])->name('buat.laporan.store');
    Route::get('/laporan-claim', [AdminController::class, 'LaporanClaim'])->name('admin.laporan-claim');
    Route::get('/laporan-claim/{id}/detail', [AdminController::class, 'LaporanClaimDetail'])->name('admin.laporan-claim-detail');
    Route::get('admin/histori-barang', [AdminController::class, 'HistoriBarang'])->name('admin.histori-barang');
    Route::get('admin/histori-barang/{id}/detail', [AdminController::class, 'HistoriBarangDetail'])->name('admin.histori-barang.detail');    Route::post('/laporan-claim/{id}/approve', [AdminController::class, 'approve'])->name('laporan-claim.approve');
    Route::post('/laporan-claim/{id}/destroy', [AdminController::class, 'destroy'])->name('laporan-claim.destroy');
    Route::post('/laporan-claim/{id}/reject', [AdminController::class, 'reject'])->name('laporan-claim.reject');
    Route::post('/laporan-claim/{id}/kirim-pesan', [AdminController::class, 'kirimPesan'])->name('laporan-claim.kirim-pesan');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');

});


// Routes untuk Mahasiswa
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('dashboard', [MahasiswaController::class, 'index'])->name('mahasiswa.dashboard');
    Route::get('barang-temuan', [MahasiswaController::class, 'barangTemuan'])->name('mahasiswa.barang-temuan');
    Route::get('barang-temuan/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.detail-barang');    Route::get('/histori-barang', [MahasiswaController::class, 'HistoriBarang'])->name('mahasiswa.histori-barang');
    Route::get('/histori-barang/data', [MahasiswaController::class, 'HistoriBarang'])->name('mahasiswa.histori-barang');
    Route::get('/barang-temuan/{id}/claim', [MahasiswaController::class, 'create'])->name('mahasiswa.claim-barang');
    Route::post('/barang-temuan/{id}/claim', [MahasiswaController::class, 'store'])->name('mahasiswa.claim.store');
    Route::get('/notifikasi', [MahasiswaController::class, 'notifikasi'])->name('mahasiswa.notifikasi');
    Route::get('/mahasiswa/profile', [MahasiswaController::class, 'profile'])->name('profile');

});

// Route untuk Admin Lapangan
Route::middleware(['auth', 'role:adminlapangan'])->group(function () {
    Route::get('adminlapangan/dashboard', [SecurityLapanganController::class, 'index'])->name('security-lapangan.dashboard');
    Route::get('adminlapangan/buat-laporan', [SecurityLapanganController::class, 'buatLaporan'])->name('security-lapangan.buat-laporan');
    Route::post('adminlapangan/buat-laporan', [SecurityLapanganController::class, 'store'])->name('security-lapangan.buat-laporan-store');
    Route::get('adminlapangan/barang-temuan', [SecurityLapanganController::class, 'barangTemuan'])->name('security-lapangan.barang-temuan');
    Route::get('adminlapangan/barang-temuan/{id}', [SecurityLapanganController::class, 'detailBarang'])->name('security-lapangan.detail-barang');
    Route::get('/adminlapangan/profile', [SecurityLapanganController::class, 'profile'])->name('security.profile');
});


