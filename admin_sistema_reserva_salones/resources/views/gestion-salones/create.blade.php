<!-- Estilos Aurora específicos para esta vista -->
    <style>
        /* Fondo Aurora usando CSS puro */
        .aurora-bg {
            background: linear-gradient(-45deg, #0f172a, #1e293b, #134e4a, #064e3b);
            background-size: 400% 400%;
            animation: aurora-flow 15s ease-in-out infinite;
        }
        
        @keyframes aurora-flow {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        /* Animaciones usando clases de Tailwind */
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
        
        /* Mejoras específicas para inputs */
        input:focus, textarea:focus, select:focus {
            outline: none;
        }
        
        /* Checkbox personalizado para que funcione con las clases de Tailwind */
        input[type="checkbox"]:checked {
            background-color: #22c55e !important;
            border-color: #22c55e !important;
        }
        
        /* Select dropdown mejorado */
        select option {
            background-color: #1e293b !important;
            color: white !important;
        }
        
        /* Responsive - ocultar partículas en móviles */
        @media (max-width: 768px) {
            .particles {
                display: none;
            }
        }
    </style>

    <!-- Script simplificado para efectos básicos -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Agregar partículas dinámicamente (solo en desktop)
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

            // Crear partículas cada 4 segundos
            setInterval(createParticle, 4000);

            // Validación visual para capacidades
            const capacidadMinima = document.getElementById('capacidad_minima');
            const capacidadMaxima = document.getElementById('capacidad_maxima');

            function validateCapacities() {
                const min = parseInt(capacidadMinima.value) || 0;
                const max = parseInt(capacidadMaxima.value) || 0;
                
                if (min > 0 && max > 0 && min > max) {
                    capacidadMaxima.classList.add('border-red-400');
                    capacidadMinima.classList.add('border-red-400');
                    capacidadMaxima.classList.remove('border-white/30');
                    capacidadMinima.classList.remove('border-white/30');
                } else {
                    capacidadMaxima.classList.remove('border-red-400');
                    capacidadMinima.classList.remove('border-red-400');
                    capacidadMaxima.classList.add('border-white/30');
                    capacidadMinima.classList.add('border-white/30');
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

            // Scroll al primer error si existe
            const firstError = document.querySelector('.border-red-400');
            if (firstError) {
                setTimeout(() => {
                    firstError.scrollIntoView({ 
                        behavior: 'smooth', 
                        block: 'center' 
                    });
                }, 100);
            }
        });
    </script><x-app-layout>
    <x-slot name="header">
        <!-- Header con efectos Aurora -->
        <div class="relative overflow-hidden rounded-lg">
            <!-- Fondo Aurora para el header -->
            <div class="absolute inset-0 bg-gradient-to-r from-cosmic-900 via-cosmic-800 to-aurora-900 opacity-90"></div>
            <div class="relative px-6 py-4">
                <div class="flex items-center space-x-4">
                    <!-- Icono Aurora -->
                    <div class="animate-float">
                        <svg class="w-8 h-8 text-aurora-400" viewBox="0 0 24 24" fill="none">
                            <defs>
                                <linearGradient id="headerGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#22c55e"/>
                                    <stop offset="100%" style="stop-color:#059669"/>
                                </linearGradient>
                            </defs>
                            <path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5" stroke="url(#headerGradient)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h2 class="font-display font-bold text-2xl gradient-text">
                        Creación de Salones
                    </h2>
                </div>
            </div>
        </div>
    </x-slot>

    <!-- Fondo Aurora para toda la página -->
    <div class="aurora-bg fixed inset-0 z-0"></div>
    
    <!-- Partículas flotantes -->
    <div class="particles fixed inset-0 pointer-events-none z-10">
        <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
        <div class="particle" style="left: 30%; animation-delay: 2s;"></div>
        <div class="particle" style="left: 50%; animation-delay: 4s;"></div>
        <div class="particle" style="left: 70%; animation-delay: 6s;"></div>
        <div class="particle" style="left: 90%; animation-delay: 8s;"></div>
    </div>

    <div class="relative z-20 max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Contenedor principal con efecto glass -->
        <div class="backdrop-blur-xl bg-white/10 border border-green-400/30 shadow-2xl rounded-2xl p-8 opacity-0 animate-fade-in">
            <!-- Header de la sección -->
            <div class="text-center mb-8">
                <div class="animate-bounce inline-block mb-4">
                    <svg class="w-16 h-16 mx-auto" viewBox="0 0 80 80" fill="none">
                        <defs>
                            <linearGradient id="mainGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#22c55e"/>
                                <stop offset="50%" style="stop-color:#10b981"/>
                                <stop offset="100%" style="stop-color:#059669"/>
                            </linearGradient>
                        </defs>
                        <circle cx="40" cy="40" r="35" fill="none" stroke="url(#mainGradient)" stroke-width="2" opacity="0.3" />
                        <path d="M25 40h30M40 25v30M30 30l20 20M50 30L30 50" stroke="url(#mainGradient)" stroke-width="2" stroke-linecap="round"/>
                        <circle cx="40" cy="40" r="8" fill="url(#mainGradient)" opacity="0.6"/>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold bg-gradient-to-r from-green-400 via-green-300 to-green-500 bg-clip-text text-transparent mb-2">Crear Nuevo Salón</h1>
                <p class="text-white/70">Configura los detalles del nuevo espacio para eventos</p>
            </div>

            <!-- Botón regresar -->
            <div class="mb-6">
                <a href="{{ route('salones.index') }}" 
                   class="group inline-flex items-center space-x-2 text-green-300 hover:text-green-200 transition-colors duration-300">
                    <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <span class="font-medium">Regresar a Salones</span>
                </a>
            </div>

            <!-- Mensajes de error -->
            @if($errors->any())
                <div class="mb-6 p-4 bg-red-500/20 border border-red-500/50 rounded-xl backdrop-blur-sm opacity-0 animate-fade-in">
                    <div class="flex items-center space-x-2 mb-2">
                        <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-red-300 font-semibold">Se encontraron errores:</h3>
                    </div>
                    <ul class="list-disc list-inside text-red-200 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulario principal -->
            <form action="{{ route('salones.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Información Básica -->
                <div class="backdrop-blur-xl bg-white/10 border border-green-400/30 shadow-2xl p-6 rounded-xl hover:bg-white/15 hover:border-green-400/50 transition-all duration-300">
                    <h3 class="text-xl font-bold text-green-300 mb-6 flex items-center space-x-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Información Básica</span>
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nombre -->
                        <div class="md:col-span-2">
                            <label for="nombre" class="block font-semibold text-white mb-2 flex items-center space-x-2">
                                <span>Nombre del Salón</span>
                                <span class="text-green-400">*</span>
                            </label>
                            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                                class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/30 text-white placeholder-white/50 
                                       focus:border-green-400 focus:ring-2 focus:ring-green-400/50 focus:bg-white/20 
                                       backdrop-blur-sm transition-all duration-300 @error('nombre') border-red-400 @enderror"
                                placeholder="Ej: Salón Aurora Premium"
                                required maxlength="150">
                            @error('nombre')
                                <p class="text-red-400 text-sm mt-2 flex items-center space-x-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01"></path>
                                    </svg>
                                    <span>{{ $message }}</span>
                                </p>
                            @enderror
                        </div>

                        <!-- Descripción -->
                        <div class="md:col-span-2">
                            <label for="descripcion" class="block font-semibold text-white mb-2">Descripción</label>
                            <textarea name="descripcion" id="descripcion" rows="4"
                                class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/30 text-white placeholder-white/50 
                                       focus:border-green-400 focus:ring-2 focus:ring-green-400/50 focus:bg-white/20 
                                       backdrop-blur-sm transition-all duration-300 resize-none @error('descripcion') border-red-400 @enderror"
                                placeholder="Describe las características y ambiente del salón...">{{ old('descripcion') }}</textarea>
                            @error('descripcion')
                                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
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
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Capacidad Mínima -->
                        <div>
                            <label for="capacidad_minima" class="block font-semibold text-white mb-2">Capacidad Mínima</label>
                            <div class="relative">
                                <input type="number" name="capacidad_minima" id="capacidad_minima" min="1"
                                    value="{{ old('capacidad_minima', 1) }}"
                                    class="w-full px-4 py-3 pl-10 rounded-lg bg-white/10 border border-white/30 text-white 
                                           focus:border-green-400 focus:ring-2 focus:ring-green-400/50 focus:bg-white/20 
                                           backdrop-blur-sm transition-all duration-300 @error('capacidad_minima') border-red-400 @enderror">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('capacidad_minima')
                                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Capacidad Máxima -->
                        <div>
                            <label for="capacidad_maxima" class="block font-semibold text-white mb-2 flex items-center space-x-1">
                                <span>Capacidad Máxima</span>
                                <span class="text-green-400">*</span>
                            </label>
                            <div class="relative">
                                <input type="number" name="capacidad_maxima" id="capacidad_maxima" required min="1"
                                    value="{{ old('capacidad_maxima') }}"
                                    class="w-full px-4 py-3 pl-10 rounded-lg bg-white/10 border border-white/30 text-white 
                                           focus:border-green-400 focus:ring-2 focus:ring-green-400/50 focus:bg-white/20 
                                           backdrop-blur-sm transition-all duration-300 @error('capacidad_maxima') border-red-400 @enderror">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('capacidad_maxima')
                                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Precio Base -->
                        <div>
                            <label for="precio_base" class="block font-semibold text-white mb-2 flex items-center space-x-1">
                                <span>Precio Base</span>
                                <span class="text-green-400">*</span>
                            </label>
                            <div class="relative">
                                <input type="number" step="0.01" name="precio_base" id="precio_base" required min="0"
                                    value="{{ old('precio_base') }}"
                                    class="w-full px-4 py-3 pl-10 rounded-lg bg-white/10 border border-white/30 text-white 
                                           focus:border-green-400 focus:ring-2 focus:ring-green-400/50 focus:bg-white/20 
                                           backdrop-blur-sm transition-all duration-300 @error('precio_base') border-red-400 @enderror">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-white/50 font-medium">Q</span>
                                </div>
                            </div>
                            @error('precio_base')
                                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Área en metros -->
                        <div>
                            <label for="area_metros" class="block font-semibold text-white mb-2">Área (m²)</label>
                            <div class="relative">
                                <input type="number" step="0.01" name="area_metros" id="area_metros" min="0"
                                    value="{{ old('area_metros') }}"
                                    class="w-full px-4 py-3 pr-12 rounded-lg bg-white/10 border border-white/30 text-white 
                                           focus:border-green-400 focus:ring-2 focus:ring-green-400/50 focus:bg-white/20 
                                           backdrop-blur-sm transition-all duration-300 @error('area_metros') border-red-400 @enderror">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="text-white/50 text-sm font-medium">m²</span>
                                </div>
                            </div>
                            @error('area_metros')
                                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
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
                        @foreach (['aire_acondicionado' => 'Aire Acondicionado', 'proyector' => 'Proyector', 'sonido' => 'Sistema de Sonido', 'cocina' => 'Área de Cocina'] as $key => $label)
                            <label class="backdrop-blur-sm bg-white/5 border border-white/20 p-4 rounded-lg cursor-pointer transition-all duration-300 hover:bg-white/15 hover:border-green-400/50 group">
                                <div class="flex items-center space-x-3">
                                    <input type="hidden" name="tiene_{{ $key }}" value="0">
                                    <input type="checkbox" name="tiene_{{ $key }}" id="tiene_{{ $key }}"
                                        class="w-5 h-5 text-green-500 bg-white/10 border-white/30 rounded focus:ring-green-400 focus:ring-2"
                                        value="1" {{ old('tiene_'.$key) ? 'checked' : '' }}>
                                    <div class="flex items-center space-x-2">
                                        @if($key === 'aire_acondicionado')
                                            <svg class="w-5 h-5 text-green-300 group-hover:text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                                            </svg>
                                        @elseif($key === 'proyector')
                                            <svg class="w-5 h-5 text-green-300 group-hover:text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                            </svg>
                                        @elseif($key === 'sonido')
                                            <svg class="w-5 h-5 text-green-300 group-hover:text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M9 21H4a1 1 0 01-1-1v-4a1 1 0 011-1h5l4-4V8l-4-4z"></path>
                                            </svg>
                                        @else
                                            <svg class="w-5 h-5 text-green-300 group-hover:text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                            </svg>
                                        @endif
                                        <span class="text-white font-medium group-hover:text-green-200 transition-colors">{{ $label }}</span>
                                    </div>
                                </div>
                            </label>
                        @endforeach
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
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Imagen Principal -->
                        <div>
                            <label for="imagen_principal" class="block font-semibold text-white mb-2">Imagen Principal</label>
                            <div class="relative">
                                <input type="file" name="imagen_principal" id="imagen_principal" accept="image/*"
                                    class="w-full px-4 py-3 rounded-lg bg-white/10 border-2 border-dashed border-white/30 text-white 
                                           file:mr-4 file:py-2 file:px-4 file:border-0 file:rounded-lg file:bg-green-500/20 
                                           file:text-green-300 file:font-medium hover:file:bg-green-500/30 
                                           focus:border-green-400 transition-all duration-300">
                            </div>
                            @error('imagen_principal')
                                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Galería -->
                        <div>
                            <label for="galeria_imagenes" class="block font-semibold text-white mb-2">Galería de Imágenes</label>
                            <div class="relative">
                                <input type="file" name="galeria_imagenes[]" id="galeria_imagenes" accept="image/*" multiple
                                    class="w-full px-4 py-3 rounded-lg bg-white/10 border-2 border-dashed border-white/30 text-white 
                                           file:mr-4 file:py-2 file:px-4 file:border-0 file:rounded-lg file:bg-green-500/20 
                                           file:text-green-300 file:font-medium hover:file:bg-green-500/30 
                                           focus:border-green-400 transition-all duration-300">
                            </div>
                            @error('galeria_imagenes')
                                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
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
                                   backdrop-blur-sm transition-all duration-300 @error('estado') border-red-400 @enderror"
                            required>
                            <option value="activo" class="bg-slate-800 text-white" {{ old('estado') == 'activo' ? 'selected' : '' }}>🟢 Activo</option>
                            <option value="inactivo" class="bg-slate-800 text-white" {{ old('estado') == 'inactivo' ? 'selected' : '' }}>🔴 Inactivo</option>
                            <option value="mantenimiento" class="bg-slate-800 text-white" {{ old('estado') == 'mantenimiento' ? 'selected' : '' }}>🔧 Mantenimiento</option>
                        </select>
                        @error('estado')
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                        @enderror
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
                        <span>Guardar Salón</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Estilos Aurora específicos para esta vista -->
    <style>
        /* Texto gradiente */
        .gradient-text {
            background: linear-gradient(135deg, #22c55e, #10b981, #059669);
            background-size: 200% 200%;
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            animation: gradient-shift 3s ease-in-out infinite;
        }
        
        @keyframes gradient-shift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        /* Efecto glass */
        .glass-effect {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(34, 197, 94, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }
        
        .glass-effect:hover {
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(34, 197, 94, 0.4);
            transform: translateY(-2px);
        }
        
        /* Botones con efecto */
        .glow-button {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .glow-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }
        
        .glow-button:hover::before {
            left: 100%;
        }
        
        /* Animaciones suaves */
        .animate-float {
            animation: float 4s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 0.8s ease forwards;
        }
        
        @keyframes fadeIn {
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
        
        /* Colores personalizados */
        .aurora-50 { color: #f0fdf4; }
        .aurora-100 { color: #dcfce7; }
        .aurora-200 { color: #bbf7d0; }
        .aurora-300 { color: #86efac; }
        .aurora-400 { color: #4ade80; }
        .aurora-500 { color: #22c55e; }
        .aurora-600 { color: #16a34a; }
        .aurora-700 { color: #15803d; }
        .aurora-800 { color: #166534; }
        .aurora-900 { color: #14532d; }
        
        .cosmic-800 { background-color: #1e293b; }
        .cosmic-900 { background-color: #0f172a; }
        
        .electric-500 { color: #3b82f6; }
        .electric-600 { color: #2563eb; }
        
        /* Mejoras en inputs y formularios */
        input:focus, textarea:focus, select:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
        }
        
        /* Checkbox personalizado */
        input[type="checkbox"]:checked {
            background-color: #22c55e;
            border-color: #22c55e;
        }
        
        /* File input mejorado */
        input[type="file"]::file-selector-button {
            background: rgba(34, 197, 94, 0.2);
            color: #86efac;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 500;
            margin-right: 16px;
            transition: all 0.3s ease;
        }
        
        input[type="file"]::file-selector-button:hover {
            background: rgba(34, 197, 94, 0.3);
            transform: translateY(-1px);
        }
        
        /* Select dropdown mejorado */
        select option {
            background-color: #1e293b;
            color: white;
            padding: 8px;
        }
        
        /* Responsive improvements */
        @media (max-width: 768px) {
            .glass-effect {
                margin: 0 1rem;
            }
            
            .particles {
                display: none; /* Ocultar partículas en móviles para mejor rendimiento */
            }
        }
        
        /* Focus states mejorados */
        .glass-effect:focus-within {
            border-color: rgba(34, 197, 94, 0.6);
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
        }
    </style>

    <!-- Script para efectos dinámicos -->
    <script>
        // Agregar partículas dinámicamente
        function createParticle() {
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

        // Crear partículas cada 4 segundos
        setInterval(createParticle, 4000);

        // Animación de entrada para elementos
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                }
            });
        });

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        // Validación en tiempo real para capacidades
        const capacidadMinima = document.getElementById('capacidad_minima');
        const capacidadMaxima = document.getElementById('capacidad_maxima');

        function validateCapacities() {
            const min = parseInt(capacidadMinima.value) || 0;
            const max = parseInt(capacidadMaxima.value) || 0;
            
            if (min > 0 && max > 0 && min > max) {
                capacidadMaxima.style.borderColor = '#ef4444';
                capacidadMinima.style.borderColor = '#ef4444';
            } else {
                capacidadMaxima.style.borderColor = '';
                capacidadMinima.style.borderColor = '';
            }
        }

        if (capacidadMinima && capacidadMaxima) {
            capacidadMinima.addEventListener('input', validateCapacities);
            capacidadMaxima.addEventListener('input', validateCapacities);
        }

        // Efecto hover mejorado para checkboxes
        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            const label = checkbox.closest('label');
            if (label) {
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        label.style.background = 'rgba(34, 197, 94, 0.15)';
                        label.style.borderColor = 'rgba(34, 197, 94, 0.4)';
                    } else {
                        label.style.background = '';
                        label.style.borderColor = '';
                    }
                });
            }
        });

        // Preview de imágenes (opcional)
        function previewImage(input, previewId) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById(previewId);
                    if (preview) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Scroll suave al primer error
        document.addEventListener('DOMContentLoaded', function() {
            const firstError = document.querySelector('.border-red-400');
            if (firstError) {
                firstError.scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'center' 
                });
            }
        });
    </script>
</x-app-layout> Fondo Aurora */
        .aurora-bg {
            background: linear-gradient(-45deg, #0f172a, #1e293b, #134e4a, #064e3b);
            background-size: 400% 400%;
            animation: aurora-flow 15s ease-in-out infinite;
        }
        
        @keyframes aurora-flow {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        /*