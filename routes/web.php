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

Route::post('/register', [AuthController::class, 'store']);
Route::get('/register', [AuthController::class, 'create'])->name('register'); //fungsi name untuk penamaan route, jika url berubah tidak perlu mengubah route yg sdh diteteapkan
Route::post('/login', [AuthController::class, 'storeLogin']);
Route::get('/login', [AuthController::class, 'createLogin'])->name('login');
// dashboard guru
Route::get('/guru/dashboard', [GuruController::class, 'index'])->name('guru.dashboard');
//guru lihat kelas
Route::get('/guru/kelas/{id}', [GuruController::class, 'lihatKelas'])->name('guru.kelas.lihat');
// guru niali sudah
Route::get('/guru/sudah-dinilai', [GuruController::class, 'sudahDinilai'])->name('guru.sudah');
// guru nilai belum
Route::get('/guru/belum-dinilai', [GuruController::class, 'belumDinilai'])->name('guru.belum');
// dashboard admin
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/guru', [AdminController::class, 'guru'])->name('admin.guru');
Route::get('/admin/kelas', [AdminController::class, 'kelas'])->name('admin.kelas');
Route::get('/admin/mapel', [AdminController::class, 'mapel'])->name('admin.mapel');
// admin create guru
Route::get('/admin/guru/create', [AdminController::class, 'createGuru'])->name('guru.create');
Route::post('/admin/guru/store', [AdminController::class, 'storeGuru'])->name('guru.store');
// admin create kelas
Route::get('/admin/kelas/create', [AdminController::class, 'createKelas'])->name('kelas.create');
Route::post('/admin/kelas/store', [AdminController::class, 'storeKelas'])->name('kelas.store');
// admin create mapel
Route::get('/admin/mapel/create', [AdminController::class, 'createMapel'])->name('mapel.create');
Route::post('/admin/mapel/store', [AdminController::class, 'storeMapel'])->name('mapel.store');
//admin create siswa
Route::get('/admin/siswa', [AdminController::class, 'createSiswa'])->name('siswa.create');
Route::post('/admin/siswa/store', [AdminController::class, 'storeSiswa'])->name('siswa.store');
// input nilai
Route::get('/guru/nilai/{id_siswa}', [GuruController::class, 'inputNilai'])->name('guru.nilai.get');
Route::post('/guru/nilai', [GuruController::class, 'storeNilai'])->name('guru.nilai');
// logout
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
//profile
Route::get('/guru/profile', [GuruController::class, 'profile'])->name('guru.profile');
Route::post('/guru/profile', [GuruController::class, 'storeProfile']);