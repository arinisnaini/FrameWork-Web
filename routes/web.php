<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropinsiController;
use App\Http\Controllers\KotaController; 


Route::get('/', function () {
    return view('welcome');
});

Route::resource('propinsi', PropinsiController::class);

Route::resource('kota', KotaController::class); 
