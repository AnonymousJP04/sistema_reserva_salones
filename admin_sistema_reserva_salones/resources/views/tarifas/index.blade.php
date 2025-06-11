<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Listado de Tarifas
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('tarifas.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Nueva Tarifa
            </a>
        </div>

        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Salón</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo Evento</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio Hora</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio Medio Día</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio Día Completo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vigente Desde</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vigente Hasta</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Horas Mínimas</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fines de Semana</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Recargo Fin Semana</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Activa</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($tarifas as $tarifa)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $tarifa->salon->nombre ?? 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $tarifa->nombre }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $tarifa->tipo_evento ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">Q {{ number_format($tarifa->precio_por_hora, 2) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">Q {{ number_format($tarifa->precio_medio_dia, 2) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">Q {{ number_format($tarifa->precio_dia_completo, 2) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $tarifa->vigente_desde->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $tarifa->vigente_hasta->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $tarifa->horas_minimas }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $tarifa->aplica_fines_semana ? 'Sí' : 'No' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">Q {{ number_format($tarifa->recargo_fin_semana, 2) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $tarifa->activa ? 'Sí' : 'No' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap space-x-2">
                                <a href="{{ route('tarifas.edit', $tarifa->id) }}" class="text-blue-600 hover:underline">Editar</a>
                                <form action="{{ route('tarifas.destroy', $tarifa->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar tarifa?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="13" class="text-center py-4">No hay tarifas registradas.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $tarifas->links() }}
        </div>
    </div>
</x-app-layout>
