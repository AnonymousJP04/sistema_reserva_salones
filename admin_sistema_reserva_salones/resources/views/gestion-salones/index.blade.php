<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestión de Salones
        </h2>
    </x-slot>

    <div class="container mx-auto mt-6 px-4">
        <h1 class="text-2xl font-bold mb-4">Lista de Salones</h1>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded shadow">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('salones.create') }}" 
           class="inline-block mb-4 px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            Crear Nuevo Salón
        </a>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                <thead>
                    <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Imagen Principal</th>
                        <th class="py-3 px-6 text-left">Nombre</th>
                        <th class="py-3 px-6 text-left">Capacidad Máxima</th>
                        <th class="py-3 px-6 text-left">Precio Base</th>
                        <th class="py-3 px-6 text-left">Estado</th>
                        <th class="py-3 px-6 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm divide-y divide-gray-200">
                    @foreach($salones as $salon)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-6">
                                @if($salon->imagen_principal)
                                    <img src="{{ asset('storage/' . $salon->imagen_principal) }}" alt="{{ $salon->nombre }}" class="w-24 h-16 object-cover rounded">
                                @else
                                    <span class="text-gray-400 italic">No hay imagen</span>
                                @endif
                            </td>
                            <td class="py-3 px-6">{{ $salon->nombre }}</td>
                            <td class="py-3 px-6">{{ $salon->capacidad_maxima }}</td>
                            <td class="py-3 px-6">${{ number_format($salon->precio_base, 2) }}</td>
                            <td class="py-3 px-6">{{ ucfirst($salon->estado) }}</td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('salones.show', $salon) }}" class="text-blue-600 hover:underline">Ver más</a>
                                    <a href="{{ route('salones.edit', $salon) }}" class="text-yellow-600 hover:underline">Editar</a>
                                    <form action="{{ route('salones.destroy', $salon) }}" method="POST" onsubmit="return confirm('¿Eliminar salón?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $salones->links() }}
        </div>
    </div>
</x-app-layout>
