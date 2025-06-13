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

    //Nuevas rutas para el dashboard
    Route::get('/dashboard/data', [DashboardController::class, 'getData'])->name('dashboard.data');
    Route::get('/dashboard/notifications', [DashboardController::class, 'getNotifications'])->name('dashboard.notifications');
    Route::get('/dashboard/data', [DashboardController::class, 'filtrarDatos']);


    // Salones
Route::get('/salones', [SalonController::class, 'index'])->name('salones.index');
Route::get('/salones/create', [SalonController::class, 'create'])->name('salones.create');
Route::post('/salones', [SalonController::class, 'store'])->name('salones.store');
Route::get('/salones/{salon:slug}', [SalonController::class, 'show'])->name('salones.show');
Route::get('/salones/{salon:slug}/edit', [SalonController::class, 'edit'])->name('salones.edit');
Route::put('/salones/{salon:slug}', [SalonController::class, 'update'])->name('salones.update');
Route::delete('/salones/{salon:slug}', [SalonController::class, 'destroy'])->name('salones.destroy');


    // Reservas
    Route::resource('reservas', ReservaController::class);
    Route::post('reservas/{reserva}/aprobar', [ReservaController::class, 'aprobar'])->name('reservas.aprobar');
    Route::post('reservas/{reserva}/rechazar', [ReservaController::class, 'rechazar'])->name('reservas.rechazar');
    Route::get('reservas/pendientes', [ReservaController::class, 'pendientes'])->name('reservas.pendientes');
    Route::post('/reservas/{reserva}/update-status', [ReservaController::class, 'updateStatus'])->name('reservas.updateStatus');

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