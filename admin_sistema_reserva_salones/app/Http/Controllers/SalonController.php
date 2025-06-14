<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $validated = $this->validateSalon($request);

        $validated['slug'] = $this->generateUniqueSlug($validated['nombre']);
        $validated['imagen_principal'] = $this->handleImagenPrincipal($request);
        $validated['galeria_imagenes'] = $this->handleGaleriaImagenes($request);

        Salon::create($validated);

        // CORRECCIÓN: redirigir a la ruta salones.index, que sí existe
        return redirect()->route('salones.index')->with('success', 'Salón creado exitosamente');
    }

    public function edit(Salon $salon)
    {
        return view('gestion-salones.edit', compact('salon'));
    }

    public function update(Request $request, Salon $salon)
    {
        $validated = $this->validateSalon($request);

        $validated['slug'] = $this->generateUniqueSlug($validated['nombre'], $salon->id);

        if ($request->hasFile('imagen_principal')) {
            if ($salon->imagen_principal) {
                Storage::disk('public')->delete($salon->imagen_principal);
            }
            $validated['imagen_principal'] = $this->handleImagenPrincipal($request);
        } else {
            $validated['imagen_principal'] = $salon->imagen_principal;
        }

        $galeria_actual = $salon->galeria_imagenes ? json_decode($salon->galeria_imagenes) : [];
        if ($request->hasFile('galeria_imagenes')) {
            foreach ($request->file('galeria_imagenes') as $img) {
                $galeria_actual[] = $img->store('salones', 'public');
            }
        }
        $validated['galeria_imagenes'] = json_encode($galeria_actual);

        $salon->update($validated);

        // CORRECCIÓN: redirigir a salones.index
        return redirect()->route('salones.index')->with('success', 'Salón actualizado exitosamente');
    }

    public function show(Salon $salon)
    {
        return view('gestion-salones.show', compact('salon'));
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

        //Redirigir a salones.index
        return redirect()->route('salones.index')->with('success', 'Salón eliminado exitosamente');
    }

    // --- Métodos privados reutilizables ---

    private function validateSalon(Request $request): array
    {
        $validated = $request->validate([
            'nombre' => 'required|max:150',
            'descripcion' => 'nullable|string',
            'capacidad_maxima' => 'required|integer|min:1',
            'capacidad_minima' => 'nullable|integer|min:1|lte:capacidad_maxima',
            'precio_base' => 'required|numeric|min:0',
            'tiene_aire_acondicionado' => 'sometimes|boolean',
            'tiene_proyector' => 'sometimes|boolean',
            'tiene_sonido' => 'sometimes|boolean',
            'tiene_cocina' => 'sometimes|boolean',
            'area_metros' => 'nullable|numeric|min:0',
            'estado' => 'required|in:activo,inactivo,mantenimiento',
            'imagen_principal' => 'nullable|image|max:100000',
            'galeria_imagenes.*' => 'image|max:100000',
        ]);

        foreach (['tiene_aire_acondicionado', 'tiene_proyector', 'tiene_sonido', 'tiene_cocina'] as $campo) {
            $validated[$campo] = filter_var($request->input($campo, false), FILTER_VALIDATE_BOOLEAN) ? 1 : 0;
        }

        return $validated;
    }

    private function generateUniqueSlug(string $nombre, $salonId = null): string
    {
        $baseSlug = Str::slug($nombre);
        $slug = $baseSlug;
        $count = 1;

        while (Salon::where('slug', $slug)
            ->when($salonId, fn($q) => $q->where('id', '!=', $salonId))
            ->exists()) {
            $slug = $baseSlug . '-' . $count++;
        }

        return $slug;
    }

    private function handleImagenPrincipal(Request $request): ?string
    {
        if ($request->hasFile('imagen_principal')) {
            return $request->file('imagen_principal')->store('salones', 'public');
        }
        return null;
    }

    private function handleGaleriaImagenes(Request $request): string
    {
        $galeria = [];

        if ($request->hasFile('galeria_imagenes')) {
            foreach ($request->file('galeria_imagenes') as $img) {
                $galeria[] = $img->store('salones', 'public');
            }
        }

        return json_encode($galeria);
    }

}
