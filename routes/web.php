<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PetaController;
use App\Http\Controllers\PemetaanController;
use App\Http\Controllers\PemilikController;



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

// Start Halaman Utama

Route::get('/', [HomeController::class, 'index']);
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/berita', [DetailController::class, 'index']);
Route::get('/berita/{id}', [DetailController::class, 'show'])->name('detail.berita');

Route::get('/sejarah', function () {
    return view('pages/profil/sejarah', [
        'title' => 'sejarah'
    ]);
});

Route::get('/potensi-wisata', function () {
    return view('pages/potensiWisata', [
        'title' => 'potensi-wisata'
    ]);
});

Route::get('/kontak', function () {
    return view('pages/kontak', [
        'title' => 'kontak'
    ]);
});

// End Halaman Utama

// Start Halaman Profile

Route::get('/visi-misi', function () {
    return view('pages/profil/visiMisi', [
        'title' => 'VisiMisi'
    ]);
});

Route::get('/struktur', function () {
    return view('pages/profil/struktur', [
        'title' => 'struktur'
    ]);
});

Route::get('/demografi', function () {
    return view('pages/profil/demografi', [
        'title' => 'demografi'
    ]);
});

Route::get('/peta', [PetaController::class, 'index']);

Route::get('/daftar-pemilik', [HomeController::class, 'listPemilik'])->name('list.pemilik');

// End Halaman Profile

// Start Halaman Layanan

Route::get('/surat-keterangan-umum', function () {
    return view('pages/layanan/suratKeteranganUmum', [
        'title' => 'surat-keterangan-umum'
    ]);
});

Route::get('/surat-kelahiran', function () {
    return view('pages/layanan/suratKelahiran', [
        'title' => 'surat-kelahiran'
    ]);
});

Route::get('/surat-nikah', function () {
    return view('pages/layanan/suratNikah', [
        'title' => 'surat-nikah'
    ]);
});

Route::get('/surat-ijin-luar-negri', function () {
    return view('pages/layanan/suratIjinLuarNegri', [
        'title' => 'surat-ijin-luar-negri'
    ]);
});

Route::get('/surat-pindah-tempat', function () {
    return view('pages/layanan/suratPindahTempat', [
        'title' => 'surat-pindah-tempat'
    ]);
});

Route::get('/surat-kematian', function () {
    return view('pages/layanan/suratKematian', [
        'title' => 'surat-kematian'
    ]);
});

Route::get('/boro-nikah', function () {
    return view('pages/layanan/boroNikah', [
        'title' => 'boro-nikah'
    ]);
});

Route::get('/ijin-usaha', function () {
    return view('pages/layanan/ijinUsaha', [
        'title' => 'boro-usaha'
    ]);
});

Route::get('/skck', function () {
    return view('pages/layanan/skck', [
        'title' => 'skck'
    ]);
});

Route::get('/bri', function () {
    return view('pages/layanan/bri', [
        'title' => 'bri'
    ]);
});

// End Halaman Layanan

Route::get('/pages/login', [LoginController::class, 'login'])->name('login');
Route::post('/pages/login', [LoginController::class, 'authenticate']);

//ADMINISTRATOR
Route::middleware(['auth'])->group(function () {
    //Route Dashboard
    Route::get('/administrator', [AdminController::class, 'index']);

    //Route Berita
    Route::get('/administrator/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/administrator/tambah', [BeritaController::class, 'create'])->name('berita.tambah');
    Route::post('/administrator/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/administrator/edit/{id}', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/administrator/edit/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/administrator/delete/{id}', [BeritaController::class, 'destroy'])->name('berita.delete');
    //Route Video
    Route::get('/administrator/video', [VideoController::class, 'index'])->name('video.index');
    Route::get('/administrator/tambah-video', [VideoController::class, 'create'])->name('video.tambah');
    Route::post('/administrator/video', [VideoController::class, 'store'])->name('video.store');
    Route::delete('/administrator/delete-video/{id}', [VideoController::class, 'destroy'])->name('video.delete');
    //Route Pemetaan
    Route::get('/administrator/pemetaan', [PemetaanController::class, 'index'])->name('pemetaan.index');
    Route::get('/administrator/tambah-peta', [PemetaanController::class, 'create'])->name('pemetaan.tambah');
    Route::post('/administrator/pemetaan', [PemetaanController::class, 'store'])->name('pemetaan.store');
    Route::get('/administrator/edit-pemetaan/{id}', [PemetaanController::class, 'edit'])->name('pemetaan.edit');
    Route::put('/administrator/edit-pemetaan/{id}', [PemetaanController::class, 'update'])->name('pemetaan.update');
    Route::delete('/administrator/delete-pemetaan/{id}', [PemetaanController::class, 'destroy'])->name('pemetaan.delete');
    //Route Pemilik
    Route::get('/administrator/pemilik', [PemilikController::class, 'index'])->name('pemilik.index');
    Route::get('/administrator/tambah-pemilik', [PemilikController::class, 'create'])->name('pemilik.tambah');
    Route::post('/administrator/pemilik', [PemilikController::class, 'store'])->name('pemilik.store');
    Route::get('/administrator/edit-pemilik/{id}', [PemilikController::class, 'edit'])->name('pemilik.edit');
    Route::put('/administrator/edit-pemilik/{id}', [PemilikController::class, 'update'])->name('pemilik.update');
    Route::delete('/administrator/delete-pemilik/{id}', [PemilikController::class, 'destroy'])->name('pemilik.delete');
    //Route Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
