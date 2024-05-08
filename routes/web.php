<?php

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
Route::get('/berita', function () {
    return view('berita.berita');
});
Route::get('/pengumuman', function () {
    return view('pengumuman.pengumuman');
});

Route::get('/create-berita', function () {
    return view('berita.create-berita');
});

