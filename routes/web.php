<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\TentangController;
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


Route::get('/create-berita', function () {
    return view('form.create-berita');
});
Route::get('/create-pengumuman', function () {
    return view('form.create-pengumuman');
});
Route::get('/create-agenda', function () {
    return view('form.create-agenda');
});

Route::get('/create-album', function () {
    return view('form.create-album');
});

Route::resource('agenda', AgendaController::class);
Route::resource('album', AlbumController::class);
Route::resource('berita', BeritaController::class);
Route::resource('galeri', GaleriController::class);
Route::resource('pengumuman', PengumumanController::class);

Route::get('/api-berita', [BeritaController::class, 'apiberita']);

// crud page home
Route::get('/home-page',  [HomePageController::class, 'index'])->name('home.index');
Route::get('/home/{id}/edit', [HomePageController::class, 'edit'])->name('home.edit');
Route::put('/home/{id}', [HomePageController::class, 'update'])->name('home.update');
Route::get('/api-home', [HomePageController::class, 'apihome'])->name('home.apihome');
// crud tentang
Route::get('/tentang-page',  [TentangController::class, 'index'])->name('tentang.index');
Route::get('/tentang/{id}/edit', [TentangController::class, 'edit'])->name('tentang.edit');
Route::put('/tentang/{id}', [TentangController::class, 'update'])->name('tentang.update');
Route::get('/api-tentang', [TentangController::class, 'apitentang'])->name('tentang.apitentang');
// crud organisasi
Route::get('/organisasi-page',  [OrganisasiController::class, 'index'])->name('organisasi.index');
Route::get('/organisasi/{id}/edit', [OrganisasiController::class, 'edit'])->name('organisasi.edit');
Route::put('/organisasi/{id}', [OrganisasiController::class, 'update'])->name('organisasi.update');
Route::get('/api-organisasi', [OrganisasiController::class, 'apitentang'])->name('organisasi.apitentang');



// frontend user

Route::get('/berita-user', function () {
    return view('halaman-user.berita');
});
Route::get('/', function () {
    return view('halaman-user.home');
});

Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
