<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Reservas de Clientes') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Usuario</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Salón</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($reservas as $reserva)
                            <tr>
                                <td class="px-6 py-4">{{ $reserva->id }}</td>
                                <td class="px-6 py-4">{{ $reserva->usuario->name ?? 'N/A' }}</td>
                                <td class="px-6 py-4">{{ $reserva->salon->nombre ?? 'N/A' }}</td>
                                <td class="px-6 py-4">{{ $reserva->fecha }}</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-2 text-xs font-semibold rounded-full
                                        {{ $reserva->estado === 'aprobada' ? 'bg-green-100 text-green-800' : 
                                           ($reserva->estado === 'rechazada' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                        {{ ucfirst($reserva->estado) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('reservas.show', $reserva->id) }}"
                                       class="text-blue-600 hover:text-blue-800 font-medium">
                                        Ver detalles
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                    No hay reservas registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
