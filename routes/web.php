<?php

use App\Http\Controllers\IsiSoalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\UserController;
use App\Models\Soal;
use App\Models\User;

Route::get('/', function () {
    return view('home')->with(array('link'=> ''));
});

Route::get('login', function () {
    return view('login')->with(array('link'=> ''));
});

Route::group(['middleware' => ['role:admin']], function () {

    Route::resource('soal', SoalController::class);
    Route::post('soal/destroy', [SoalController::class, 'destroy']);
    Route::post('soal/update', [SoalController::class, 'update']);
    Route::get('soal/lihat_soal/{id}', [SoalController::class, 'lihat_soal']);

    Route::resource('isisoal', IsiSoalController::class);
    Route::post('isisoal/destroy', [IsiSoalController::class, 'destroy']);
    Route::post('isisoal/update', [IsiSoalController::class, 'update']);
    Route::post('isisoal/next', [IsiSoalController::class, 'next']);

    Route::resource('user', UserController::class);
    Route::post('user/update', [UserController::class, 'update']);
    Route::post('user/destroy', [UserController::class, 'destroy']);

});

Route::post('user/login', [UserController::class, 'login']);
Route::get('logout', [UserController::class, 'logout']);
