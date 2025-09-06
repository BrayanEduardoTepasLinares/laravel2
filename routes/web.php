<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('rols', RolController::class);