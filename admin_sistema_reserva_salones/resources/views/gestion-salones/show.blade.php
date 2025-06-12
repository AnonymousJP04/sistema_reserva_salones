<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalles del Salón: {{ $salon->nombre }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <a href="{{ route('salones.index') }}" 
           class="inline-block mb-6 px-4 py-2 border border-blue-600 text-blue-600 rounded hover:bg-blue-600 hover:text-white transition">
            ← Regresar a Salones
        </a>

        <div class="flex flex-col md:flex-row gap-8">
            <!-- Imagen y Galería -->
            <div class="md:w-1/2 space-y-6">
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="bg-blue-600 text-white px-4 py-2 font-semibold">
                        Imagen Principal
                    </div>
                    <div class="p-4 flex justify-center items-center min-h-[250px]">
                        @if($salon->imagen_principal)
                            <img src="{{ asset('storage/' . $salon->imagen_principal) }}" 
                                 alt="{{ $salon->nombre }}" 
                                 class="max-h-80 rounded object-cover">
                        @else
                            <p class="text-gray-500 italic">No hay imagen principal.</p>
                        @endif
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="bg-gray-700 text-white px-4 py-2 font-semibold">
                        Galería de Imágenes
                    </div>
                    <div class="p-4">
                        @if(is_array($salon->galeria_imagenes) && count($salon->galeria_imagenes) > 0)
                            <div class="flex flex-wrap gap-3 justify-center">
                                @foreach($salon->galeria_imagenes as $imagen)
                                    <img src="{{ asset('storage/' . $imagen) }}" 
                                         alt="Galería" 
                                         class="w-36 h-24 rounded border object-cover shadow-sm">
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 italic text-center">No hay imágenes en la galería.</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Información -->
            <div class="md:w-1/2 bg-white shadow rounded-lg">
                <div class="bg-green-600 text-white px-4 py-2 font-semibold rounded-t-lg">
                    Información del Salón
                </div>
                <div class="p-6 space-y-3 text-gray-700">
                    <p><strong>Descripción:</strong> {{ $salon->descripcion ?? 'Sin descripción' }}</p>
                    <p><strong>Capacidad Mínima:</strong> {{ $salon->capacidad_minima }}</p>
                    <p><strong>Capacidad Máxima:</strong> {{ $salon->capacidad_maxima }}</p>
                    <p><strong>Precio Base:</strong> ${{ number_format($salon->precio_base, 2) }}</p>
                    <p><strong>Área (m²):</strong> {{ $salon->area_metros ?? 'No especificado' }}</p>

                    <hr class="my-4 border-gray-300">

                    <p>
                        <strong>Aire acondicionado:</strong> 
                        <span class="{{ $salon->tiene_aire_acondicionado ? 'bg-blue-500' : 'bg-gray-400' }} 
                                     text-white text-xs font-semibold px-2 py-1 rounded ml-2">
                            {{ $salon->tiene_aire_acondicionado ? 'Sí' : 'No' }}
                        </span>
                    </p>
                    <p>
                        <strong>Proyector:</strong> 
                        <span class="{{ $salon->tiene_proyector ? 'bg-blue-500' : 'bg-gray-400' }} 
                                     text-white text-xs font-semibold px-2 py-1 rounded ml-2">
                            {{ $salon->tiene_proyector ? 'Sí' : 'No' }}
                        </span>
                    </p>
                    <p>
                        <strong>Sonido:</strong> 
                        <span class="{{ $salon->tiene_sonido ? 'bg-blue-500' : 'bg-gray-400' }} 
                                     text-white text-xs font-semibold px-2 py-1 rounded ml-2">
                            {{ $salon->tiene_sonido ? 'Sí' : 'No' }}
                        </span>
                    </p>
                    <p>
                        <strong>Cocina:</strong> 
                        <span class="{{ $salon->tiene_cocina ? 'bg-blue-500' : 'bg-gray-400' }} 
                                     text-white text-xs font-semibold px-2 py-1 rounded ml-2">
                            {{ $salon->tiene_cocina ? 'Sí' : 'No' }}
                        </span>
                    </p>

                    <hr class="my-4 border-gray-300">

                    <p>
                        <strong>Estado:</strong> 
                        <span class="{{ $salon->estado === 'activo' ? 'bg-green-600' : 'bg-red-600' }} 
                                     text-white text-xs font-semibold px-2 py-1 rounded ml-2">
                            {{ ucfirst($salon->estado) }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
