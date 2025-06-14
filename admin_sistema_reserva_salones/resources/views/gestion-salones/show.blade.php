<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-transparent bg-clip-text bg-gradient-to-r from-emerald-200 via-green-300 to-emerald-400 leading-tight flex items-center gap-3 animate-aurora-glow">
            <div class="relative">
                <svg class="w-10 h-10 text-emerald-300 animate-aurora-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                <div class="absolute inset-0 w-10 h-10 bg-emerald-300/30 rounded-full animate-aurora-ring"></div>
            </div>
            {{ $salon->nombre }}
            <div class="ml-auto flex items-center gap-2 text-sm font-normal text-emerald-200/80">
                <div class="w-2 h-2 bg-emerald-400 rounded-full animate-aurora-blink"></div>
                Detalles del Salón
            </div>
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        body { font-family: 'Inter', sans-serif; }
        
        .aurora-bg {
            background: linear-gradient(135deg, 
                #0f172a 0%, #1e293b 25%, #0f766e 50%, 
                #134e4a 75%, #0f172a 100%);
            background-size: 400% 400%;
            animation: aurora-admin-flow 20s ease-in-out infinite;
            min-height: 100vh;
            width: 100vw;
            position: fixed;
            top: 0; left: 0;
            z-index: -20;
            overflow: hidden;
        }
        
        .aurora-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 80%, rgba(6, 78, 59, 0.3) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(14, 116, 144, 0.2) 0%, transparent 50%),
                        radial-gradient(circle at 40% 40%, rgba(34, 197, 94, 0.1) 0%, transparent 50%);
            animation: aurora-admin-radial 15s ease-in-out infinite alternate;
        }
        
        @keyframes aurora-admin-flow {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        @keyframes aurora-admin-radial {
            0% { transform: scale(1) rotate(0deg); opacity: 0.8; }
            100% { transform: scale(1.1) rotate(180deg); opacity: 0.6; }
        }
        
        .animate-aurora-glow {
            animation: aurora-glow 3s ease-in-out infinite alternate;
        }
        
        @keyframes aurora-glow {
            0% { 
                text-shadow: 0 0 5px rgba(34, 197, 94, 0.5), 0 0 10px rgba(34, 197, 94, 0.3), 0 0 15px rgba(34, 197, 94, 0.1);
                transform: translateY(0px);
            }
            100% { 
                text-shadow: 0 0 10px rgba(34, 197, 94, 0.8), 0 0 20px rgba(34, 197, 94, 0.5), 0 0 30px rgba(34, 197, 94, 0.3);
                transform: translateY(-2px);
            }
        }
        
        .animate-aurora-pulse {
            animation: aurora-pulse 2s infinite;
        }
        
        @keyframes aurora-pulse {
            0%, 100% { 
                filter: drop-shadow(0 0 5px rgba(34, 197, 94, 0.5));
                transform: scale(1);
            }
            50% { 
                filter: drop-shadow(0 0 20px rgba(34, 197, 94, 0.8)) drop-shadow(0 0 30px rgba(16, 185, 129, 0.4));
                transform: scale(1.05);
            }
        }
        
        .animate-aurora-ring {
            animation: aurora-ring 2s infinite;
        }
        
        @keyframes aurora-ring {
            0% { 
                transform: scale(0.8); 
                opacity: 0.8;
                box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.4);
            }
            50% { 
                transform: scale(1.2); 
                opacity: 0.4;
                box-shadow: 0 0 0 10px rgba(34, 197, 94, 0.1);
            }
            100% { 
                transform: scale(1.5); 
                opacity: 0;
                box-shadow: 0 0 0 20px rgba(34, 197, 94, 0);
            }
        }
        
        .animate-aurora-blink {
            animation: aurora-blink 2s infinite;
        }
        
        @keyframes aurora-blink {
            0%, 50% { opacity: 1; box-shadow: 0 0 5px rgba(34, 197, 94, 0.8); }
            25%, 75% { opacity: 0.3; box-shadow: 0 0 2px rgba(34, 197, 94, 0.4); }
        }
        
        .aurora-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(34, 197, 94, 0.2);
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.1),
                0 0 20px rgba(34, 197, 94, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .aurora-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.2),
                0 0 30px rgba(34, 197, 94, 0.3);
            border-color: rgba(34, 197, 94, 0.4);
        }
        
        .aurora-badge {
            position: relative;
            overflow: hidden;
        }
        
        .aurora-badge::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: badge-shine 2s infinite;
        }
        
        @keyframes badge-shine {
            0% { left: -100%; }
            100% { left: 100%; }
        }
        
        .animate-fadeInUp { 
            animation: fadeInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
            opacity: 0;
        }
        
        @keyframes fadeInUp { 
            0% { opacity: 0; transform: translateY(30px) scale(0.95); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }
        
        .gallery-image {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .gallery-image:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(34, 197, 94, 0.3);
        }
        
        .gallery-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(34, 197, 94, 0.2), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }
        
        .gallery-image:hover::before {
            opacity: 1;
        }
        
        .main-image {
            position: relative;
            overflow: hidden;
            border-radius: 1rem;
        }
        
        .main-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.1), transparent 50%, rgba(16, 185, 129, 0.1));
            pointer-events: none;
        }
        
        .feature-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .feature-badge.active {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.2), rgba(16, 185, 129, 0.2));
            color: #22c55e;
            border: 1px solid rgba(34, 197, 94, 0.3);
            box-shadow: 0 0 15px rgba(34, 197, 94, 0.2);
        }
        
        .feature-badge.inactive {
            background: rgba(107, 114, 128, 0.2);
            color: #9ca3af;
            border: 1px solid rgba(107, 114, 128, 0.3);
        }
        
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 9999px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-size: 0.875rem;
            position: relative;
            overflow: hidden;
        }
        
        .status-badge.active {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.2), rgba(16, 185, 129, 0.2));
            color: #059669;
            border: 2px solid rgba(34, 197, 94, 0.4);
            box-shadow: 0 0 20px rgba(34, 197, 94, 0.3);
        }
        
        .status-badge.inactive {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.2), rgba(220, 38, 38, 0.2));
            color: #dc2626;
            border: 2px solid rgba(239, 68, 68, 0.4);
            box-shadow: 0 0 20px rgba(239, 68, 68, 0.3);
        }
        
        .info-row {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-radius: 0.75rem;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(34, 197, 94, 0.1);
            transition: all 0.3s ease;
        }
        
        .info-row:hover {
            background: rgba(34, 197, 94, 0.05);
            border-color: rgba(34, 197, 94, 0.2);
            transform: translateX(5px);
        }
        
        .aurora-section {
            position: relative;
            z-index: 1;
        }
        
        .back-button {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.1), rgba(16, 185, 129, 0.1));
            border: 1px solid rgba(34, 197, 94, 0.3);
            color: #22c55e;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }
        
        .back-button:hover {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.2), rgba(16, 185, 129, 0.2));
            border-color: rgba(34, 197, 94, 0.5);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(34, 197, 94, 0.2);
        }
        
        @media (max-width: 768px) {
            .aurora-bg {
                background-size: 300% 300%;
            }
            
            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .info-row {
                flex-direction: column;
                text-align: center;
            }
            
            .info-row svg {
                margin-bottom: 0.5rem;
            }
        }
    </style>

    <div class="aurora-bg"></div>

    <div class="py-8 relative z-10 aurora-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Botón de regreso -->
            <div class="mb-8 animate-fadeInUp">
                <a href="{{ route('salones.index') }}" class="back-button">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Regresar a Salones
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                
                <!-- Sección de Imágenes -->
                <div class="space-y-6">
                    
                    <!-- Imagen Principal -->
                    <div class="aurora-card rounded-2xl overflow-hidden animate-fadeInUp" style="animation-delay: 0.1s;">
                        <div class="bg-gradient-to-r from-emerald-500/20 to-green-500/20 px-6 py-4 border-b border-emerald-400/20">
                            <h3 class="text-xl font-bold text-emerald-200 flex items-center gap-3">
                                <svg class="w-6 h-6 text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Imagen Principal
                            </h3>
                        </div>
                        <div class="p-6 flex justify-center items-center min-h-[300px]">
                            @if($salon->imagen_principal)
                                <div class="main-image w-full max-w-md">
                                    <img src="{{ asset('storage/' . $salon->imagen_principal) }}" 
                                         alt="{{ $salon->nombre }}" 
                                         class="w-full h-80 object-cover rounded-xl shadow-lg">
                                </div>
                            @else
                                <div class="text-center py-12">
                                    <svg class="w-16 h-16 text-emerald-300/50 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <p class="text-emerald-200/70 text-lg">No hay imagen principal</p>
                                    <p class="text-emerald-300/50 text-sm mt-1">La imagen se mostrará aquí cuando esté disponible</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Galería de Imágenes -->
                    <div class="aurora-card rounded-2xl overflow-hidden animate-fadeInUp" style="animation-delay: 0.2s;">
                        <div class="bg-gradient-to-r from-blue-500/20 to-cyan-500/20 px-6 py-4 border-b border-blue-400/20">
                            <h3 class="text-xl font-bold text-blue-200 flex items-center gap-3">
                                <svg class="w-6 h-6 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                                Galería de Imágenes

                                
                               {{-- Galería de imágenes --}}
                            @php
                                $galeria = is_array($salon->galeria_imagenes) 
                                    ? $salon->galeria_imagenes 
                                    : json_decode($salon->galeria_imagenes, true);
                            @endphp

                            @if(is_array($galeria) && count($galeria) > 0)
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 gallery-grid mt-6">
                                    @foreach($galeria as $index => $imagen)
                                        <div class="gallery-image rounded-lg overflow-hidden cursor-pointer" onclick="openCarousel({{ $index }})">
                                            <img src="{{ asset('storage/' . $imagen) }}" class="w-full h-32 object-cover">
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Carrusel Modal -->
                                <div id="carouselModal" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 hidden overflow-auto">
                                    <span class="absolute top-4 right-8 text-white text-4xl cursor-pointer z-50" onclick="closeCarousel()">&times;</span>
                                    <button id="prevBtn" onclick="changeImage(-1)" class="absolute left-4 top-1/2 -translate-y-1/2 text-white text-4xl px-2 py-1 bg-black bg-opacity-30 rounded-full z-50 hover:bg-opacity-60">&#8592;</button>
                                    <img id="carouselImage"
                                        src=""
                                        class="object-contain max-h-screen max-w-screen bg-white rounded-lg shadow-2xl border-4 border-white"
                                        style="display: block; margin: 0 auto;" />
                                    <button id="nextBtn" onclick="changeImage(1)" class="absolute right-4 top-1/2 -translate-y-1/2 text-white text-4xl px-2 py-1 bg-black bg-opacity-30 rounded-full z-50 hover:bg-opacity-60">&#8594;</button>
                                    <div id="carouselCounter" class="absolute bottom-6 left-1/2 -translate-x-1/2 text-white bg-black bg-opacity-40 px-4 py-1 rounded-lg text-lg"></div>
                                </div>

                                <script>
                                    const galeria = @json(array_map(fn($img) => asset('storage/' . $img), $galeria));
                                    let currentIndex = 0;

                                    function openCarousel(index) {
                                        currentIndex = index;
                                        showCarouselImage();
                                        document.getElementById('carouselModal').classList.remove('hidden');
                                    }

                                    function closeCarousel() {
                                        document.getElementById('carouselModal').classList.add('hidden');
                                    }

                                    function changeImage(direction) {
                                        currentIndex += direction;
                                        if (currentIndex < 0) currentIndex = galeria.length - 1;
                                        if (currentIndex >= galeria.length) currentIndex = 0;
                                        showCarouselImage();
                                    }

                                    function showCarouselImage() {
                                        document.getElementById('carouselImage').src = galeria[currentIndex];
                                        document.getElementById('carouselCounter').innerText = (currentIndex + 1) + ' / ' + galeria.length;
                                    }

                                    // Cerrar modal al hacer clic fuera de la imagen
                                    document.addEventListener('DOMContentLoaded', function() {
                                        document.getElementById('carouselModal').addEventListener('click', function(e) {
                                            if (e.target === this) closeCarousel();
                                        });
                                        // Navegación con flechas del teclado
                                        document.addEventListener('keydown', function(e) {
                                            const modal = document.getElementById('carouselModal');
                                            if (!modal.classList.contains('hidden')) {
                                                if (e.key === 'ArrowLeft') changeImage(-1);
                                                if (e.key === 'ArrowRight') changeImage(1);
                                                if (e.key === 'Escape') closeCarousel();
                                            }
                                        });
                                    });
                                </script>
                            @else
                                <div class="text-center py-12">
                                    <p>No hay imágenes en la galería</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Información del Salón -->
                <div class="space-y-6">
                    
                    <!-- Información General -->
                    <div class="aurora-card rounded-2xl overflow-hidden animate-fadeInUp" style="animation-delay: 0.3s;">
                        <div class="bg-gradient-to-r from-emerald-500/20 to-green-500/20 px-6 py-4 border-b border-emerald-400/20">
                            <h3 class="text-xl font-bold text-emerald-200 flex items-center gap-3">
                                <svg class="w-6 h-6 text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Información General
                            </h3>
                        </div>
                        <div class="p-6 space-y-4">
                            
                            <!-- Descripción -->
                            <div class="info-row">
                                <div class="flex items-start gap-4 w-full">
                                    <svg class="w-6 h-6 text-emerald-400 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                                    </svg>
                                    <div class="flex-1">
                                        <strong class="text-emerald-200">Descripción:</strong>
                                        <p class="text-emerald-100/80 mt-1">{{ $salon->descripcion ?? 'Sin descripción disponible' }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Capacidad -->
                            <div class="info-row">
                                <div class="flex items-center gap-4 w-full">
                                    <svg class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    <div class="flex-1">
                                        <strong class="text-blue-200">Capacidad:</strong>
                                        <div class="flex items-center gap-4 mt-1">
                                            <span class="text-blue-100/80">Mínima: {{ $salon->capacidad_minima }} personas</span>
                                            <span class="text-blue-100/80">Máxima: {{ $salon->capacidad_maxima }} personas</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Precio -->
                            <div class="info-row">
                                <div class="flex items-center gap-4 w-full">
                                    <svg class="w-6 h-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <div class="flex-1">
                                        <strong class="text-green-200">Precio Base:</strong>
                                        <span class="text-green-100/80 ml-2 text-xl font-bold">Q{{ number_format($salon->precio_base, 2) }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Área -->
                            <div class="info-row">
                                <div class="flex items-center gap-4 w-full">
                                    <svg class="w-6 h-6 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                                    </svg>
                                    <div class="flex-1">
                                        <strong class="text-purple-200">Área:</strong>
                                        <span class="text-purple-100/80 ml-2">{{ $salon->area_metros ?? 'No especificado' }} m²</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Características -->
                    <div class="aurora-card rounded-2xl overflow-hidden animate-fadeInUp" style="animation-delay: 0.4s;">
                        <div class="bg-gradient-to-r from-blue-500/20 to-indigo-500/20 px-6 py-4 border-b border-blue-400/20">
                            <h3 class="text-xl font-bold text-blue-200 flex items-center gap-3">
                                <svg class="w-6 h-6 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Características y Equipamiento
                            </h3>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                
                                <!-- Aire Acondicionado -->
                                <div class="feature-badge {{ $salon->tiene_aire_acondicionado ? 'active' : 'inactive' }}">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/>
                                    </svg>
                                    Aire Acondicionado
                                    @if($salon->tiene_aire_acondicionado)
                                        <svg class="w-4 h-4 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                    @else
                                        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                        </svg>
                                    @endif
                                </div>

                                <!-- Proyector -->
                                <div class="feature-badge {{ $salon->tiene_proyector ? 'active' : 'inactive' }}">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                    </svg>
                                    Proyector
                                    @if($salon->tiene_proyector)
                                        <svg class="w-4 h-4 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                    @else
                                        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                        </svg>
                                    @endif
                                </div>

                                <!-- Sistema de Sonido -->
                                <div class="feature-badge {{ $salon->tiene_sonido ? 'active' : 'inactive' }}">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.899a9 9 0 010 12.727M9 5l7 7-7 7V5z"/>
                                    </svg>
                                    Sistema de Sonido
                                    @if($salon->tiene_sonido)
                                        <svg class="w-4 h-4 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                    @else
                                        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                        </svg>
                                    @endif
                                </div>

                                <!-- Cocina -->
                                <div class="feature-badge {{ $salon->tiene_cocina ? 'active' : 'inactive' }}">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Cocina Equipada
                                    @if($salon->tiene_cocina)
                                        <svg class="w-4 h-4 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                    @else
                                        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                        </svg>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Estado del Salón -->
                    <div class="aurora-card rounded-2xl overflow-hidden animate-fadeInUp" style="animation-delay: 0.5s;">
                        <div class="bg-gradient-to-r from-purple-500/20 to-pink-500/20 px-6 py-4 border-b border-purple-400/20">
                            <h3 class="text-xl font-bold text-purple-200 flex items-center gap-3">
                                <svg class="w-6 h-6 text-purple-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Estado del Salón
                            </h3>
                        </div>
                        <div class="p-6 text-center">
                            <div class="status-badge {{ $salon->estado === 'activo' ? 'active' : 'inactive' }} mx-auto">
                                @if($salon->estado === 'activo')
                                    <svg class="w-5 h-5 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ ucfirst($salon->estado) }}
                                @else
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ ucfirst($salon->estado) }}
                                @endif
                            </div>
                            <p class="text-white/70 mt-4 text-sm">
                                @if($salon->estado === 'activo')
                                    Este salón está disponible para reservaciones
                                @else
                                    Este salón no está disponible actualmente
                                @endif
                            </p>
                        </div>
                    </div>

                    <!-- Botón de Acción Administrativo -->
                    <div class="flex justify-center animate-fadeInUp" style="animation-delay: 0.6s;">
                        <a href="{{ route('salones.edit', $salon->slug) }}" 
                           class="aurora-card rounded-xl px-8 py-4 text-center hover:scale-105 transition-all duration-300 group flex items-center gap-3 bg-gradient-to-r from-blue-500/10 to-indigo-500/10 border-blue-400/30">
                            <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center group-hover:bg-blue-500/30 transition-colors">
                                <svg class="w-5 h-5 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </div>
                            <div class="text-left">
                                <span class="text-white font-semibold text-lg block">Editar Salón</span>
                                <p class="text-blue-200/70 text-sm">Modificar información y configuración</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Métricas Administrativas -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Total de Reservas Históricas -->
                <div class="aurora-card rounded-2xl p-6 text-center animate-fadeInUp" style="animation-delay: 0.7s;">
                    <div class="w-16 h-16 bg-gradient-to-r from-emerald-400 to-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-emerald-200 mb-2">Reservas Históricas</h4>
                    <p class="text-3xl font-bold text-white mb-1">{{ $salon->reservas()->count() }}</p>
                    <p class="text-emerald-300/70 text-sm">Total de reservaciones realizadas</p>
                    <div class="mt-3 text-xs text-emerald-200/60">
                        Desde la creación del salón
                    </div>
                </div>

                <!-- Tasa de Ocupación Calculada -->
                <div class="aurora-card rounded-2xl p-6 text-center animate-fadeInUp" style="animation-delay: 0.8s;">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-400 to-cyan-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-blue-200 mb-2">Tasa de Ocupación</h4>
                    @php
                        $diasDesdeCreacion = $salon->created_at ? $salon->created_at->diffInDays(now()) : 30;
                        $totalReservas = $salon->reservas()->count();
                        $tasaOcupacion = $diasDesdeCreacion > 0 ? min(100, round(($totalReservas / max($diasDesdeCreacion, 1)) * 100, 1)) : 0;
                    @endphp
                    <p class="text-3xl font-bold text-white mb-1">{{ $tasaOcupacion }}%</p>
                    <p class="text-blue-300/70 text-sm">Promedio de días ocupados</p>
                    {{-- <div class="mt-3 text-xs text-blue-200/60">
                        Basado en {{ $diasDesdeCreacion }} días activo
                    </div> --}}
                </div>

                <!-- Puntuación Administrativa -->
                <div class="aurora-card rounded-2xl p-6 text-center animate-fadeInUp" style="animation-delay: 0.9s;">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-400 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-purple-200 mb-2">Índice de Calidad</h4>
                    @php
                        $caracteristicasActivas = 0;
                        $caracteristicasActivas += $salon->tiene_aire_acondicionado ? 1 : 0;
                        $caracteristicasActivas += $salon->tiene_proyector ? 1 : 0;
                        $caracteristicasActivas += $salon->tiene_sonido ? 1 : 0;
                        $caracteristicasActivas += $salon->tiene_cocina ? 1 : 0;
                        $indiceCalidad = round(($caracteristicasActivas / 4) * 100);
                        $puntajeEstrella = round(($indiceCalidad / 100) * 5, 1);
                    @endphp
                    <div class="flex items-center justify-center mb-1">
                        <p class="text-3xl font-bold text-white mr-2">{{ $puntajeEstrella }}</p>
                        <div class="flex text-purple-400">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-5 {{ $i <= floor($puntajeEstrella) ? 'fill-current' : 'text-gray-400' }}" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endfor
                        </div>
                    </div>
                    <p class="text-purple-300/70 text-sm">Basado en equipamiento</p>
                    <div class="mt-3 text-xs text-purple-200/60">
                        {{ $caracteristicasActivas }}/4 características activas
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Animaciones de entrada escalonadas
        document.addEventListener('DOMContentLoaded', () => {
            const animatedElements = document.querySelectorAll('.animate-fadeInUp');
            animatedElements.forEach((el, index) => {
                el.style.animationDelay = `${index * 0.1}s`;
            });

            // Efecto de hover en las imágenes de la galería
            const galleryImages = document.querySelectorAll('.gallery-image img');
            galleryImages.forEach(img => {
                img.addEventListener('click', () => {
                    // Aquí puedes agregar un modal para ver la imagen en grande
                    console.log('Imagen clickeada:', img.src);
                });
            });

            // Smooth scroll para navegación interna si es necesario
            const internalLinks = document.querySelectorAll('a[href^="#"]');
            internalLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const target = document.querySelector(link.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });

        // Función para mostrar notificación de acción (opcional)
        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 px-6 py-4 rounded-xl shadow-lg z-50 transform translate-x-full transition-transform duration-300 ${
                type === 'success' ? 'bg-emerald-500/90 text-white' : 'bg-red-500/90 text-white'
            }`;
            notification.innerHTML = `
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    ${message}
                </div>
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);
            
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }, 3000);
        }
    </script>
</x-app-layout>