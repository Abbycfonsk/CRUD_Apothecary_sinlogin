<?php

use App\Http\Controllers\PlantasController;
use App\Http\Controllers\VistasController;
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

Route::get('/', [VistasController::class, 'inicio'])->name('inicio');
Route::get('/apothecary/alta', [VistasController::class, 'alta'])->name('vista.alta');
Route::get('/apothecary', [VistasController::class, 'plantas'])->name('vista.plantas');
Route::get('/apotehcary/{id}', [VistasController::class, 'planta'])->name('vista.planta');
Route::get('/apothecary/mantenimiento/{planta}', [VistasController::class, 'mantenimiento'])->name('vista.mantenimiento');
Route::post('/apothecary',[PlantasController::class, 'alta'])->name('planta.alta');
Route::put('/apothecary/mantenimiento/{planta}',[PlantasController::class, 'modificacion'])->name('planta.mantenimiento');
Route::delete('/apothecary/mantenimiento/{planta}',[PlantasController::class, 'baja'])->name('planta.mantenimiento');

