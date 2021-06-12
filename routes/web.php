<?php

use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('dokter', [DokterController::class, 'index'])->name('dokter.index');
Route::post('dokter/import', [DokterController::class, 'import'])->name('dokter.import');
Route::get('pasien', [PasienController::class, 'index'])->name('pasien.index');
Route::post('pasien/import', [PasienController::class, 'import'])->name('pasien.import');
