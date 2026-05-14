<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampingController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\IdiomasController;
use App\Http\Controllers\ParcelaController;
use App\Http\Controllers\TarifaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;

Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('inicio');

    Route::resource('camping', CampingController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('checkin', CheckinController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('cliente', ClienteController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('idioma', IdiomasController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('parcela', ParcelaController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('tarifa', TarifaController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('usuario', UsuarioController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
});
