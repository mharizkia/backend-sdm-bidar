<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\PewawancaraController;
use App\Http\Controllers\Admin\PelamarController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\KaryawanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\SuratTugasController;
use App\Http\Controllers\Admin\PsikologiController;
use App\Http\Controllers\Admin\WawancaraController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\SertifikatController;
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

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/pegawai', [AdminDashboardController::class, 'index'])->name('pegawai.index');

    Route::get('/admin/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/admin/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');

    Route::get('/pelamar', [PelamarController::class, 'index'])->name('pelamar.index');
    Route::get('/pelamar/create', [PelamarController::class, 'create'])->name('pelamar.create');
    Route::post('/pelamar', [PelamarController::class, 'store'])->name('pelamar.store');
    Route::get('/pelamar/edit/{id}', [PelamarController::class, 'edit'])->name('pelamar.edit');
    Route::put('/pelamar/{id}', [PelamarController::class, 'update'])->name('pelamar.update');
    Route::get('/pelamar/search', [PelamarController::class, 'search'])->name('pelamar.search');
    Route::get('/pelamar/validasi', [PelamarController::class, 'validasi'])->name('pelamar.validasi');
    Route::post('/pelamar/konfirmasi/{id}', [PelamarController::class, 'konfirmasi'])->name('pelamar.konfirmasi');
    Route::delete('/pelamar/{id}', [PelamarController::class, 'destroy'])->name('pelamar.destroy');
    Route::get('/pelamar/arsip', [PelamarController::class, 'arsip'])->name('pelamar.arsip');
    Route::post('/pelamar/import', [PelamarController::class, 'import'])->name('pelamar.import');
    Route::get('/pelamar/export', [PelamarController::class, 'export'])->name('pelamar.export');
    Route::get('/pelamar/{id}/export', [PelamarController::class, 'exportIndividu'])->name('pelamar.exportIndividu');

    Route::get('/wawancara', [WawancaraController::class, 'index'])->name('wawancara.index');
    Route::get('/wawancara/create', [WawancaraController::class, 'create'])->name('wawancara.create');
    Route::post('/wawancara', [WawancaraController::class, 'store'])->name('wawancara.store');
    Route::get('/wawancara/export', [WawancaraController::class, 'export'])->name('wawancara.export');
    Route::get('/wawancara/{id}', [WawancaraController::class, 'show'])->name('wawancara.show');
    Route::get('/wawancara/edit/{id}', [WawancaraController::class, 'edit'])->name('wawancara.edit');
    Route::put('/wawancara/{id}', [WawancaraController::class, 'update'])->name('wawancara.update');
    Route::delete('/wawancara/{id}', [WawancaraController::class, 'destroy'])->name('wawancara.destroy');

    Route::get('/psikologi', [PsikologiController::class, 'index'])->name('psikologi.index');
    Route::get('/psikologi/create', [PsikologiController::class, 'create'])->name('psikologi.create');
    Route::post('/psikologi', [PsikologiController::class, 'store'])->name('psikologi.store');
    Route::get('/psikologi/export', [PsikologiController::class, 'export'])->name('psikologi.export');
    Route::get('/psikologi/{id}', [PsikologiController::class, 'show'])->name('psikologi.show');
    Route::get('/psikologi/edit/{id}', [PsikologiController::class, 'edit'])->name('psikologi.edit');
    Route::put('/psikologi/{id}', [PsikologiController::class, 'update'])->name('psikologi.update');
    Route::delete('/psikologi/{id}', [PsikologiController::class, 'destroy'])->name('psikologi.destroy');


    Route::get('/pewawancara', [PewawancaraController::class,'index'])->name('pewawancara.index');
    Route::get('/pewawancara/create', [PewawancaraController::class, 'create'])->name('pewawancara.create');
    Route::post('/pewawancara', [PewawancaraController::class, 'store'])->name('pewawancara.store');
    Route::get('/pewawancara', [PewawancaraController::class, 'index'])->name('pewawancara.index');
    Route::get('/pewawancara/{id}/edit', [PewawancaraController::class, 'edit'])->name('pewawancara.edit');
    Route::put('/pewawancara/{id}', [PewawancaraController::class, 'update'])->name('pewawancara.update');
    Route::delete('/pewawancara/{id}', [PewawancaraController::class, 'destroy'])->name('pewawancara.destroy');

    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
    Route::get('/dosen/search', [DosenController::class, 'search'])->name('dosen.search');
    Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');
    Route::post('/dosen', [DosenController::class, 'store'])->name('dosen.store');
    Route::get('/dosen/edit/{dosen}', [DosenController::class, 'edit'])->name('dosen.edit');
    Route::put('/dosen/{dosen}', [DosenController::class, 'update'])->name('dosen.update');
    Route::get('/dosen/{id}', [DosenController::class, 'show'])->name('dosen.show');
    Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');

    Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
    Route::get('/karyawan/search', [KaryawanController::class, 'search'])->name('karyawan.search');
    Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
    Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
    Route::get('/karyawan/{id}', [KaryawanController::class, 'show'])->name('karyawan.show');
    Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'edit'])->name('karyawan.edit');
    Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
    Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');

    Route::get('/pegawai', [AdminDashboardController::class, 'pegawaiIndex'])->name('pegawai.index');
    Route::get('/pegawai/search', [AdminDashboardController::class, 'search'])->name('pegawai.search');

    Route::get('/admin/cuti', [CutiController::class, 'adminIndex'])->name('cuti.admin');
    Route::post('/admin/cuti/{id}/validate', [CutiController::class, 'validateCuti'])->name('cuti.validate');

    Route::get('/telepon', [AdminDashboardController::class, 'teleponIndex'])->name('admin.telepon');

    Route::get('/mutasi', [AdminDashboardController::class, 'mutasi'])->name('admin.mutasi');
    Route::post('/mutasi/store', [AdminDashboardController::class, 'mutasiStore'])->name('mutasi.store');

    Route::get('/surat-tugas', [SuratTugasController::class, 'index'])->name('surat-tugas.index');
    Route::get('/surat-tugas/create', [SuratTugasController::class, 'create'])->name('surat-tugas.create');
    Route::get('/surat-tugas/{id}', [SuratTugasController::class, 'show'])->name('surat-tugas.show');
    Route::post('/surat-tugas', [SuratTugasController::class, 'store'])->name('surat-tugas.store');
    Route::get('/surat-tugas/edit/{id}', [SuratTugasController::class, 'edit'])->name('surat-tugas.edit');
    Route::put('/surat-tugas/{id}', [SuratTugasController::class, 'update'])->name('surat-tugas.update');
    Route::delete('/surat-tugas/{id}', [SuratTugasController::class, 'destroy'])->name('surat-tugas.destroy');

    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

    Route::get('/admin/sertifikat', [SertifikatController::class, 'adminIndex'])->name('admin.sertifikat.index');
    Route::patch('/admin/sertifikat/{id}/validate', [SertifikatController::class, 'validateSertifikat'])->name('admin.sertifikat.validate');
});



Route::middleware(['auth', 'role:dosen|karyawan'])->group(function () {
    
    Route::get('/home', [DashboardController::class, 'index'])->name('pegawai.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/cuti', [CutiController::class, 'index'])->name('cuti.index');
    Route::get('/cuti/create', [CutiController::class, 'create'])->name('cuti.create');
    Route::post('/cuti', [CutiController::class, 'store'])->name('cuti.store');

    Route::get('/sertifikat', [SertifikatController::class, 'index'])->name('sertifikat.index');
    Route::get('/sertifikat/create', [SertifikatController::class, 'create'])->name('sertifikat.create');
    Route::post('/sertifikat', [SertifikatController::class, 'store'])->name('sertifikat.store');
});

Route::get('/get-prodi/{fakultas_id}', [DosenController::class, 'getProdi']);
Route::get('/get-golongan/{jabatan_akademik_id}', [DosenController::class, 'getGolongan']);

require __DIR__.'/auth.php';
