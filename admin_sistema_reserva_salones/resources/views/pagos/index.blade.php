<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Pagos
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-6 bg-white shadow mt-6 rounded">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr class="bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Reserva ID</th>
                    <th class="px-4 py-3">Monto</th>
                    <th class="px-4 py-3">Método</th>
                    <th class="px-4 py-3">Fecha</th>
                    <th class="px-4 py-3">Estado</th>
                    <th class="px-4 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($pagos as $pago)
                    <tr>
                        <td class="px-4 py-3">{{ $pago->id }}</td>
                        <td class="px-4 py-3">{{ $pago->reserva_id }}</td>
                        <td class="px-4 py-3">Q {{ number_format($pago->monto, 2) }}</td>
                        <td class="px-4 py-3">{{ $pago->metodo_pago }}</td>
                        <td class="px-4 py-3">{{ $pago->fecha_pago }}</td>
                        <td class="px-4 py-3">
                            <span class="inline-block px-2 py-1 text-xs font-semibold rounded 
                                @if ($pago->estado == 'pendiente') bg-yellow-100 text-yellow-800 
                                @elseif ($pago->estado == 'verificado') bg-green-100 text-green-800 
                                @elseif ($pago->estado == 'rechazado') bg-red-100 text-red-800 
                                @endif">
                                {{ ucfirst($pago->estado) }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <a href="{{ route('pagos.show', $pago->id) }}" class="text-blue-600 hover:underline">
                                Ver más
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $pagos->links() }}
        </div>
    </div>
</x-app-layout>
