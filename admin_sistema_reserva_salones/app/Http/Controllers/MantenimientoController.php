<?php

namespace App\Http\Controllers;

use App\Models\Mantenimiento;
use App\Models\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MantenimientoController extends Controller
{
    public function index()
    {
        $mantenimientos = Mantenimiento::with(['salon', 'creador'])
            ->orderBy('fecha_inicio', 'desc')
            ->paginate(15);

        // Agregar salones para el filtro
        $salones = Salon::all();

        return view('mantenimiento.index', compact('mantenimientos', 'salones'));
    }

    public function create(Request $request)
    {
        $salones = Salon::all();
        
        // Capturar la fecha preseleccionada desde el calendario
        $fechaPreseleccionada = $request->get('fecha');
        
        // Validar que la fecha preseleccionada no sea del pasado
        if ($fechaPreseleccionada && Carbon::parse($fechaPreseleccionada)->lt(Carbon::today())) {
            $fechaPreseleccionada = Carbon::today()->format('Y-m-d');
        }
        
        return view('mantenimiento.create', compact('salones', 'fechaPreseleccionada'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'salon_id' => 'required|exists:admin_salones,id',
            'fecha_inicio' => [
                'required',
                'date',
                'after_or_equal:today', // No permitir fechas pasadas
            ],
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'hora_inicio' => 'nullable|date_format:H:i',
            'hora_fin' => 'nullable|date_format:H:i|after_or_equal:hora_inicio',
            'tipo_mantenimiento' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'proveedor' => 'nullable|string|max:150',
            'costo' => 'nullable|numeric|min:0',
            'estado' => 'required|in:programado,en_proceso,completado,cancelado',
        ], [
            'fecha_inicio.after_or_equal' => 'No se pueden programar mantenimientos en fechas pasadas.',
            'hora_fin.after_or_equal' => 'La hora de fin debe ser posterior a la hora de inicio.',
        ]);

        // Verificar que no haya conflictos con otros mantenimientos
        $conflicto = Mantenimiento::where('salon_id', $validated['salon_id'])
            ->where(function ($query) use ($validated) {
                $query->whereBetween('fecha_inicio', [$validated['fecha_inicio'], $validated['fecha_fin']])
                      ->orWhereBetween('fecha_fin', [$validated['fecha_inicio'], $validated['fecha_fin']])
                      ->orWhere(function ($q) use ($validated) {
                          $q->where('fecha_inicio', '<=', $validated['fecha_inicio'])
                            ->where('fecha_fin', '>=', $validated['fecha_fin']);
                      });
            })
            ->whereIn('estado', ['programado', 'en_proceso'])
            ->exists();

        if ($conflicto) {
            return back()->withErrors([
                'fecha_inicio' => 'Ya existe un mantenimiento programado para este salón en las fechas seleccionadas.'
            ])->withInput();
        }

        // Asignar el usuario que lo creó
        $validated['creado_por'] = Auth::id();

        // Crear el mantenimiento
        $mantenimiento = Mantenimiento::create($validated);

        // Si el mantenimiento está programado o en proceso, cambiar estado del salón
        if (in_array($validated['estado'], ['programado', 'en_proceso'])) {
            $salon = Salon::find($validated['salon_id']);
            if ($salon) {
                $salon->update(['estado' => 'mantenimiento']);
            }
        }

        return redirect()->route('mantenimientos.index')
            ->with('success', 'Mantenimiento registrado exitosamente.');
    }

    public function show(Mantenimiento $mantenimiento)
    {
        $mantenimiento->load(['salon', 'creador']);
        return view('mantenimiento.show', compact('mantenimiento'));
    }

    public function edit(Mantenimiento $mantenimiento)
    {
        $salones = Salon::all();
        return view('mantenimiento.edit', compact('mantenimiento', 'salones'));
    }

    public function update(Request $request, Mantenimiento $mantenimiento)
    {
        $validated = $request->validate([
            'salon_id' => 'required|exists:admin_salones,id',
            'fecha_inicio' => [
                'required',
                'date',
                // Solo validar fechas futuras si es un mantenimiento nuevo o si se está cambiando la fecha
                $mantenimiento->fecha_inicio->lt(Carbon::today()) ? '' : 'after_or_equal:today',
            ],
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'hora_inicio' => 'nullable|date_format:H:i',
            'hora_fin' => 'nullable|date_format:H:i|after_or_equal:hora_inicio',
            'tipo_mantenimiento' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'proveedor' => 'nullable|string|max:150',
            'costo' => 'nullable|numeric|min:0',
            'estado' => 'required|in:programado,en_proceso,completado,cancelado',
        ], [
            'fecha_inicio.after_or_equal' => 'No se pueden programar mantenimientos en fechas pasadas.',
            'hora_fin.after_or_equal' => 'La hora de fin debe ser posterior a la hora de inicio.',
        ]);

        // Verificar conflictos solo si se cambiaron las fechas o el salón
        if ($mantenimiento->salon_id != $validated['salon_id'] || 
            $mantenimiento->fecha_inicio->format('Y-m-d') != $validated['fecha_inicio'] ||
            $mantenimiento->fecha_fin->format('Y-m-d') != $validated['fecha_fin']) {
            
            $conflicto = Mantenimiento::where('salon_id', $validated['salon_id'])
                ->where('id', '!=', $mantenimiento->id) // Excluir el mantenimiento actual
                ->where(function ($query) use ($validated) {
                    $query->whereBetween('fecha_inicio', [$validated['fecha_inicio'], $validated['fecha_fin']])
                          ->orWhereBetween('fecha_fin', [$validated['fecha_inicio'], $validated['fecha_fin']])
                          ->orWhere(function ($q) use ($validated) {
                              $q->where('fecha_inicio', '<=', $validated['fecha_inicio'])
                                ->where('fecha_fin', '>=', $validated['fecha_fin']);
                          });
                })
                ->whereIn('estado', ['programado', 'en_proceso'])
                ->exists();

            if ($conflicto) {
                return back()->withErrors([
                    'fecha_inicio' => 'Ya existe un mantenimiento programado para este salón en las fechas seleccionadas.'
                ])->withInput();
            }
        }

        // Manejar cambios de estado del salón
        $estadoAnterior = $mantenimiento->estado;
        $nuevoEstado = $validated['estado'];
        
        $mantenimiento->update($validated);

        // Actualizar estado del salón según el estado del mantenimiento
        $salon = Salon::find($validated['salon_id']);
        if ($salon) {
            if (in_array($nuevoEstado, ['programado', 'en_proceso'])) {
                $salon->update(['estado' => 'mantenimiento']);
            } elseif ($nuevoEstado === 'completado' || $nuevoEstado === 'cancelado') {
                // Verificar si hay otros mantenimientos activos para este salón
                $otrosMantenimientos = Mantenimiento::where('salon_id', $salon->id)
                    ->where('id', '!=', $mantenimiento->id)
                    ->whereIn('estado', ['programado', 'en_proceso'])
                    ->exists();
                
                if (!$otrosMantenimientos) {
                    $salon->update(['estado' => 'activo']);
                }
            }
        }

        return redirect()->route('mantenimientos.index')
            ->with('success', 'Mantenimiento actualizado exitosamente');
    }

    public function destroy(Mantenimiento $mantenimiento)
    {
        $salon = $mantenimiento->salon;
        
        $mantenimiento->delete();
        
        // Si era el único mantenimiento activo, restaurar estado del salón
        if ($salon && in_array($mantenimiento->estado, ['programado', 'en_proceso'])) {
            $otrosMantenimientos = Mantenimiento::where('salon_id', $salon->id)
                ->whereIn('estado', ['programado', 'en_proceso'])
                ->exists();
            
            if (!$otrosMantenimientos) {
                $salon->update(['estado' => 'activo']);
            }
        }
        
        return redirect()->route('mantenimientos.index')
            ->with('success', 'Mantenimiento eliminado exitosamente');
    }

    /**
     * Método para verificar disponibilidad de un salón
     * Útil para la integración con el sistema de reservas Angular
     */
    public function checkAvailability(Request $request)
    {
        $salon_id = $request->get('salon_id');
        $fecha = $request->get('fecha');
        
        if (!$salon_id || !$fecha) {
            return response()->json(['available' => false, 'message' => 'Parámetros requeridos']);
        }
        
        $mantenimientos = Mantenimiento::where('salon_id', $salon_id)
            ->where(function ($query) use ($fecha) {
                $query->where('fecha_inicio', '<=', $fecha)
                      ->where('fecha_fin', '>=', $fecha);
            })
            ->whereIn('estado', ['programado', 'en_proceso'])
            ->exists();
        
        return response()->json([
            'available' => !$mantenimientos,
            'message' => $mantenimientos ? 'Salón en mantenimiento en esta fecha' : 'Salón disponible'
        ]);
    }
}