<?php

use App\Http\Controllers\CampingController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\IdiomasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ParcelaController;
use App\Http\Controllers\TarifaController;
use App\Http\Controllers\UsuarioController;
use App\Models\Parcela;
use Illuminate\Support\Facades\Route;

// --------------------------
// LOGIN
// --------------------------
Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// --------------------------
// RUTAS PROTEGIDAS
// --------------------------
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        $parcela = Parcela::where('id_camping', getCampingUsuario())->orderBy('id', 'asc')->get();

        return view('index', compact('parcela'));
    })->name('inicio');

    Route::resource('camping', CampingController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('checkin', CheckinController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('cliente', ClienteController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('idioma', IdiomasController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('parcela', ParcelaController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('tarifa', TarifaController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('usuario', UsuarioController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);

    Route::post('/parcela/{parcela}/toggle', [ParcelaController::class, 'toggle'])
        ->name('parcela.toggle');
});

// --------------------------
// ADMIN
// --------------------------
Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource('camping', CampingController::class);
    //Route::resource('idioma', IdiomasController::class);
    Route::resource('usuario', UsuarioController::class);

});
