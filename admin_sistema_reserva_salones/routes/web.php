<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SalonController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\TarifaController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\ProfileController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    
    // Salones
    Route::resource('salones', SalonController::class);
    
    // Reservas
    Route::resource('reservas', ReservaController::class);
    Route::post('reservas/{reserva}/aprobar', [ReservaController::class, 'aprobar'])->name('reservas.aprobar');
    Route::post('reservas/{reserva}/rechazar', [ReservaController::class, 'rechazar'])->name('reservas.rechazar');
    
    // Otros recursos
    Route::resource('tarifas', TarifaController::class);
    Route::resource('mantenimientos', MantenimientoController::class);
    Route::resource('pagos', PagoController::class);
    
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
