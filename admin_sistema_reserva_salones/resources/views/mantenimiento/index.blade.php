<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Mantenimientos') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('mantenimientos.create') }}" class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Nuevo Mantenimiento
            </a>

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2">Salón</th>
                            <th class="px-4 py-2">Fecha Inicio</th>
                            <th class="px-4 py-2">Fecha Fin</th>
                            <th class="px-4 py-2">Tipo</th>
                            <th class="px-4 py-2">Proveedor</th>
                            <th class="px-4 py-2">Costo</th>
                            <th class="px-4 py-2">Estado</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($mantenimientos as $mantenimiento)
                            <tr>
                                <td class="px-4 py-2">{{ $mantenimiento->salon->nombre ?? 'N/A' }}</td>
                                <td class="px-4 py-2">{{ $mantenimiento->fecha_inicio }}</td>
                                <td class="px-4 py-2">{{ $mantenimiento->fecha_fin }}</td>
                                <td class="px-4 py-2">{{ $mantenimiento->tipo_mantenimiento }}</td>
                                <td class="px-4 py-2">{{ $mantenimiento->proveedor ?? '-' }}</td>
                                <td class="px-4 py-2">Q {{ number_format($mantenimiento->costo, 2) }}</td>
                                <td class="px-4 py-2">{{ ucfirst($mantenimiento->estado) }}</td>
                                <td class="px-4 py-2 space-x-2">
                                    <a href="{{ route('mantenimientos.edit', $mantenimiento) }}" class="text-yellow-600 hover:underline">Editar</a>
                                    <form action="{{ route('mantenimientos.destroy', $mantenimiento) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Está seguro?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="p-4">
                    {{ $mantenimientos->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
