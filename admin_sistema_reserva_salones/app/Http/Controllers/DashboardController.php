<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Salon;
use App\Models\Pago;
use Carbon\Carbon;

class DashboardController extends Controller
{
    // Muestra el dashboard principal con estadísticas y datos recientes
    public function __invoke()
    {
        // Estadísticas generales para el dashboard
        $stats = [
            'salones_activos' => Salon::where('estado', 'activo')->count(),
            'reservas_pendientes' => Reserva::where('estado', 'pendiente')->count(),
            'reservas_hoy' => Reserva::whereDate('fecha_reserva', today())->count(),
            'ingresos_mes' => Pago::where('estado', 'verificado')
                                ->whereMonth('fecha_pago', now()->month)
                                ->sum('monto')
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
