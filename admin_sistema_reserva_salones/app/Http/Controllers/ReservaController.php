<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Salon;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    // Lista todas las reservas con su salón asociado
    public function index()
    {
        $reservas = Reserva::with('salon')
            ->orderBy('fecha_reserva', 'desc')
            ->paginate(15);

        return view('reservas.index', compact('reservas'));
    }

    // Muestra el formulario para crear una nueva reserva
    public function create()
    {
        $salones = Salon::where('estado', 'activo')->get();
        return view('reservas.create', compact('salones'));
    }

    // Guarda una nueva reserva en la base de datos
    public function store(Request $request)
    {
        $validated = $request->validate([
            'salon_id' => 'required|exists:admin_salones,id',
            'fecha_reserva' => 'required|date|after_or_equal:today',
            'hora_inicio' => 'required',
            'hora_fin' => 'required|after:hora_inicio',
            'numero_personas' => 'required|integer|min:1',
            'tipo_evento' => 'required|string|max:100',
            'observaciones' => 'nullable|string'
        ]);

        // Verifica si hay conflictos de horario para el salón
        $conflictos = Reserva::where('salon_id', $validated['salon_id'])
            ->where('fecha_reserva', $validated['fecha_reserva'])
            ->where(function($query) use ($validated) {
                $query->whereBetween('hora_inicio', [$validated['hora_inicio'], $validated['hora_fin']])
                      ->orWhereBetween('hora_fin', [$validated['hora_inicio'], $validated['hora_fin']])
                      ->orWhere(function($q) use ($validated) {
                          $q->where('hora_inicio', '<=', $validated['hora_inicio'])
                            ->where('hora_fin', '>=', $validated['hora_fin']);
                      });
            })
            ->whereIn('estado', ['pendiente', 'aprobada'])
            ->exists();

        if ($conflictos) {
            return back()->withErrors(['conflicto' => 'El salón no está disponible en el horario seleccionado']);
        }

        // Genera código de reserva y calcula total
        $validated['codigo_reserva'] = 'RES-' . strtoupper(uniqid()); // Genera un código único para la reserva
        $validated['estado'] = 'pendiente';
        $validated['usuario_id'] = Auth::id();

        $salon = Salon::find($validated['salon_id']);
        $horas = Carbon::parse($validated['hora_fin'])->diffInHours(Carbon::parse($validated['hora_inicio']));
        $validated['total'] = $salon->precio_base * $horas;

        Reserva::create($validated);

        return redirect()->route('reservas.index')->with('success', 'Reserva creada exitosamente');
    }

    // Aprueba una reserva
    public function aprobar(Reserva $reserva)
    {
        $reserva->update(['estado' => 'aprobada']);
        return back()->with('success', 'Reserva aprobada');
    }

    // Rechaza una reserva
    public function rechazar(Reserva $reserva)
    {
        $reserva->update(['estado' => 'rechazada']);
        return back()->with('success', 'Reserva rechazada');
    }

    // Muestra los detalles de una reserva específica
public function show($id)
{
    $reserva = Reserva::with('salon')->findOrFail($id);
    return view('reservas.show', compact('reserva'));
}

}
