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

/* Travels Routes */
Route::get('/viajes', [App\Http\Controllers\ViajeController::class, 'index'])->name('viajes.index');
Route::get('/viajes/create', [App\Http\Controllers\ViajeController::class, 'create'])->name('viajes.create');
Route::post('/viajes', [App\Http\Controllers\ViajeController::class, 'store'])->name('viajes.store');
Route::get('/viajes/edit/{id}', [App\Http\Controllers\ViajeController::class, 'edit'])->name('viajes.edit');
Route::put('/viajes/{id}', [App\Http\Controllers\ViajeController::class, 'update'])->name('viajes.update');
Route::delete('/viajes/{id}', [\App\Http\Controllers\ViajeController::class, 'destroy'])->name('viajes.destroy');
Route::get('/viajes/show/{id}', [App\Http\Controllers\ViajeController::class, 'show'])->name('viajes.show');
Route::get('viajes/reporteViajes', [App\Http\Controllers\ViajeController::class, 'reporteViajes'])->name('viajes.reporteViajes');
Route::get('viajes/detalleReporteViaje/{viaje_id}/{fecha_inicial_formatada}/{fecha_final_formatada}', [App\Http\Controllers\ViajeController::class, 'detalleReporteViaje'])->name('viajes.detalleReporteViaje');
Route::get('viajes/detalleReporteViaje-PDF/{viaje_id}/{fecha_inicial_formatada}/{fecha_final_formatada}', [App\Http\Controllers\ViajeController::class, 'detalleReporteViajePDF'])->name('viajes.detalleReporteViajePDF');
Route::get('viajes/updateState/{id}', [App\Http\Controllers\ViajeController::class, 'updateState'])->name('viajes.updateState');


Route::resource('choferes',ChoferController::class);
Route::resource('asistentes',AsistenteController::class);

Route::post('/ventasPasajes/obtenerDatoViaje',[VentaPasajeController::class,'obtenerDatoViaje'])->name('ventasPasajes.obtenerDatosViaje');

