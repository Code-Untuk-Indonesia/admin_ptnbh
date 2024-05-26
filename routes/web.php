<?php

use App\Models\Agenda;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\UnduhController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\PengumumanController;
use Shetabit\Visitor\Middlewares\LogVisits;

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

// auth admin

// Route::get('/auth/login', function () {
//     return view('auth.login');
// });
// Route::get('/auth/register', function () {
//     return view('auth.register');
// });

Route::get('/auth/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/auth/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin/dashboard', function () {
    return view('dashboard-admin.dashboard');
})->middleware('auth');

Route::resource('/admin/video', VideoController::class);

Route::middleware(['auth'])->group(function () {

    // Resource controllers untuk entitas tertentu
    Route::resource('/admin/agenda', AgendaController::class)->middleware('permission:manage agenda');
    Route::resource('/admin/album', AlbumController::class)->middleware('permission:manage album');
    Route::resource('/admin/berita', BeritaController::class)->middleware('permission:manage berita');
    Route::resource('/admin/galeri', GaleriController::class)->middleware('permission:manage galeri');
    Route::resource('/admin/pengumuman', PengumumanController::class)->middleware('permission:manage pengumuman');
    // Route::resource('/admin/video', VideoController::class)->middleware('permission:manage video');
    Route::resource('/admin/unduh', UnduhController::class);


    // Resource controller untuk pengguna hanya dapat diakses oleh pengguna dengan izin 'manage_users'
    Route::resource('/admin/users', UserController::class)->middleware('permission:manage users');
    Route::resource('/admin/roles', RoleController::class)->middleware('permission:manage roles');

    // Rute API
    Route::get('/api-berita', [BeritaController::class, 'apiberita']);

    // Rute CRUD untuk halaman beranda
    Route::get('/admin/home-page', [HomePageController::class, 'index'])->name('home.index');
    Route::get('/admin/home/{id}/edit', [HomePageController::class, 'edit'])->name('home.edit');
    Route::put('/admin/home/{id}', [HomePageController::class, 'update'])->name('home.update');
    Route::get('/admin/api-home', [HomePageController::class, 'apihome'])->name('home.apihome');

    // Rute CRUD untuk halaman tentang
    Route::get('/admin/tentang-page', [TentangController::class, 'index'])->name('tentang.index');
    Route::get('/admin/tentang/{id}/edit', [TentangController::class, 'edit'])->name('tentang.edit');
    Route::put('/admin/tentang/{id}', [TentangController::class, 'update'])->name('tentang.update');
    Route::get('/admin/api-tentang', [TentangController::class, 'apitentang'])->name('tentang.apitentang');

    // Rute CRUD untuk halaman organisasi
    Route::get('/admin/organisasi-page', [OrganisasiController::class, 'index'])->name('organisasi.index');
    Route::get('/admin/organisasi/{id}/edit', [OrganisasiController::class, 'edit'])->name('organisasi.edit');
    Route::put('/admin/organisasi/{id}', [OrganisasiController::class, 'update'])->name('organisasi.update');
    Route::get('/admin/api-organisasi', [OrganisasiController::class, 'apitentang'])->name('organisasi.apitentang');


    // Dashboard admin
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/visi', [DashboardController::class, 'visit'])->middleware(LogVisits::class);


    // footer
    Route::resource('footers', FooterController::class);
    Route::get('/admin/footer-page', [FooterController::class, 'index'])->name('footer.index');
    Route::get('/admin/footer/{id}/edit', [FooterController::class, 'edit'])->name('footer.edit');
});

Route::get('/organisasi', [OrganisasiController::class, 'fe'])->name('organisasi');


// frontend user
Route::get('/berita-ptnbh', [BeritaController::class, 'beritapage'])->name('berita');
Route::get('/tentang-ptnbh', [TentangController::class, 'fesejarah'])->name('tentang');
Route::get('/', [HomepageController::class, 'fehome'])->name('home');
Route::get('/berita/{slug}', [BeritaController::class, 'showathome'])->name('berita.showfe');
Route::get('/beritapage', [BeritaController::class, 'beritapage'])->name('beritapage');


Route::get('/fakultas', function () {
    return view('halaman-user.fakultas');
});

Route::get('/mahasiswa', function () {
    return view('halaman-user.mahasiswa');
});

Route::get('/gallery', function () {
    return view('halaman-user.gallery');
});

Route::get(
    '/agenda-ptnbh',
    [AgendaController::class, 'agendapage']
)->name('agenda');
Route::get('/load-more-agenda', [AgendaController::class, 'loadMoreAgenda'])->name('agenda.loadMoreAgenda');
Route::get('/agenda-ptnbh/{id}', [AgendaController::class, 'show'])->name('agenda.show');

Route::get('/pengumuman-ptnbh', [PengumumanController::class, 'pengumumanpage'])->name('pengumuman');
Route::get('/load-more-pengumuman', [PengumumanController::class, 'loadMore'])->name('pengumuman.loadMore');
Route::get('/pengumuman/{slug}', [PengumumanController::class, 'showhome'])->name('pengumuman.showfe');

Route::get('/unit-bisnis', function () {
    return view('halaman-user.unit-bisnis');
});

Route::get('/detail-berita/{slug}/id', [BeritaController::class, 'showID'])->name('berita.show.id');
Route::get('/detail-berita/{slug}/en', [BeritaController::class, 'showEN'])->name('berita.show.en');
Route::get('/detail-pengumuman/{slug}/id', [PengumumanController::class, 'showID'])->name('pengumuman.showpengumuman.id');
Route::get('/detail-pengumuman/{slug}/en', [PengumumanController::class, 'showEN'])->name('pengumuman.showpengumuman.en');
Route::get('/detail-agenda/{id}/id', [AgendaController::class, 'showID'])->name('agenda.showagenda.id');
Route::get('/detail-agenda/{id}/en', [AgendaController::class, 'showEN'])->name('agenda.showagenda.en');

Route::get('/unduhan', [UnduhController::class, 'unduhan'])->name('unduh.unduhan');
Route::get('/unduhan/load-more', [UnduhController::class, 'loadMoreUnduhan'])->name('unduh.loadMoreUnduhan');

Route::get('/kontak', function () {
    return view('halaman-user.kontak');
});

// ganti bahasa
Route::get('language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
});
