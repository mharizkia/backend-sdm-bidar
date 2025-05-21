<?php

use App\Http\Controllers\Admin\PewawancaraController;
use App\Http\Controllers\Admin\PelamarController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PsikologiController;
use App\Http\Controllers\Admin\WawancaraController;
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
    Route::get('/pelamar', [PelamarController::class, 'index'])->name('pelamar.index');
    Route::get('/pelamar/create', [PelamarController::class, 'create'])->name('pelamar.create');
    Route::post('/pelamar/store', [PelamarController::class, 'store'])->name('pelamar.store');
    Route::post('/pelamar/konfirmasi/{id}', [PelamarController::class, 'konfirmasi'])->name('pelamar.konfirmasi');

    Route::get('/wawancara', [WawancaraController::class, 'index'])->name('wawancara.index');
    Route::get('/wawancara/create', [WawancaraController::class, 'create'])->name('wawancara.create');
    Route::post('/wawancara', [WawancaraController::class, 'store'])->name('wawancara.store');
    Route::get('/wawancara/edit/{id}', [WawancaraController::class, 'edit'])->name('wawancara.edit');
    Route::put('/wawancara/{id}', [WawancaraController::class, 'update'])->name('wawancara.update');

    Route::get('/psikologi', [PsikologiController::class, 'index'])->name('psikologi.index');
    Route::get('/psikologi/create', [PsikologiController::class, 'create'])->name('psikologi.create');
    Route::post('/psikologi', [PsikologiController::class, 'store'])->name('psikologi.store');
    Route::get('/psikologi/edit/{id}', [PsikologiController::class, 'edit'])->name('psikologi.edit');
    Route::put('/psikologi/{id}', [PsikologiController::class, 'update'])->name('psikologi.update');

    Route::get('/pewawancara', [PewawancaraController::class,'index'])->name('pewawancara.index');
    Route::get('/pewawancara/create', [PewawancaraController::class, 'create'])->name('pewawancara.create');
    Route::post('/pewawancara', [PewawancaraController::class, 'store'])->name('pewawancara.store');

    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
    Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');
    Route::post('/dosen', [DosenController::class, 'store'])->name('dosen.store');
    Route::get('/dosen/edit/{id}', [DosenController::class, 'edit'])->name('dosen.edit');
    Route::put('/dosen/{id}', [DosenController::class, 'update'])->name('dosen.update');
});

Route::get('/get-prodi/{fakultas_id}', [DosenController::class, 'getProdi']);
Route::get('/get-golongan/{jabatan_akademik_id}', [DosenController::class, 'getGolongan']);

require __DIR__.'/auth.php';
