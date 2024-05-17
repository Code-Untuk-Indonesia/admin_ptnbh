<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PengumumanController;
use App\Models\Pengumuman;
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

Route::resource('agenda', AgendaController::class);
Route::resource('album', AlbumController::class);
Route::resource('berita', BeritaController::class);
Route::resource('galeri', GaleriController::class);
Route::resource('pengumuman', PengumumanController::class);

Route::get('/api-berita', [BeritaController::class, 'apiberita']);

