<?php

use App\Http\Controllers\ArtikelController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/tambah-artikel',[ArtikelController::class, 'addPage']);
Route::get('/edit-artikel/{id}',[ArtikelController::class, 'updatePage']);
Route::get('/pdf', [ArtikelController::class, 'pdf'])->name('pdf');

Route::post('/tambah-data-artikel', [ArtikelController::class, 'create']);
Route::post('/update-data-artikel/{id}', [ArtikelController::class, 'update']);
Route::get('/delete-data-artikel/{id}', [ArtikelController::class, 'delete']);

