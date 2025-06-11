<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Creación de Salones
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-white shadow rounded">
        <h1 class="text-2xl font-bold mb-6">Crear Nuevo Salón</h1>

        <a href="{{ route('salones.index') }}" class="inline-block mb-4 text-sm text-blue-600 hover:underline">
            &larr; Regresar
        </a>

        @if($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('salones.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="nombre" class="block font-medium text-sm text-gray-700">Nombre *</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-blue-200 @error('nombre') border-red-500 @enderror"
                    required maxlength="150">
                @error('nombre')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Input visible para slug (para poder ver y corregir errores) -->
            <div>
                <label for="slug" class="block font-medium text-sm text-gray-700">Slug *</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-blue-200 @error('slug') border-red-500 @enderror"
                    required maxlength="150">
                @error('slug')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="descripcion" class="block font-medium text-sm text-gray-700">Descripción</label>
                <textarea name="descripcion" id="descripcion"
                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-blue-200 @error('descripcion') border-red-500 @enderror">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="capacidad_minima" class="block font-medium text-sm text-gray-700">Capacidad Mínima</label>
                <input type="number" name="capacidad_minima" id="capacidad_minima" min="1"
                    value="{{ old('capacidad_minima', 1) }}"
                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-blue-200 @error('capacidad_minima') border-red-500 @enderror">
                @error('capacidad_minima')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="capacidad_maxima" class="block font-medium text-sm text-gray-700">Capacidad Máxima *</label>
                <input type="number" name="capacidad_maxima" id="capacidad_maxima" required min="1"
                    value="{{ old('capacidad_maxima') }}"
                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-blue-200 @error('capacidad_maxima') border-red-500 @enderror">
                @error('capacidad_maxima')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="precio_base" class="block font-medium text-sm text-gray-700">Precio Base *</label>
                <input type="number" step="0.01" name="precio_base" id="precio_base" required min="0"
                    value="{{ old('precio_base') }}"
                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-blue-200 @error('precio_base') border-red-500 @enderror">
                @error('precio_base')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-2">
                @foreach (['aire_acondicionado', 'proyector', 'sonido', 'cocina'] as $item)
                    <label class="inline-flex items-center">
                        <input type="hidden" name="tiene_{{ $item }}" value="0">
                        <input type="checkbox" name="tiene_{{ $item }}" id="tiene_{{ $item }}"
                            class="form-checkbox text-blue-600"
                            value="1" {{ old('tiene_'.$item) ? 'checked' : '' }}>
                        <span class="ml-2">Tiene {{ ucwords(str_replace('_', ' ', $item)) }}</span>
                    </label>
                @endforeach
            </div>

            <div>
                <label for="area_metros" class="block font-medium text-sm text-gray-700">Área en Metros Cuadrados</label>
                <input type="number" step="0.01" name="area_metros" id="area_metros" min="0"
                    value="{{ old('area_metros') }}"
                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-blue-200 @error('area_metros') border-red-500 @enderror">
                @error('area_metros')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="imagen_principal" class="block font-medium text-sm text-gray-700">Imagen Principal</label>
                <input type="file" name="imagen_principal" id="imagen_principal" accept="image/*"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border file:rounded file:border-gray-300 file:bg-white file:text-gray-700 hover:file:bg-gray-100">
                @error('imagen_principal')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="galeria_imagenes" class="block font-medium text-sm text-gray-700">Galería de Imágenes</label>
                <input type="file" name="galeria_imagenes[]" id="galeria_imagenes" accept="image/*" multiple
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border file:rounded file:border-gray-300 file:bg-white file:text-gray-700 hover:file:bg-gray-100">
                @error('galeria_imagenes')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="estado" class="block font-medium text-sm text-gray-700">Estado *</label>
                <select name="estado" id="estado"
                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-blue-200 @error('estado') border-red-500 @enderror"
                    required>
                    <option value="activo" {{ old('estado') == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ old('estado') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                    <option value="mantenimiento" {{ old('estado') == 'mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
                </select>
                @error('estado')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit"
                    class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-300">
                    Guardar Salón
                </button>
            </div>
        </form>
    </div>

    <script>
        // Actualizar slug automáticamente al cambiar nombre o slug (si se quiere)
        document.getElementById('nombre').addEventListener('input', function() {
            let slugInput = document.getElementById('slug');
            slugInput.value = this.value.toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '') // eliminar caracteres no válidos
                .replace(/\s+/g, '-')     // espacios por guiones
                .replace(/--+/g, '-');    // guiones múltiples a uno solo
        });
    </script>
</x-app-layout>
