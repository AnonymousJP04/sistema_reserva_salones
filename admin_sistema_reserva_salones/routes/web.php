<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SalonController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\TarifaController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\ProfileController;

// Ruta pública para usuarios no autenticados
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Rutas protegidas para usuarios autenticados y verificados
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    // Salones
    Route::resource('salones', SalonController::class);
    Route::get('/salones/{slug}', [SalonController::class, 'show'])->name('salones.show');


    // Reservas
    Route::resource('reservas', ReservaController::class);
    Route::post('reservas/{reserva}/aprobar', [ReservaController::class, 'aprobar'])->name('reservas.aprobar');
    Route::post('reservas/{reserva}/rechazar', [ReservaController::class, 'rechazar'])->name('reservas.rechazar');
    Route::get('reservas/pendientes', [ReservaController::class, 'pendientes'])->name('reservas.pendientes');


    // Otros recursos
    Route::resource('tarifas', TarifaController::class);
    Route::resource('mantenimientos', MantenimientoController::class);
    Route::resource('pagos', PagoController::class);
   Route::patch('/pagos/{pago}/verificar', [PagoController::class, 'verificar'])->name('pagos.verificar');


    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';