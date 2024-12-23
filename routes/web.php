<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DaftarInformasiPublikController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IkmController;
use App\Http\Controllers\InformasiBerkalaController;
use App\Http\Controllers\InformasiDikecualikanController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\OrmasController;
use App\Http\Controllers\LkipController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PengajuanKeberatanController;
use App\Http\Controllers\PermohonanInformasiController;
use App\Http\Controllers\RenjaController;
use App\Http\Controllers\RenstraController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\VisiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ParpolController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/tentang', [HomeController::class, 'tentang']);
Route::get('/visi', [VisiController::class, 'visi']);
Route::get('/kontak', [HomeController::class, 'kontak']);
Route::get('/galeri', [HomeController::class, 'galeri'])->name('home.galeri');
Route::get('/pegawai', [HomeController::class, 'pegawai'])->name('home.pegawai');
Route::get('/ormas', [HomeController::class, 'ormas'])->name('home.ormas');
Route::get('/parpol', [HomeController::class, 'parpol'])->name('home.parpol');
Route::get('/ikm', [HomeController::class, 'ikm'])->name('home.ikm');
Route::get('/lkip', [HomeController::class, 'lkip'])->name('home.lkip');
Route::get('/renja', [HomeController::class, 'renja'])->name('home.renja');
Route::get('/renstra', [HomeController::class, 'renstra'])->name('home.renstra');
Route::get('/informasi_berkala', [HomeController::class, 'informasi_berkala'])->name('informasi_berkala');
Route::get('/informasi_dikecualikan', [HomeController::class, 'informasi_dikecualikan'])->name('home.informasi_dikecualikan');
Route::get('/daftar_informasi_publik', [HomeController::class, 'daftar_informasi_publik'])->name('home.daftar_informasi_publik');

Route::get('/berita', [HomeController::class, 'berita'])->name('home.berita');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');

Route::post('/berita/{id}/like', [BeritaController::class, 'like']);
Route::post('/berita/{id}/dislike', [BeritaController::class, 'dislike']);
Route::post('/berita/{id}/comment', [BeritaController::class, 'storeComment']);

Route::get('/permohonan_informasi/create', [PermohonanInformasiController::class, 'create'])->name('permohonan_informasi.create');
Route::post('/permohonan_informasi', [PermohonanInformasiController::class, 'store'])->name('permohonan_informasi.store');
Route::get('/pengajuan_keberatan/create', [PengajuanKeberatanController::class, 'create'])->name('pengajuan_keberatan.create');
Route::post('/pengajuan_keberatan', [PengajuanKeberatanController::class, 'store'])->name('pengajuan_keberatan.store');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticated']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::resource('beritas', BeritaController::class);
    Route::resource('pegawais', PegawaiController::class);
    Route::resource('galeris', GaleriController::class);
    Route::resource('ormass', OrmasController::class);
    Route::resource('parpols', ParpolController::class);
    Route::resource('ikms', IkmController::class);
    Route::resource('lkips', LkipController::class);
    Route::resource('renjas', RenjaController::class);
    Route::resource('renstras', RenstraController::class);
    Route::resource('pengaduan', PengaduanController::class);
    Route::resource('informasi_berkalas', InformasiBerkalaController::class);
    Route::resource('informasi_dikecualikans', InformasiDikecualikanController::class);
    Route::resource('daftar_informasi_publiks', DaftarInformasiPublikController::class);

    Route::delete('beritas/{berita}/comments/{comment}', [BeritaController::class, 'destroyComment'])->name('beritas.destroyComment');

    Route::resource('permohonan_informasi', PermohonanInformasiController::class)->except(['create', 'store']);
    Route::resource('pengajuan_keberatan', PengajuanKeberatanController::class)->except(['create', 'store']);

    Route::post('/ikms/store', [IkmController::class, 'store'])->name('ikms.store');
    Route::post('/ikms/{id}', [IkmController::class, 'update'])->name('ikms.update');
    Route::delete('/ikms/{id}', [IkmController::class, 'destroy'])->name('ikms.destroy');

    Route::get('/tentang', [TentangController::class, 'index'])->name('tentang.index');
    Route::post('/tentang', [TentangController::class, 'update'])->name('tentang.update');
    Route::put('/tentang/{id}', [TentangController::class, 'update'])->name('tentang.update');
    Route::resource('tentang', TentangController::class);
    Route::get('/tentang/edit', [TentangController::class, 'edit'])->name('tentang.edit');

    Route::get('/visi', [VisiController::class, 'index'])->name('visi.index');
    Route::get('/visi/{id}/edit', [VisiController::class, 'edit'])->name('visi.edit');
    Route::put('/visi/{id}', [VisiController::class, 'update'])->name('visi.update');
    Route::resource('visi', VisiController::class);

    Route::get('/struktur', [StrukturController::class, 'index'])->name('struktur.index');
    Route::get('/struktur/{id}/edit', [StrukturController::class, 'edit'])->name('struktur.edit');
    Route::put('/struktur/{id}', [StrukturController::class, 'update'])->name('struktur.update');
    Route::resource('struktur', StrukturController::class);

    Route::get('/tugas', [TugasController::class, 'index'])->name('tugas.index');
    Route::get('/tugas/{id}/edit', [TugasController::class, 'edit'])->name('tugas.edit');
    Route::put('/tugas/{id}', [TugasController::class, 'update'])->name('tugas.update');
    Route::resource('tugas', TugasController::class);

    Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
    Route::post('/kontak', [KontakController::class, 'update'])->name('kontak.update');
    Route::put('/kontak/{id}', [KontakController::class, 'update'])->name('kontak.update');
    Route::resource('kontak', KontakController::class);
});
