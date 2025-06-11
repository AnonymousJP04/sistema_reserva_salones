<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Reservas Pendientes
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-6">
                @if($reservas->count())
                    <table class="min-w-full table-auto text-sm">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class="px-4 py-2">Código</th>
                                <th class="px-4 py-2">Salón</th>
                                <th class="px-4 py-2">Fecha</th>
                                <th class="px-4 py-2">Hora</th>
                                <th class="px-4 py-2">Personas</th>
                                <th class="px-4 py-2">Estado</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservas as $reserva)
                                <tr class="border-t">
                                    <td class="px-4 py-2">{{ $reserva->codigo_reserva }}</td>
                                    <td class="px-4 py-2">{{ $reserva->salon->nombre }}</td>
                                    <td class="px-4 py-2">{{ $reserva->fecha_reserva }}</td>
                                    <td class="px-4 py-2">{{ $reserva->hora_inicio }} - {{ $reserva->hora_fin }}</td>
                                    <td class="px-4 py-2">{{ $reserva->numero_personas }}</td>
                                    <td class="px-4 py-2 text-yellow-600">{{ ucfirst($reserva->estado) }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('reservas.show', $reserva->id) }}" class="text-blue-600 hover:underline">Ver</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $reservas->links() }}
                    </div>
                @else
                    <p class="text-gray-600">No hay reservas pendientes.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
