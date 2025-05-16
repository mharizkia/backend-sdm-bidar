<?php

use App\Http\Controllers\PewawancaraController;
use App\Http\Controllers\ProfileController;
use App\Models\Pewawancara;
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

Route::get('/pelamar', function () {
    return view('pelamar');
});

Route::get('/wawancara', function () {
    return view('pelamars.wawancaraindex');
});
Route::get('/wawancara/input', function () {
    return view('pelamars.wawancara');
});

Route::get('/psikologi', function () {
    return view('pelamars.psikologiindex');
});

Route::get('/psikologi/input', function () {
    return view('pelamars.psikologi');
});

Route::get('/pewawancara', [PewawancaraController::class,'index'])->name('pewawancara.index');
Route::get('/pewawancara/create', [PewawancaraController::class, 'create'])->name('pewawancara.create');
Route::post('/pewawancara', [PewawancaraController::class, 'store'])->name('pewawancara.store');


require __DIR__.'/auth.php';
