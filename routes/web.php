<?php

use App\Http\Controllers\Admin\AdminPegawaiController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\PewawancaraController;
use App\Http\Controllers\Admin\PelamarController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\KaryawanController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\CutiController;
use App\Http\Controllers\Admin\PsikologiController;
use App\Http\Controllers\Admin\WawancaraController;
use App\Http\Controllers\PegawaiController;
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

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/pegawai', [AdminPegawaiController::class, 'index'])->name('pegawai.index');

    Route::get('/pelamar', [PelamarController::class, 'index'])->name('pelamar.index');
    Route::get('/pelamar/create', [PelamarController::class, 'create'])->name('pelamar.create');
    Route::post('/pelamar/store', [PelamarController::class, 'store'])->name('pelamar.store');
    Route::get('/pelamar/edit/{id}', [PelamarController::class, 'edit'])->name('pelamar.edit');
    Route::put('/pelamar/{id}', [PelamarController::class, 'update'])->name('pelamar.update');
    Route::get('/pelamar/search', [PelamarController::class, 'search'])->name('pelamar.search');
    Route::get('/pelamar/validasi', [PelamarController::class, 'validasi'])->name('pelamar.validasi');
    Route::post('/pelamar/konfirmasi/{id}', [PelamarController::class, 'konfirmasi'])->name('pelamar.konfirmasi');
    Route::delete('/pelamar/{id}', [PelamarController::class, 'destroy'])->name('pelamar.destroy');

    Route::get('/wawancara', [WawancaraController::class, 'index'])->name('wawancara.index');
    Route::get('/wawancara/create', [WawancaraController::class, 'create'])->name('wawancara.create');
    Route::post('/wawancara', [WawancaraController::class, 'store'])->name('wawancara.store');
    Route::get('/wawancara/{id}', [WawancaraController::class, 'show'])->name('wawancara.show');
    Route::get('/wawancara/edit/{id}', [WawancaraController::class, 'edit'])->name('wawancara.edit');
    Route::put('/wawancara/{id}', [WawancaraController::class, 'update'])->name('wawancara.update');
    Route::delete('/wawancara/{id}', [WawancaraController::class, 'destroy'])->name('wawancara.destroy');

    Route::get('/psikologi', [PsikologiController::class, 'index'])->name('psikologi.index');
    Route::get('/psikologi/create', [PsikologiController::class, 'create'])->name('psikologi.create');
    Route::post('/psikologi', [PsikologiController::class, 'store'])->name('psikologi.store');
    Route::get('/psikologi/{id}', [PsikologiController::class, 'show'])->name('psikologi.show');
    Route::get('/psikologi/edit/{id}', [PsikologiController::class, 'edit'])->name('psikologi.edit');
    Route::put('/psikologi/{id}', [PsikologiController::class, 'update'])->name('psikologi.update');
    Route::delete('/psikologi/{id}', [PsikologiController::class, 'destroy'])->name('psikologi.destroy');

    Route::get('/pewawancara', [PewawancaraController::class,'index'])->name('pewawancara.index');
    Route::get('/pewawancara/create', [PewawancaraController::class, 'create'])->name('pewawancara.create');
    Route::post('/pewawancara', [PewawancaraController::class, 'store'])->name('pewawancara.store');

    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
    Route::get('/dosen/search', [DosenController::class, 'search'])->name('dosen.search');
    Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');
    Route::post('/dosen', [DosenController::class, 'store'])->name('dosen.store');
    Route::get('/dosen/edit/{dosen}', [DosenController::class, 'edit'])->name('dosen.edit');
    Route::put('/dosen/{dosen}', [DosenController::class, 'update'])->name('dosen.update');

    Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
    Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
    Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
    Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'edit'])->name('karyawan.edit');
    Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');

    Route::get('/pegawai', [AdminPegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/pegawai/search', [AdminPegawaiController::class, 'search'])->name('pegawai.search');

    Route::get('/admin/cuti', [CutiController::class, 'adminIndex'])->name('cuti.admin');
    Route::post('/admin/cuti/{id}/validate', [CutiController::class, 'validateCuti'])->name('cuti.validate');
});



Route::middleware(['auth', 'role:dosen|karyawan'])->group(function () {
    Route::get('/home', [PegawaiController::class, 'index'])->name('pegawai.index');

    Route::get('/cuti', [CutiController::class, 'index'])->name('cuti.index');
    Route::get('/cuti/create', [CutiController::class, 'create'])->name('cuti.create');
    Route::post('/cuti', [CutiController::class, 'store'])->name('cuti.store');
});

Route::get('/get-prodi/{fakultas_id}', [DosenController::class, 'getProdi']);
Route::get('/get-golongan/{jabatan_akademik_id}', [DosenController::class, 'getGolongan']);

require __DIR__.'/auth.php';
