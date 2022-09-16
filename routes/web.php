<?php

use App\Http\Controllers\AsistenteController;
use App\Http\Controllers\ChoferController;
use App\Http\Controllers\VentaPasajeController;
use App\Http\Controllers\ViajeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('ventasPasajes',VentaPasajeController::class);
Route::resource('viajes',ViajeController::class);
Route::resource('choferes',ChoferController::class);
Route::resource('asistentes',AsistenteController::class);

Route::post('/ventasPasajes/obtenerDatoViaje',[VentaPasajeController::class,'obtenerDatoViaje'])->name('ventasPasajes.obtenerDatosViaje');

