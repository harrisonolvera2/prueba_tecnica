<?php

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

use App\Http\Controllers\EntradaController;
use App\Http\Controllers\RestController;


Route::get('/entradas', [EntradaController::class, 'index'])->name('entradas.index');
Route::get('/entradas/create', [EntradaController::class, 'create'])->name('entradas.create');
Route::post('/entradas', [EntradaController::class, 'store'])->name('entradas.store');
Route::get('/entradas/{entrada}', [EntradaController::class, 'show'])->name('entradas.show');
Route::get('/entradas/search', [EntradaController::class, 'search'])->name('entradas.search');
Route::get('/entradas/{entrada}/edit', [EntradaController::class, 'edit'])->name('entradas.edit');
Route::put('/entradas/{entrada}', [EntradaController::class, 'update'])->name('entradas.update');
Route::delete('/entradas/{entrada}', [EntradaController::class, 'destroy'])->name('entradas.destroy');

//para el servicio rest
Route::get('/api/entradas', [RestController::class, 'getAllEntries']);
Route::get('/api/entradas/{id}', [RestController::class, 'getEntry']);
Route::post('/api/entradas', [RestController::class, 'storeEntry']);