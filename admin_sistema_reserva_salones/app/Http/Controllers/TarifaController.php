<?php

namespace App\Http\Controllers;

use App\Models\Tarifa;
use Illuminate\Http\Request;
use App\Models\Salon;


class TarifaController extends Controller
{
    // Constantes para reglas de validación
    private const REQUIRED_BOOLEAN = 'required|boolean';
    private const NULLABLE_NUMERIC = 'nullable|numeric|min:0';

    // Muestra todas las tarifas
    public function index()
    {
        $tarifas = Tarifa::orderBy('nombre')->paginate(10);
        return view('tarifas.index', compact('tarifas'));
    }

    // Muestra el formulario para crear una nueva tarifa
   public function create()
{
    $salones = Salon::all(); // O el modelo que uses para los salones
    return view('tarifas.create', compact('salones'));
}


    // Guarda una nueva tarifa en la base de datos
    public function store(Request $request)
    {
        $validated = $request->validate([
            'salon_id' => 'required|exists:admin_salones,id',
            'nombre' => 'required|max:100',
            'tipo_evento' => 'nullable|max:100',
            'precio_por_hora' => self::NULLABLE_NUMERIC,
            'precio_medio_dia' => self::NULLABLE_NUMERIC,
            'precio_dia_completo' => self::NULLABLE_NUMERIC,
            'vigente_desde' => 'required|date',
            'vigente_hasta' => 'required|date|after_or_equal:vigente_desde',
            'horas_minimas' => 'required|integer|min:1',
            'aplica_fines_semana' => self::REQUIRED_BOOLEAN,
            'recargo_fin_semana' => self::NULLABLE_NUMERIC,
            'activa' => self::REQUIRED_BOOLEAN,
        ]);
        Tarifa::create($validated);
        return redirect()->route('tarifas.index')->with('success', 'Tarifa creada exitosamente');
    }

    // Muestra una tarifa específica
    public function show(Tarifa $tarifa)
    {
        return view('tarifas.show', compact('tarifa'));
    }

    // Muestra el formulario para editar una tarifa
    public function edit(Tarifa $tarifa)
    {
        return view('tarifas.edit', compact('tarifa'));
    }

    // Actualiza una tarifa existente
    public function update(Request $request, Tarifa $tarifa)
    {
        $validated = $request->validate([
            'salon_id' => 'required|exists:admin_salones,id',
            'nombre' => 'required|max:100',
            'tipo_evento' => 'nullable|max:100',
            'precio_por_hora' => self::NULLABLE_NUMERIC,
            'precio_medio_dia' => self::NULLABLE_NUMERIC,
            'precio_dia_completo' => self::NULLABLE_NUMERIC,
            'vigente_desde' => 'required|date',
            'vigente_hasta' => 'required|date|after_or_equal:vigente_desde',
            'horas_minimas' => 'required|integer|min:1',
            'aplica_fines_semana' => self::REQUIRED_BOOLEAN,
            'recargo_fin_semana' => self::NULLABLE_NUMERIC,
            'activa' => self::REQUIRED_BOOLEAN,
        ]);
        $tarifa->update($validated);
        return redirect()->route('tarifas.index')->with('success', 'Tarifa actualizada exitosamente');
    }

    // Elimina una tarifa
    public function destroy(Tarifa $tarifa)
    {
        $tarifa->delete();
        return redirect()->route('tarifas.index')->with('success', 'Tarifa eliminada exitosamente');
    }
}
