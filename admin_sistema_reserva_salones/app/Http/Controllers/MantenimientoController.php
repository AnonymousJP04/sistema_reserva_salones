<?php

namespace App\Http\Controllers;

use App\Models\Mantenimiento;
use App\Models\Salon;
use Illuminate\Http\Request;

class MantenimientoController extends Controller
{
    // Muestra todos los mantenimientos
    public function index()
    {
        $mantenimientos = Mantenimiento::with('salon')->orderBy('fecha', 'desc')->paginate(15);
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
            'salon_id' => 'required|exists:admin_salones,id',
            'descripcion' => 'required|string|max:255',
            'fecha' => 'required|date',
            'estado' => 'required|in:pendiente,realizado'
        ]);
        Mantenimiento::create($validated);
        return redirect()->route('mantenimientos.index')->with('success', 'Mantenimiento registrado exitosamente');
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
            'salon_id' => 'required|exists:admin_salones,id',
            'descripcion' => 'required|string|max:255',
            'fecha' => 'required|date',
            'estado' => 'required|in:pendiente,realizado'
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
