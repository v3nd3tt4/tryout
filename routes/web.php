<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoalController;
use App\Models\Soal;

Route::get('/', function () {
    return view('home')->with(array('link'=> ''));
});
Route::resource('soal', SoalController::class);
Route::post('soal/destroy', [SoalController::class, 'destroy']);
Route::post('soal/update', [SoalController::class, 'update']);