<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
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
Route::middleware('web')->group(function(){
Route::get('/login', [LoginController::class, 'login'])->name('login'); // Untuk menampilkan form login
Route::post('/login', [LoginController::class, 'submitLogin']); // Untuk menangani proses login
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard'); // Dashboard setelah login
Route::post('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard'); // Dashboard setelah login

// Login dengan Google
Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');
Route::post('/auth/google', [GoogleAuthController::class, 'loginWithGoogle']);
// Menu Pengaduan
Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index'); // Menampilkan daftar pengaduan
Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('pengaduan.create'); // Form tambah pengaduan
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store'); // Menyimpan pengaduan
Route::get('/pengaduan/{id}', [PengaduanController::class, 'show'])->name('pengaduan.show'); // Menampilkan detail pengaduan
Route::get('/pengaduan/{id}/edit', [PengaduanController::class, 'edit'])->name('pengaduan.edit'); // Form edit pengaduan
Route::put('/pengaduan/{id}', [PengaduanController::class, 'update'])->name('pengaduan.update'); // Mengupdate pengaduan
Route::delete('/pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy'); // Menghapus pengaduan
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan');



//History
Route::get('/history', [HistoryController::class, 'index'])->name('history.index'); // Menampilkan daftar history
Route::get('/history/{id}', [HistoryController::class, 'show'])->name('history.show'); // Menampilkan detail history
Route::delete('/history/{id}', [HistoryController::class, 'destroy'])->name('history.destroy'); // Menghapus history


//Rating
Route::resource('rating', RatingController::class);
//User
Route::get('/user', [UserController::class, 'index'])->name('user.index'); // Menampilkan daftar user
Route::get('/user/create', [UserController::class, 'create'])->name('user.create'); // Form tambah user
Route::post('/user/store', [UserController::class, 'store'])->name('user.store'); // Changed to user.store
Route::get('/user/{id_user}', [UserController::class, 'show'])->name('user.user'); // Menampilkan detail user
Route::get('/user/{id_user}/edit', [UserController::class, 'edit'])->name('user.edit'); // Form edit user
Route::put('/user/{id_user}', [UserController::class, 'update'])->name('user.update'); // Mengupdate user
Route::delete('/user/{id_user}', [UserController::class, 'destroy'])->name('user.destroy'); // Menghapus user
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Logout
});

