<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Salón
        </h2>
    </x-slot>

    <div class="container mx-auto mt-6 px-4 max-w-3xl">
        <h1 class="text-2xl font-bold mb-6">Editar Salón: {{ $salon->nombre }}</h1>

        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-100 text-red-700 rounded shadow">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('salones.update', $salon) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 font-semibold mb-2">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $salon->nombre) }}" 
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="capacidad_maxima" class="block text-gray-700 font-semibold mb-2">Capacidad Máxima</label>
                <input type="number" name="capacidad_maxima" id="capacidad_maxima" value="{{ old('capacidad_maxima', $salon->capacidad_maxima) }}" min="1"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="precio_base" class="block text-gray-700 font-semibold mb-2">Precio Base</label>
                <input type="number" step="0.01" name="precio_base" id="precio_base" value="{{ old('precio_base', $salon->precio_base) }}" min="0"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="estado" class="block text-gray-700 font-semibold mb-2">Estado</label>
                <select name="estado" id="estado" 
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="disponible" {{ old('estado', $salon->estado) == 'disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="ocupado" {{ old('estado', $salon->estado) == 'ocupado' ? 'selected' : '' }}>Ocupado</option>
                    <option value="mantenimiento" {{ old('estado', $salon->estado) == 'mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="imagen_principal" class="block text-gray-700 font-semibold mb-2">Imagen Principal</label>
                @if($salon->imagen_principal)
                    <img src="{{ asset('storage/' . $salon->imagen_principal) }}" alt="{{ $salon->nombre }}" class="mb-4 w-48 h-32 object-cover rounded">
                @endif
                <input type="file" name="imagen_principal" id="imagen_principal" accept="image/*"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-sm text-gray-500 mt-1">Si subes una nueva imagen, reemplazará la actual.</p>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('salones.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                    Cancelar
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
