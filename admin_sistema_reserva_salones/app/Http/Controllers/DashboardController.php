<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Salon;
use App\Models\Pago;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    // Muestra el dashboard principal con estadísticas y datos recientes
    public function __invoke()
    {
        $totalSalones = Salon::count();
        $reservasActivas = Reserva::where('estado', 'confirmado')->whereDate('fecha_reserva', today())->count();

        // Estadísticas generales para el dashboard
        $stats = [
            'salones_activos' => Salon::where('estado', 'activo')->count(),
            'reservas_pendientes' => Reserva::where('estado', 'pendiente')->count(),
            'reservas_hoy' => Reserva::whereDate('fecha_reserva', today())->count(),
            'ingresos_mes' => Pago::where('estado', 'verificado')
                                ->whereMonth('fecha_pago', now()->month)
                                ->sum('monto'),

            // NUEVAS MÉTRICAS
            'clientes_registrados' => User::count(), // Clientes registrados
            'salones_mantenimiento' => Salon::where('estado', 'mantenimiento')->count(), // Salones en mantenimiento
            'reservas_canceladas_mes' => Reserva::where('estado', 'cancelado')
                ->whereMonth('fecha_reserva', now()->month)
                ->count(), // Reservas canceladas este mes
            'porcentaje_ocupacion' => $totalSalones > 0 ? round(($reservasActivas / $totalSalones) * 100, 1) : 0, // Porcentaje de ocupación hoy
        ];

        // Últimas 5 reservas realizadas
        $reservas_recientes = Reserva::with('salon')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Top 3 salones con más reservas
        $salones_populares = Salon::withCount('reservas')
            ->orderBy('reservas_count', 'desc')
            ->limit(3)
            ->get();

        // Retorna la vista del dashboard con los datos
        return view('dashboard', compact('stats', 'reservas_recientes', 'salones_populares'));
    }
}
