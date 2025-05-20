<?php

use App\Http\Controllers\PewawancaraController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\ProfileController;
use App\Models\Pewawancara;
use App\Http\Controllers\PsikologiController;
use App\Http\Controllers\WawancaraController;
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

Route::get('/pelamar/create', [PelamarController::class, 'create'])->name('pelamar.create');
Route::get('/pelamar', [PelamarController::class, 'index'])->name('pelamar.index');

Route::get('/wawancara', [WawancaraController::class, 'index'])->name('wawancara.index');
Route::get('/wawancara/create', [WawancaraController::class, 'create'])->name('wawancara.create');
Route::get('/wawancara/edit/{id}', [WawancaraController::class, 'edit'])->name('wawancara.edit');
Route::put('/wawancara/{id}', [WawancaraController::class, 'update'])->name('wawancara.update');

Route::get('/psikologi', [PsikologiController::class, 'index'])->name('psikologi.index');
Route::get('/psikologi/create', [PsikologiController::class, 'create'])->name('psikologi.create');
Route::get('/psikologi/edit/{id}', [PsikologiController::class, 'edit'])->name('psikologi.edit');
Route::put('/psikologi/{id}', [PsikologiController::class, 'update'])->name('psikologi.update');

Route::get('/pewawancara', [PewawancaraController::class,'index'])->name('pewawancara.index');
Route::get('/pewawancara/create', [PewawancaraController::class, 'create'])->name('pewawancara.create');
Route::post('/pewawancara', [PewawancaraController::class, 'store'])->name('pewawancara.store');

Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');

require __DIR__.'/auth.php';
