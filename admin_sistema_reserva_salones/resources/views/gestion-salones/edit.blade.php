<x-app-layout>
    <x-slot name="header">
        <!-- Header con efectos Aurora -->
        <div class="relative overflow-hidden rounded-lg">
            <!-- Fondo Aurora para el header -->
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-800 to-green-900 opacity-90"></div>
            <div class="relative px-6 py-4">
                <div class="flex items-center space-x-4">
                    <!-- Icono Aurora -->
                    <div class="animate-bounce">
                        <svg class="w-8 h-8 text-green-400" viewBox="0 0 24 24" fill="none">
                            <defs>
                                <linearGradient id="editGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#22c55e"/>
                                    <stop offset="100%" style="stop-color:#059669"/>
                                </linearGradient>
                            </defs>
                            <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7" stroke="url(#editGradient)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="m18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" stroke="url(#editGradient)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h2 class="font-bold text-2xl bg-gradient-to-r from-green-400 via-green-300 to-green-500 bg-clip-text text-transparent">
                        Editar Salón
                    </h2>
                </div>
            </div>
        </div>
    </x-slot>

    <!-- Fondo Aurora para toda la página -->
    <div class="aurora-bg fixed inset-0 z-0"></div>
    
    <!-- Partículas flotantes -->
    <div class="particles fixed inset-0 pointer-events-none z-10">
        <div class="particle" style="left: 15%; animation-delay: 0s;"></div>
        <div class="particle" style="left: 35%; animation-delay: 2s;"></div>
        <div class="particle" style="left: 55%; animation-delay: 4s;"></div>
        <div class="particle" style="left: 75%; animation-delay: 6s;"></div>
        <div class="particle" style="left: 85%; animation-delay: 8s;"></div>
    </div>

    <div class="relative z-20 container mx-auto mt-6 px-4 max-w-4xl">
        <!-- Contenedor principal con efecto glass -->
        <div class="backdrop-blur-xl bg-white/10 border border-green-400/30 shadow-2xl rounded-2xl p-8 opacity-0 animate-fade-in">
            
            <!-- Header de la sección con icono del salón -->
            <div class="text-center mb-8">
                <div class="animate-bounce inline-block mb-4">
                    <svg class="w-16 h-16 mx-auto" viewBox="0 0 80 80" fill="none">
                        <defs>
                            <linearGradient id="salonGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#22c55e"/>
                                <stop offset="50%" style="stop-color:#10b981"/>
                                <stop offset="100%" style="stop-color:#059669"/>
                            </linearGradient>
                        </defs>
                        <circle cx="40" cy="40" r="35" fill="none" stroke="url(#salonGradient)" stroke-width="2" opacity="0.3" />
                        <rect x="20" y="25" width="40" height="30" fill="none" stroke="url(#salonGradient)" stroke-width="2" rx="4"/>
                        <path d="M30 35h20M30 40h15M30 45h25" stroke="url(#salonGradient)" stroke-width="1.5" stroke-linecap="round"/>
                        <circle cx="40" cy="40" r="3" fill="url(#salonGradient)" opacity="0.6"/>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold bg-gradient-to-r from-green-400 via-green-300 to-green-500 bg-clip-text text-transparent mb-2">
                    Editar Salón: {{ $salon->nombre }}
                </h1>
                <p class="text-white/70">Modifica los detalles y configuración del salón</p>
            </div>

            <!-- Mensajes de error -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-500/20 border border-red-500/50 rounded-xl backdrop-blur-sm opacity-0 animate-fade-in">
                    <div class="flex items-center space-x-2 mb-2">
                        <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-red-300 font-semibold">Se encontraron errores:</h3>
                    </div>
                    <ul class="list-disc list-inside text-red-200 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulario de edición -->
            <form action="{{ route('salones.update', $salon) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')

                <!-- Información Básica -->
                <div class="backdrop-blur-xl bg-white/10 border border-green-400/30 shadow-2xl p-6 rounded-xl hover:bg-white/15 hover:border-green-400/50 transition-all duration-300">
                    <h3 class="text-xl font-bold text-green-300 mb-6 flex items-center space-x-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Información Básica</span>
                    </h3>
                    
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Nombre -->
                        <div>
                            <label for="nombre" class="block font-semibold text-white mb-2 flex items-center space-x-2">
                                <span>Nombre del Salón</span>
                                <span class="text-green-400">*</span>
                            </label>
                            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $salon->nombre) }}"
                                class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/30 text-white placeholder-white/50 
                                       focus:border-green-400 focus:ring-2 focus:ring-green-400/50 focus:bg-white/20 
                                       backdrop-blur-sm transition-all duration-300"
                                required>
                        </div>

                        <!-- Descripción -->
                        <div>
                            <label for="descripcion" class="block font-semibold text-white mb-2">Descripción</label>
                            <textarea name="descripcion" id="descripcion" rows="4"
                                class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/30 text-white placeholder-white/50 
                                       focus:border-green-400 focus:ring-2 focus:ring-green-400/50 focus:bg-white/20 
                                       backdrop-blur-sm transition-all duration-300 resize-none"
                                required>{{ old('descripcion', $salon->descripcion) }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Capacidad y Precios -->
                <div class="backdrop-blur-xl bg-white/10 border border-green-400/30 shadow-2xl p-6 rounded-xl hover:bg-white/15 hover:border-green-400/50 transition-all duration-300">
                    <h3 class="text-xl font-bold text-green-300 mb-6 flex items-center space-x-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span>Capacidad y Tarifas</span>
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Capacidad Mínima -->
                        <div>
                            <label for="capacidad_minima" class="block font-semibold text-white mb-2">Capacidad Mínima</label>
                            <div class="relative">
                                <input type="number" name="capacidad_minima" id="capacidad_minima" min="1" 
                                    value="{{ old('capacidad_minima', $salon->capacidad_minima) }}"
                                    class="w-full px-4 py-3 pl-10 rounded-lg bg-white/10 border border-white/30 text-white 
                                           focus:border-green-400 focus:ring-2 focus:ring-green-400/50 focus:bg-white/20 
                                           backdrop-blur-sm transition-all duration-300" required>
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Capacidad Máxima -->
                        <div>
                            <label for="capacidad_maxima" class="block font-semibold text-white mb-2 flex items-center space-x-1">
                                <span>Capacidad Máxima</span>
                                <span class="text-green-400">*</span>
                            </label>
                            <div class="relative">
                                <input type="number" name="capacidad_maxima" id="capacidad_maxima" min="1" 
                                    value="{{ old('capacidad_maxima', $salon->capacidad_maxima) }}"
                                    class="w-full px-4 py-3 pl-10 rounded-lg bg-white/10 border border-white/30 text-white 
                                           focus:border-green-400 focus:ring-2 focus:ring-green-400/50 focus:bg-white/20 
                                           backdrop-blur-sm transition-all duration-300" required>
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Precio Base -->
                        <div>
                            <label for="precio_base" class="block font-semibold text-white mb-2 flex items-center space-x-1">
                                <span>Precio Base</span>
                                <span class="text-green-400">*</span>
                            </label>
                            <div class="relative">
                                <input type="number" step="0.01" name="precio_base" id="precio_base" min="0" 
                                    value="{{ old('precio_base', $salon->precio_base) }}"
                                    class="w-full px-4 py-3 pl-10 rounded-lg bg-white/10 border border-white/30 text-white 
                                           focus:border-green-400 focus:ring-2 focus:ring-green-400/50 focus:bg-white/20 
                                           backdrop-blur-sm transition-all duration-300" required>
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-white/50 font-medium">$</span>
                                </div>
                            </div>
                        </div>

                        <!-- Área en metros -->
                        <div>
                            <label for="area_metros" class="block font-semibold text-white mb-2">Área (m²)</label>
                            <div class="relative">
                                <input type="number" step="0.1" name="area_metros" id="area_metros" min="0" 
                                    value="{{ old('area_metros', $salon->area_metros) }}"
                                    class="w-full px-4 py-3 pr-12 rounded-lg bg-white/10 border border-white/30 text-white 
                                           focus:border-green-400 focus:ring-2 focus:ring-green-400/50 focus:bg-white/20 
                                           backdrop-blur-sm transition-all duration-300">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="text-white/50 text-sm font-medium">m²</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Estado -->
                <div class="backdrop-blur-xl bg-white/10 border border-green-400/30 shadow-2xl p-6 rounded-xl hover:bg-white/15 hover:border-green-400/50 transition-all duration-300">
                    <h3 class="text-xl font-bold text-green-300 mb-6 flex items-center space-x-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Estado del Salón</span>
                    </h3>
                    
                    <div class="max-w-md">
                        <label for="estado" class="block font-semibold text-white mb-2 flex items-center space-x-1">
                            <span>Estado</span>
                            <span class="text-green-400">*</span>
                        </label>
                        <select name="estado" id="estado"
                            class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/30 text-white 
                                   focus:border-green-400 focus:ring-2 focus:ring-green-400/50 focus:bg-white/20 
                                   backdrop-blur-sm transition-all duration-300" required>
                            <option value="activo" class="bg-slate-800 text-white" {{ old('estado', $salon->estado) == 'activo' ? 'selected' : '' }}>🟢 Disponible</option>
                            <option value="inactivo" class="bg-slate-800 text-white" {{ old('estado', $salon->estado) == 'inactivo' ? 'selected' : '' }}>🔴 Inactivo</option>
                            <option value="mantenimiento" class="bg-slate-800 text-white" {{ old('estado', $salon->estado) == 'mantenimiento' ? 'selected' : '' }}>🔧 Mantenimiento</option>
                        </select>
                    </div>
                </div>

                <!-- Servicios y Amenidades -->
                <div class="backdrop-blur-xl bg-white/10 border border-green-400/30 shadow-2xl p-6 rounded-xl hover:bg-white/15 hover:border-green-400/50 transition-all duration-300">
                    <h3 class="text-xl font-bold text-green-300 mb-6 flex items-center space-x-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                        <span>Servicios y Amenidades</span>
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Aire Acondicionado -->
                        <label class="backdrop-blur-sm bg-white/5 border border-white/20 p-4 rounded-lg cursor-pointer transition-all duration-300 hover:bg-white/15 hover:border-green-400/50 group">
                            <div class="flex items-center space-x-3">
                                <input type="checkbox" name="tiene_aire_acondicionado" value="1"
                                    {{ old('tiene_aire_acondicionado', $salon->tiene_aire_acondicionado) ? 'checked' : '' }}
                                    class="w-5 h-5 text-green-500 bg-white/10 border-white/30 rounded focus:ring-green-400 focus:ring-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-green-300 group-hover:text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                                    </svg>
                                    <span class="text-white font-medium group-hover:text-green-200 transition-colors">Aire Acondicionado</span>
                                </div>
                            </div>
                        </label>

                        <!-- Proyector -->
                        <label class="backdrop-blur-sm bg-white/5 border border-white/20 p-4 rounded-lg cursor-pointer transition-all duration-300 hover:bg-white/15 hover:border-green-400/50 group">
                            <div class="flex items-center space-x-3">
                                <input type="checkbox" name="tiene_proyector" value="1"
                                    {{ old('tiene_proyector', $salon->tiene_proyector) ? 'checked' : '' }}
                                    class="w-5 h-5 text-green-500 bg-white/10 border-white/30 rounded focus:ring-green-400 focus:ring-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-green-300 group-hover:text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="text-white font-medium group-hover:text-green-200 transition-colors">Proyector</span>
                                </div>
                            </div>
                        </label>

                        <!-- Sistema de Sonido -->
                        <label class="backdrop-blur-sm bg-white/5 border border-white/20 p-4 rounded-lg cursor-pointer transition-all duration-300 hover:bg-white/15 hover:border-green-400/50 group">
                            <div class="flex items-center space-x-3">
                                <input type="checkbox" name="tiene_sonido" value="1"
                                    {{ old('tiene_sonido', $salon->tiene_sonido) ? 'checked' : '' }}
                                    class="w-5 h-5 text-green-500 bg-white/10 border-white/30 rounded focus:ring-green-400 focus:ring-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-green-300 group-hover:text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M9 21H4a1 1 0 01-1-1v-4a1 1 0 011-1h5l4-4V8l-4-4z"></path>
                                    </svg>
                                    <span class="text-white font-medium group-hover:text-green-200 transition-colors">Sistema de Sonido</span>
                                </div>
                            </div>
                        </label>

                        <!-- Área de Cocina -->
                        <label class="backdrop-blur-sm bg-white/5 border border-white/20 p-4 rounded-lg cursor-pointer transition-all duration-300 hover:bg-white/15 hover:border-green-400/50 group">
                            <div class="flex items-center space-x-3">
                                <input type="checkbox" name="tiene_cocina" value="1"
                                    {{ old('tiene_cocina', $salon->tiene_cocina) ? 'checked' : '' }}
                                    class="w-5 h-5 text-green-500 bg-white/10 border-white/30 rounded focus:ring-green-400 focus:ring-2">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-5 h-5 text-green-300 group-hover:text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                    </svg>
                                    <span class="text-white font-medium group-hover:text-green-200 transition-colors">Área de Cocina</span>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Imágenes -->
                <div class="backdrop-blur-xl bg-white/10 border border-green-400/30 shadow-2xl p-6 rounded-xl hover:bg-white/15 hover:border-green-400/50 transition-all duration-300">
                    <h3 class="text-xl font-bold text-green-300 mb-6 flex items-center space-x-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>Imágenes del Salón</span>
                    </h3>
                    
                    <div class="space-y-6">
                        <!-- Imagen Principal -->
                        <div>
                            <label for="imagen_principal" class="block font-semibold text-white mb-3">Imagen Principal</label>
                            
                            @if($salon->imagen_principal)
                                <div class="mb-4 p-4 backdrop-blur-sm bg-white/5 rounded-lg border border-white/20">
                                    <p class="text-green-300 text-sm mb-2 flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>Imagen actual:</span>
                                    </p>
                                    <img src="{{ asset('storage/' . $salon->imagen_principal) }}" 
                                         alt="{{ $salon->nombre }}" 
                                         class="w-48 h-32 object-cover rounded-lg border border-green-400/30 shadow-lg">
                                </div>
                            @endif
                            
                            <div class="relative">
                                <input type="file" name="imagen_principal" id="imagen_principal" accept="image/*"
                                    class="w-full px-4 py-3 rounded-lg bg-white/10 border-2 border-dashed border-white/30 text-white 
                                           file:mr-4 file:py-2 file:px-4 file:border-0 file:rounded-lg file:bg-green-500/20 
                                           file:text-green-300 file:font-medium hover:file:bg-green-500/30 
                                           focus:border-green-400 transition-all duration-300">
                            </div>
                            <p class="text-white/60 text-sm mt-2">Si subes una nueva imagen, reemplazará la actual.</p>
                        </div>

                        <!-- Galería -->
                        <div>
                            <label for="galeria_imagenes" class="block font-semibold text-white mb-3">Galería de Imágenes</label>
                            
                            @if(is_array($salon->galeria_imagenes) && count($salon->galeria_imagenes) > 0)
                                <div class="mb-4 p-4 backdrop-blur-sm bg-white/5 rounded-lg border border-white/20">
                                    <p class="text-green-300 text-sm mb-3 flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                        </svg>
                                        <span>Galería actual:</span>
                                    </p>
                                    <div class="flex flex-wrap gap-3">
                                        @foreach($salon->galeria_imagenes as $imagen)
                                            <img src="{{ asset('storage/' . $imagen) }}" 
                                                 alt="Galería" 
                                                 class="w-24 h-16 rounded-lg border border-green-400/30 object-cover shadow-lg hover:scale-105 transition-transform duration-300">
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            
                            <div class="relative">
                                <input type="file" name="galeria_imagenes[]" id="galeria_imagenes" accept="image/*" multiple
                                    class="w-full px-4 py-3 rounded-lg bg-white/10 border-2 border-dashed border-white/30 text-white 
                                           file:mr-4 file:py-2 file:px-4 file:border-0 file:rounded-lg file:bg-green-500/20 
                                           file:text-green-300 file:font-medium hover:file:bg-green-500/30 
                                           focus:border-green-400 transition-all duration-300">
                            </div>
                            <p class="text-white/60 text-sm mt-2">Puedes subir varias imágenes para la galería.</p>
                        </div>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="flex flex-col sm:flex-row gap-4 justify-end pt-6">
                    <a href="{{ route('salones.index') }}" 
                       class="backdrop-blur-sm bg-white/10 hover:bg-white/20 text-white font-semibold py-3 px-8 rounded-xl 
                              border border-white/30 hover:border-white/50 transition-all duration-300 text-center">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="relative overflow-hidden bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 
                               text-white font-semibold py-3 px-8 rounded-xl shadow-lg transition-all duration-300 
                               flex items-center justify-center space-x-2 group
                               before:absolute before:top-0 before:-left-full before:w-full before:h-full 
                               before:bg-gradient-to-r before:from-transparent before:via-white/20 before:to-transparent 
                               hover:before:left-full before:transition-all before:duration-500">
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Guardar Cambios</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Estilos Aurora específicos -->
    <style>
        /* Fondo Aurora */
        .aurora-bg {
            background: linear-gradient(-45deg, #0f172a, #1e293b, #134e4a, #064e3b);
            background-size: 400% 400%;
            animation: aurora-flow 15s ease-in-out infinite;
        }
        
        @keyframes aurora-flow {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        /* Animaciones */
        .animate-fade-in {
            animation: fadeIn 0.8s ease forwards;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Partículas */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            pointer-events: none;
            z-index: 10;
        }
        
        .particle {
            position: absolute;
            width: 2px;
            height: 2px;
            background: #22c55e;
            border-radius: 50%;
            opacity: 0.6;
            animation: particle-float 12s linear infinite;
        }
        
        @keyframes particle-float {
            0% { 
                transform: translateY(100vh) translateX(0);
                opacity: 0;
            }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { 
                transform: translateY(-10vh) translateX(100px);
                opacity: 0;
            }
        }
        
        /* Mejoras específicas */
        input:focus, textarea:focus, select:focus {
            outline: none;
        }
        
        input[type="checkbox"]:checked {
            background-color: #22c55e !important;
            border-color: #22c55e !important;
        }
        
        select option {
            background-color: #1e293b !important;
            color: white !important;
        }
        
        @media (max-width: 768px) {
            .particles {
                display: none;
            }
        }
    </style>

    <!-- Script para efectos -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Crear partículas
            function createParticle() {
                if (window.innerWidth > 768) {
                    const particle = document.createElement('div');
                    particle.className = 'particle';
                    particle.style.left = Math.random() * 100 + '%';
                    particle.style.animationDelay = Math.random() * 2 + 's';
                    particle.style.animationDuration = (Math.random() * 8 + 8) + 's';
                    
                    const particlesContainer = document.querySelector('.particles');
                    if (particlesContainer) {
                        particlesContainer.appendChild(particle);
                        setTimeout(() => {
                            if (particle.parentNode) {
                                particle.remove();
                            }
                        }, 12000);
                    }
                }
            }

            setInterval(createParticle, 4000);

            // Validación de capacidades
            const capacidadMinima = document.getElementById('capacidad_minima');
            const capacidadMaxima = document.getElementById('capacidad_maxima');

            function validateCapacities() {
                const min = parseInt(capacidadMinima.value) || 0;
                const max = parseInt(capacidadMaxima.value) || 0;
                
                if (min > 0 && max > 0 && min > max) {
                    capacidadMaxima.classList.add('border-red-400');
                    capacidadMinima.classList.add('border-red-400');
                } else {
                    capacidadMaxima.classList.remove('border-red-400');
                    capacidadMinima.classList.remove('border-red-400');
                }
            }

            if (capacidadMinima && capacidadMaxima) {
                capacidadMinima.addEventListener('input', validateCapacities);
                capacidadMaxima.addEventListener('input', validateCapacities);
            }

            // Efecto visual para checkboxes
            document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                const label = checkbox.closest('label');
                if (label) {
                    // Estado inicial
                    if (checkbox.checked) {
                        label.classList.add('bg-green-500/15', 'border-green-400/50');
                        label.classList.remove('bg-white/5', 'border-white/20');
                    }
                    
                    checkbox.addEventListener('change', function() {
                        if (this.checked) {
                            label.classList.add('bg-green-500/15', 'border-green-400/50');
                            label.classList.remove('bg-white/5', 'border-white/20');
                        } else {
                            label.classList.remove('bg-green-500/15', 'border-green-400/50');
                            label.classList.add('bg-white/5', 'border-white/20');
                        }
                    });
                }
            });
        });
    </script>
</x-app-layout>
