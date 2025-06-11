<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalles del Pago
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto p-6 bg-white rounded shadow mt-6">

        <div class="mb-4">
            <p><strong>Reserva ID:</strong> {{ $pago->reserva_id }}</p>
            <p><strong>Monto:</strong> Q {{ number_format($pago->monto, 2) }}</p>
            <p><strong>Método de Pago:</strong> {{ $pago->metodo_pago }}</p>
            <p><strong>Fecha de Pago:</strong> {{ $pago->fecha_pago }}</p>
            <p><strong>Estado:</strong> {{ ucfirst($pago->estado) }}</p>
            <p><strong>Referencia Bancaria:</strong> {{ $pago->referencia_bancaria ?? 'N/A' }}</p>
            <p><strong>Observaciones:</strong> {{ $pago->observaciones ?? 'N/A' }}</p>
        </div>

        @if ($pago->comprobante)
            <div class="mb-4">
                <h3 class="text-lg font-semibold mb-2">Comprobante</h3>
                <p><strong>Nombre Archivo:</strong> {{ $pago->comprobante->nombre_archivo }}</p>
                <p><strong>Tipo:</strong> {{ $pago->comprobante->tipo_archivo }}</p>
                <p><strong>Tamaño:</strong> {{ $pago->comprobante->tamaño_archivo }} KB</p>
                <img src="{{ asset('storage/' . $pago->comprobante->ruta_archivo) }}" alt="Comprobante" class="max-w-md border rounded mt-2">
            </div>
        @endif

        <form action="{{ route('pagos.verificar', $pago->id) }}" method="POST" class="mt-6">
            @csrf
            @method('PATCH')  {{-- Indica que el método HTTP es PATCH --}}
            
            <label for="estado" class="block font-semibold mb-2">Cambiar Estado:</label>
            <select name="estado" id="estado" class="border px-3 py-2 rounded mb-4">
                <option value="pendiente" {{ $pago->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="verificado" {{ $pago->estado == 'verificado' ? 'selected' : '' }}>Verificado</option>
                <option value="rechazado" {{ $pago->estado == 'rechazado' ? 'selected' : '' }}>Rechazado</option>
            </select>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Guardar Cambios
            </button>
        </form>

        <a href="{{ route('pagos.index') }}" class="inline-block mt-6 text-blue-600 hover:underline">
            ← Volver al listado
        </a>
    </div>
</x-app-layout>
