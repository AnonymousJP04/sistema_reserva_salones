<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Salon;
use App\Models\Pago;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Muestra el dashboard principal con estadísticas y datos recientes
    public function __invoke()
    {
        $stats = $this->getStats('today');
        $reservas_recientes = $this->getReservasRecientes();
        $salones_populares = $this->getSalonesPopulares();

        return view('dashboard', compact('stats', 'reservas_recientes', 'salones_populares'));
    }

    // Método para obtener datos filtrados por período
    public function getData(Request $request)
    {
        $period = $request->get('period', 'today');
        $stats = $this->getStats($period);

        return response()->json([
            'stats' => $stats,
            'period' => $period
        ]);
    }

    // Método para obtener notificaciones
    public function getNotifications()
    {
        $lastCheck = session('last_notification_check', now()->subMinutes(1));
        
        $newReservations = Reserva::where('created_at', '>', $lastCheck)->count();
        
        session(['last_notification_check' => now()]);

        return response()->json([
            'new_reservations' => $newReservations
        ]);
    }

    private function getStats($period)
    {
        $totalSalones = Salon::count();
        
        // Definir rangos de fechas según el período
        switch ($period) {
            case 'today':
                $startDate = today();
                $endDate = today();
                break;
            case 'week':
                $startDate = now()->startOfWeek();
                $endDate = now()->endOfWeek();
                break;
            case 'month':
                $startDate = now()->startOfMonth();
                $endDate = now()->endOfMonth();
                break;
            case 'year':
                $startDate = now()->startOfYear();
                $endDate = now()->endOfYear();
                break;
            default:
                $startDate = today();
                $endDate = today();
        }

        // Calcular reservas activas para el período
        $reservasActivas = Reserva::where('estado', 'confirmado')
            ->whereBetween('fecha_reserva', [$startDate, $endDate])
            ->count();

        return [
            'salones_activos' => Salon::where('estado', 'activo')->count(),
            'reservas_pendientes' => Reserva::where('estado', 'pendiente')->count(),
            'reservas_hoy' => Reserva::whereBetween('fecha_reserva', [$startDate, $endDate])->count(),
            'ingresos_mes' => Pago::where('estado', 'verificado')
                ->whereBetween('fecha_pago', [$startDate, $endDate])
                ->sum('monto'),
            'clientes_registrados' => User::count(),
            'salones_mantenimiento' => Salon::where('estado', 'mantenimiento')->count(),
            'reservas_canceladas_mes' => Reserva::where('estado', 'cancelado')
                ->whereBetween('fecha_reserva', [$startDate, $endDate])
                ->count(),
            'porcentaje_ocupacion' => $totalSalones > 0 ? round(($reservasActivas / $totalSalones) * 100, 1) : 0,
        ];
    }

    private function getReservasRecientes()
    {
        return Reserva::with('salon')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
    }

    private function getSalonesPopulares()
    {
        return Salon::withCount('reservas')
            ->orderBy('reservas_count', 'desc')
            ->limit(3)
            ->get();
    }
}