<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\HomepageController;
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



// user page

Route::get('/berita-user', function () {
    return view('halaman-user.berita');
});
Route::get('/home-user', function () {
    return view('halaman-user.home');
});

Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');

