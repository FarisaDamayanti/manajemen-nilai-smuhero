<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
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

// login
Route::get('/login', [AuthController::class, 'createLogin'])->name('login');
Route::post('/login', [AuthController::class, 'storeLogin']);

// Route::get('/register', [AuthController::class, 'create'])->name('register');
// Route::post('/register', [AuthController::class, 'store']);

Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

// create kelas
Route::get('/kelas', [AdminController::class, 'kelas'])->name('admin.kelas');
Route::get('/kelas/create', [AdminController::class, 'createKelas'])->name('kelas.create');
Route::post('/kelas/store', [AdminController::class, 'storeKelas'])->name('kelas.store');
Route::get('/kelas/{id}', [AdminController::class, 'showKelas'])->name('admin.kelas.detail');

// create user & data guru
Route::get('/guru', [AdminController::class, 'guru'])->name('admin.guru');
Route::get('/guru/create', [AdminController::class, 'createGuru'])->name('guru.create');
Route::post('/guru/store', [AdminController::class, 'storeGuru'])->name('guru.store');

// tambah guru ke kelas
Route::post('/assign-guru', [AdminController::class, 'assignGuru'])->name('admin.assign.guru');

// create mapel
Route::get('/mapel', [AdminController::class, 'mapel'])->name('admin.mapel');
Route::get('/mapel/create', [AdminController::class, 'createMapel'])->name('mapel.create');
Route::post('/mapel/store', [AdminController::class, 'storeMapel'])->name('mapel.store');

// create siswa
Route::get('/siswa', [AdminController::class, 'siswa'])->name('admin.siswa');
Route::get('/siswa/create/{id_kelas}', [AdminController::class, 'createSiswa'])->name('siswa.create');
Route::post('/siswa/store', [AdminController::class, 'storeSiswa'])->name('siswa.store');

// capaian pembelajaran
Route::get('/admin/capaian', [AdminController::class, 'capaian'])->name('admin.capaian');
Route::get('/admin/capaian/create', [AdminController::class, 'createCapaian'])->name('admin.capaian.create');
Route::post('/admin/capaian/store', [AdminController::class, 'storeCapaian'])->name('admin.capaian.store');
});

//role guru
Route::middleware(['auth', 'role:guru'])->prefix('guru')->group(function () {

Route::get('/dashboard', [GuruController::class, 'index'])->name('guru.dashboard');

Route::get('/kelas', [GuruController::class, 'kelas'])->name('guru.kelas');
Route::get('/kelas/{id}', [GuruController::class, 'lihatKelas'])->name('guru.kelas.lihat');

Route::get('/nilai/{id_siswa}', [GuruController::class, 'inputNilai'])->name('guru.nilai.get');
Route::post('/nilai', [GuruController::class, 'storeNilai'])->name('guru.nilai');

Route::get('/profile', [GuruController::class, 'profile'])->name('guru.profile');
Route::post('/profile', [GuruController::class, 'storeProfile']);
});