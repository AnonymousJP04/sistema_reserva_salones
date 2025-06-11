<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Para generar slugs

class SalonController extends Controller
{
    public function index()
    {
        $salones = Salon::orderBy('nombre')->paginate(10);
        return view('gestion-salones.index', compact('salones'));
    }

    public function create()
    {
        return view('gestion-salones.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:150',
            // El slug no se recibe del formulario, se genera automáticamente
            'descripcion' => 'nullable|string',
            'capacidad_maxima' => 'required|integer|min:1',
            'capacidad_minima' => 'nullable|integer|min:1',
            'precio_base' => 'required|numeric|min:0',
            'tiene_aire_acondicionado' => 'sometimes|boolean',
            'tiene_proyector' => 'sometimes|boolean',
            'tiene_sonido' => 'sometimes|boolean',
            'tiene_cocina' => 'sometimes|boolean',
            'area_metros' => 'nullable|numeric|min:0',
            'estado' => 'required|in:activo,inactivo,mantenimiento',
            'imagen_principal' => 'nullable|image|max:2048',
            'galeria_imagenes.*' => 'image|max:2048',
        ]);

        // Checkbox: asegurar que tengan valor 0 o 1
        $validated['tiene_aire_acondicionado'] = $request->has('tiene_aire_acondicionado') ? 1 : 0;
        $validated['tiene_proyector'] = $request->has('tiene_proyector') ? 1 : 0;
        $validated['tiene_sonido'] = $request->has('tiene_sonido') ? 1 : 0;
        $validated['tiene_cocina'] = $request->has('tiene_cocina') ? 1 : 0;

        // Generar slug único a partir del nombre
        $baseSlug = Str::slug($validated['nombre']);
        $slug = $baseSlug;
        $count = 1;
        while (Salon::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }
        $validated['slug'] = $slug;

        // Manejo de imagen principal
        if ($request->hasFile('imagen_principal')) {
            $validated['imagen_principal'] = $request->file('imagen_principal')->store('salones', 'public');
        }

        // Manejo galería de imágenes
        $galeria = [];
        if ($request->hasFile('galeria_imagenes')) {
            foreach ($request->file('galeria_imagenes') as $img) {
                $galeria[] = $img->store('salones', 'public');
            }
        }
        $validated['galeria_imagenes'] = json_encode($galeria);

        // Crear el registro
        Salon::create($validated);

        return redirect()->route('salones.index')->with('success', 'Salón creado exitosamente');
    }

    public function edit(Salon $salon)
    {
        return view('gestion-salones.edit', compact('salon'));
    }

    public function update(Request $request, Salon $salon)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:150',
            // No validar slug, se genera automáticamente
            'descripcion' => 'nullable|string',
            'capacidad_maxima' => 'required|integer|min:1',
            'capacidad_minima' => 'nullable|integer|min:1',
            'precio_base' => 'required|numeric|min:0',
            'tiene_aire_acondicionado' => 'sometimes|boolean',
            'tiene_proyector' => 'sometimes|boolean',
            'tiene_sonido' => 'sometimes|boolean',
            'tiene_cocina' => 'sometimes|boolean',
            'area_metros' => 'nullable|numeric|min:0',
            'estado' => 'required|in:activo,inactivo,mantenimiento',
            'imagen_principal' => 'nullable|image|max:2048',
            'galeria_imagenes.*' => 'image|max:2048',
        ]);

        // Checkbox: asegurar que tengan valor 0 o 1
        $validated['tiene_aire_acondicionado'] = $request->has('tiene_aire_acondicionado') ? 1 : 0;
        $validated['tiene_proyector'] = $request->has('tiene_proyector') ? 1 : 0;
        $validated['tiene_sonido'] = $request->has('tiene_sonido') ? 1 : 0;
        $validated['tiene_cocina'] = $request->has('tiene_cocina') ? 1 : 0;

        // Generar slug único para actualizar
        $baseSlug = Str::slug($validated['nombre']);
        $slug = $baseSlug;
        $count = 1;
        while (Salon::where('slug', $slug)->where('id', '!=', $salon->id)->exists()) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }
        $validated['slug'] = $slug;

        // Reemplazar imagen principal si se sube nueva
        if ($request->hasFile('imagen_principal')) {
            if ($salon->imagen_principal) {
                Storage::disk('public')->delete($salon->imagen_principal);
            }
            $validated['imagen_principal'] = $request->file('imagen_principal')->store('salones', 'public');
        }

        // Galería: combinar existentes con nuevas imágenes
        $galeria_actual = $salon->galeria_imagenes ? json_decode($salon->galeria_imagenes) : [];
        if ($request->hasFile('galeria_imagenes')) {
            foreach ($request->file('galeria_imagenes') as $img) {
                $galeria_actual[] = $img->store('salones', 'public');
            }
        }
        $validated['galeria_imagenes'] = json_encode($galeria_actual);

        $salon->update($validated);

        return redirect()->route('salones.index')->with('success', 'Salón actualizado exitosamente');
    }

    public function show($slug)
    {
        $salon = Salon::where('slug', $slug)->firstOrFail();
        return view('salones.show', compact('salon'));
    }

    public function destroy(Salon $salon)
    {
        if ($salon->imagen_principal) {
            Storage::disk('public')->delete($salon->imagen_principal);
        }

        if ($salon->galeria_imagenes) {
            foreach (json_decode($salon->galeria_imagenes) as $img) {
                Storage::disk('public')->delete($img);
            }
        }

        $salon->delete();

        return redirect()->route('salones.index')->with('success', 'Salón eliminado exitosamente');
    }
}
