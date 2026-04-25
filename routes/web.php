<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});

//home
Route::get('/index', [HomeController::class, 'index']);

Route::post('/register', [AuthController::class, 'store']);
Route::get('/register', [AuthController::class, 'create'])->name('register');
Route::post('/login', [AuthController::class, 'storeLogin']);
Route::get('/login', [AuthController::class, 'createLogin'])->name('login');
// dashboard guru
Route::get('/guru/dashboard', [GuruController::class, 'index'])->name('guru.dashboard');
// dashboard admin
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/guru', [AdminController::class, 'guru'])->name('admin.guru');
Route::get('/admin/kelas', [AdminController::class, 'kelas'])->name('admin.kelas');
//create siswa
Route::post('/siswaStore', [AdminController::class, 'storeSiswa'])->name('siswaStore');
Route::get('/siswaCreate', [AdminController::class, 'createSiswa'])->name('siswaCreate');
// input nilai
Route::get('/guru/nilai', [GuruController::class, 'inputNilai']);
Route::post('/guru/nilai', [GuruController::class, 'storeNilai'])->name('guru.nilai');
// logout
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
//profile
Route::get('/guru/profile', [GuruController::class, 'profile'])->name('guru.profile');
Route::post('/guru/profile', [GuruController::class, 'storeProfile']);