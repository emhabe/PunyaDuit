<?php

use App\Http\Controllers\SaldoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[SaldoController::class,'dashboard']);
Route::get('/saldo/tambah',[SaldoController::class,'tambahSaldo']);
Route::get('/cetak',[SaldoController::class,'cetak']);
Route::post('/store',[SaldoController::class,'store']);
