<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Reserva;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    // Muestra todos los pagos
    public function index()
    {
        $pagos = Pago::with('reserva')->orderBy('fecha_pago', 'desc')->paginate(15);
        return view('pagos.index', compact('pagos'));
    }

    // Muestra el formulario para crear un nuevo pago
    public function create()
    {
        $reservas = Reserva::where('estado', 'aprobada')->get();
        return view('pagos.create', compact('reservas'));
    }

    // Guarda un nuevo pago en la base de datos
    public function store(Request $request)
    {
        $validated = $request->validate([
            'reserva_id' => 'required|exists:pub_reservas,id',
            'monto' => 'required|numeric|min:0',
            'fecha_pago' => 'required|date',
            'metodo_pago' => 'required|string|max:50',
            'referencia_bancaria' => 'nullable|string|max:100',
            'estado' => 'required|in:pendiente,verificado,rechazado,reembolsado',
            'observaciones' => 'nullable|string'
        ]);
        Pago::create($validated);
        return redirect()->route('pagos.index')->with('success', 'Pago registrado exitosamente');
    }

    // Muestra un pago específico
    public function show(Pago $pago)
    {
        return view('pagos.show', compact('pago'));
    }

    // Muestra el formulario para editar un pago
    public function edit(Pago $pago)
    {
        $reservas = Reserva::where('estado', 'aprobada')->get();
        return view('pagos.edit', compact('pago', 'reservas'));
    }

    // Actualiza un pago existente
    public function update(Request $request, Pago $pago)
    {
        $validated = $request->validate([
            'reserva_id' => 'required|exists:pub_reservas,id',
            'monto' => 'required|numeric|min:0',
            'fecha_pago' => 'required|date',
            'metodo_pago' => 'required|string|max:50',
            'referencia_bancaria' => 'nullable|string|max:100',
            'estado' => 'required|in:pendiente,verificado,rechazado,reembolsado',
            'observaciones' => 'nullable|string'
        ]);
        $pago->update($validated);
        return redirect()->route('pagos.index')->with('success', 'Pago actualizado exitosamente');
    }

    // Elimina un pago
    public function destroy(Pago $pago)
    {
        $pago->delete();
        return redirect()->route('pagos.index')->with('success', 'Pago eliminado exitosamente');
    }
}
