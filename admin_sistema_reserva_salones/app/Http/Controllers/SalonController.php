<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SalonController extends Controller
{
    // Lista todos los salones con conteo de reservas y mantenimientos
    public function index()
    {
        $salones = Salon::withCount(['reservas', 'mantenimientos'])
                    ->orderBy('nombre')
                    ->paginate(10);

        return view('gestion-salones.index', compact('salones'));
    }

    // Muestra el formulario para crear un nuevo salón
    public function create()
    {
        return view('gestion-salones.create');
    }

    // Guarda un nuevo salón en la base de datos
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:150',
            'descripcion' => 'nullable',
            'capacidad_maxima' => 'required|integer|min:1',
            'precio_base' => 'required|numeric|min:0',
            'imagen_principal' => 'nullable|image|max:2048'
        ]);

        // Guarda la imagen si se subió
        if ($request->hasFile('imagen_principal')) {
            $validated['imagen_principal'] = $request->file('imagen_principal')->store('salones', 'public');
        }

        Salon::create($validated);

        return redirect()->route('salones.index')->with('success', 'Salón creado exitosamente');
    }

    // Muestra el formulario para editar un salón existente
    public function edit(Salon $salon)
    {
        return view('gestion-salones.edit', compact('salon'));
    }

    // Actualiza los datos de un salón existente
    public function update(Request $request, Salon $salon)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:150',
            'descripcion' => 'nullable',
            'capacidad_maxima' => 'required|integer|min:1',
            'precio_base' => 'required|numeric|min:0',
            'imagen_principal' => 'nullable|image|max:2048'
        ]);

        // Si hay nueva imagen, elimina la anterior y guarda la nueva
        if ($request->hasFile('imagen_principal')) {
            if ($salon->imagen_principal) {
                Storage::disk('public')->delete($salon->imagen_principal);
            }
            $validated['imagen_principal'] = $request->file('imagen_principal')->store('salones', 'public');
        }

        $salon->update($validated);

        return redirect()->route('salones.index')->with('success', 'Salón actualizado exitosamente');
    }

    // Elimina un salón y su imagen asociada
    public function destroy(Salon $salon)
    {
        if ($salon->imagen_principal) {
            Storage::disk('public')->delete($salon->imagen_principal);
        }

        $salon->delete();

        return redirect()->route('salones.index')->with('success', 'Salón eliminado exitosamente');
    }
}
