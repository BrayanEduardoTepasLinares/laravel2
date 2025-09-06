<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('rols', RolController::class);

// Ruta para previsualizar el PDF de un rol
Route::get('rols/{rol}/pdf/preview', [RolController::class, 'previewPdf'])->name('rols.pdf.preview');

// Ruta para descargar el PDF de un rol
Route::get('rols/{rol}/pdf/download', [RolController::class, 'downloadPdf'])->name('rols.pdf.download');
