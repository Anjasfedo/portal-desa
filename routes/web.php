<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\DataDesaController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\PetaDesaController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\AdminPetaController;
use App\Http\Controllers\AdminUmkmController;
use App\Http\Controllers\AdminAgamaController;
use App\Http\Controllers\AdminBeritaController;
use App\Http\Controllers\AdminKontakController;
use App\Http\Controllers\AdminProfilController;
use App\Http\Controllers\AdminSliderController;
use App\Http\Controllers\AdminCommentController;
use App\Http\Controllers\AdminGalleryController;
use App\Http\Controllers\AdminLayananController;
use App\Http\Controllers\AdminSejarahController;
use App\Http\Controllers\AdminWilayahController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AdminAnggaranController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AdminVisiMisiController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\AdminPekerjaanController;
use App\Http\Controllers\AdminAnnouncementController;
use App\Http\Controllers\AdminJenisKelaminController;
use App\Http\Controllers\AdminVideoProfileController;
use App\Http\Controllers\AdminPerangkatDesaController;
use App\Http\Controllers\AdminIdentitasSitusController;

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

Route::get('/', [BerandaController::class, 'index']);

Route::get('/berita/{beritas:slug}', [BeritaController::class, 'berita']);
Route::get('/berita', [BeritaController::class, 'index']);

Route::post('/berita/{slug}', [CommentController::class, 'comment']);
Route::post('/berita/{slug}/reply', [CommentController::class, 'commentReply']);

Route::get('/kategori/{kategori:slug}', [kategoriController::class, 'index']);

Route::get('/wilayah', [WilayahController::class, 'index']);

Route::get('/sejarah', [SejarahController::class, 'index']);

Route::get('/visi-misi', [VisiMisiController::class, 'index']);

Route::get('/perangkat-desa', [PerangkatDesaController::class, 'index']);

Route::get('/data-desa', [DataDesaController::class, 'index']);

Route::get('/peta-desa', [PetaDesaController::class, 'index']);

Route::get('/umkm', [UmkmController::class, 'index']);
Route::get('/umkm/{umkm:slug}', [UmkmController::class, 'detail']);

Route::get('/kontak', [KontakController::class, 'index']);

Route::get('/layanan', [LayananController::class, 'index']);

Route::get('/gallery', [GalleryController::class, 'index']);

Route::get('/pengumuman', [AnnouncementController::class, 'index']);
Route::get('/pengumuman/{pengumuman:slug}', [AnnouncementController::class, 'detail']);

Route::get('/apbdesa', [AnggaranController::class, 'index']);
Route::get('/apbdesa/{anggaran:slug}', [AnggaranController::class, 'detail']);

//Admin Dashboard 
Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

Route::resource('/admin/slider', AdminSliderController::class);

Route::get('/admin/berita/slug', [AdminBeritaController::class, 'slug']);
Route::resource('/admin/berita', AdminBeritaController::class);

Route::get('/admin/komentar', [AdminCommentController::class, 'index']);
Route::delete('/admin/komentar/{id}', [AdminCommentController::class, 'destroy']);

Route::get('/admin/kategori/slug', [AdminKategoriController::class, 'slug']);
route::resource('/admin/kategori', AdminKategoriController::class);

Route::get('admin/wilayah', [AdminWilayahController::class, 'index']);
Route::get('admin/wilayah/{id}/edit', [AdminWilayahController::class, 'edit']);
Route::put('admin/wilayah/{id}', [AdminWilayahController::class, 'update']);

Route::get('admin/sejarah', [AdminSejarahController::class, 'index']);
Route::get('admin/sejarah/{id}/edit', [AdminSejarahController::class, 'edit']);
Route::put('admin/sejarah/{id}', [AdminSejarahController::class, 'update']);

Route::get('admin/visi-misi', [AdminVisiMisiController::class, 'index']);
Route::get('admin/visi-misi/{id}/edit', [AdminVisiMisiController::class, 'edit']);
Route::put('admin/visi-misi/{id}', [AdminVisiMisiController::class, 'update']);

Route::resource('admin/perangkat-desa', AdminPerangkatDesaController::class);

Route::get('/admin/peta-desa', [AdminPetaController::class, 'index']);
Route::put('/admin/peta-desa/{id}', [AdminPetaController::class, 'update']);

Route::resource('admin/agama', AdminAgamaController::class);

Route::resource('admin/jenis-kelamin', AdminJenisKelaminController::class);

Route::resource('admin/pekerjaan', AdminPekerjaanController::class);

Route::get('/admin/umkm/slug', [AdminUmkmController::class, 'slug']);
Route::resource('admin/umkm', AdminUmkmController::class);

Route::get('/admin/kontak', [AdminKontakController::class, 'index']);
Route::put('/admin/kontak/{id}', [AdminKontakController::class, 'update']);

Route::get('/admin/video-profile', [AdminVideoProfileController::class, 'index']);
Route::put('/admin/video-profile/{id}', [AdminVideoProfileController::class, 'update']);

Route::get('/admin/identitas-situs/', [AdminIdentitasSitusController::class, 'index']);
Route::put('/admin/identitas-situs/{id}', [AdminIdentitasSitusController::class, 'update']);

Route::get('/admin/profil/', [AdminProfilController::class, 'index']);
Route::put('/admin/profil/{id}', [AdminProfilController::class, 'update']);
Route::put('/admin/profil/', [AdminProfilController::class, 'changePassword']);

Route::resource('/admin/layanan', AdminLayananController::class);

Route::resource('/admin/gallery', AdminGalleryController::class);

Route::get('/admin/pengumuman/slug', [AdminAnnouncementController::class, 'slug']);
Route::resource('/admin/pengumuman', AdminAnnouncementController::class);

Route::get('/admin/apbdes', [AdminAnggaranController::class, 'slug']);
Route::resource('/admin/apbdes', AdminAnggaranController::class);
