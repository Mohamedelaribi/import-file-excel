<?php

use App\Http\Controllers\ClientImportController;
use App\Http\Controllers\ImportAppareilCombination;
use App\Http\Controllers\ImportAppareilsController;
use App\Http\Controllers\ImportVehiculesController;
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
Route::get('/import-client', function () {
    return view('import');
})->name('import');

Route::post('/import-clients', [ClientImportController::class, 'importClient'])->name('importClient');
Route::post('/import/vehicules', [ImportVehiculesController::class, 'import'])->name('import-Vehicules');
Route::post('/import/appareils', [ImportAppareilsController::class, 'import'])->name('import-appareils');
Route::post('/import/appareils-combination', [ImportAppareilCombination::class, 'import'])->name('import-appareils-combination');
