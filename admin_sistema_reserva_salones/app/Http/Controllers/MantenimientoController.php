<?php

namespace App\Http\Controllers;

use App\Models\Mantenimiento;
use App\Models\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MantenimientoController extends Controller
{
    // Muestra todos los mantenimientos
    public function index()
    {
        $mantenimientos = Mantenimiento::with('salon')
            ->orderBy('fecha_inicio', 'desc')
            ->orderBy('fecha_fin', 'desc')
            ->paginate(15);

        return view('mantenimiento.index', compact('mantenimientos'));
    }

    // Muestra el formulario para crear un nuevo mantenimiento
    public function create()
    {
        $salones = Salon::all();
        return view('mantenimiento.create', compact('salones'));
    }

    // Guarda un nuevo mantenimiento en la base de datos
    public function store(Request $request)
    {
        $validated = $request->validate([
            'salon_slug' => 'required|exists:admin_salones,slug',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'hora_inicio' => 'nullable|date_format:H:i',
            'hora_fin' => 'nullable|date_format:H:i|after_or_equal:hora_inicio',
            'tipo_mantenimiento' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'proveedor' => 'nullable|string|max:150',
            'costo' => 'nullable|numeric|min:0',
            'estado' => 'required|in:programado,en_proceso,completado,cancelado',
        ]);

        // Asignar el usuario que lo creó (aquí lo puedes cambiar según tu lógica)
        $validated['creado_por'] = 1;

        // Guardar el mantenimiento
        Mantenimiento::create($validated);

        return redirect()->route('mantenimientos.index')->with('success', 'Mantenimiento registrado exitosamente.');
    }

    // Muestra un mantenimiento específico
    public function show(Mantenimiento $mantenimiento)
    {
        return view('mantenimiento.show', compact('mantenimiento'));
    }

    // Muestra el formulario para editar un mantenimiento
    public function edit(Mantenimiento $mantenimiento)
    {
        $salones = Salon::all();
        return view('mantenimiento.edit', compact('mantenimiento', 'salones'));
    }

    // Actualiza un mantenimiento existente
    public function update(Request $request, Mantenimiento $mantenimiento)
    {
        $validated = $request->validate([
            'salon_slug' => 'required|exists:admin_salones,slug',
            'descripcion' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'hora_inicio' => 'nullable|date_format:H:i',
            'hora_fin' => 'nullable|date_format:H:i|after_or_equal:hora_inicio',
            'estado' => 'required|in:programado,en_proceso,completado,cancelado',
        ]);

        $mantenimiento->update($validated);

        return redirect()->route('mantenimientos.index')->with('success', 'Mantenimiento actualizado exitosamente');
    }

    // Elimina un mantenimiento
    public function destroy(Mantenimiento $mantenimiento)
    {
        $mantenimiento->delete();
        return redirect()->route('mantenimientos.index')->with('success', 'Mantenimiento eliminado exitosamente');
    }
}
