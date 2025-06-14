<x-app-layout>
    <x-slot name="header">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <h2 class="font-bold text-3xl text-transparent bg-clip-text bg-gradient-to-r from-emerald-200 via-green-300 to-emerald-400 leading-tight flex items-center gap-3 animate-aurora-glow">
            <div class="relative">
                <svg class="w-10 h-10 text-emerald-300 animate-aurora-pulse" fill="none" viewBox="0 0 24 24">
                    <defs>
                        <linearGradient id="showGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#6ee7b7"/>
                            <stop offset="50%" stop-color="#22c55e"/>
                            <stop offset="100%" stop-color="#047857"/>
                        </linearGradient>
                        <filter id="show-glow">
                            <feGaussianBlur stdDeviation="3" result="coloredBlur"/>
                            <feMerge> 
                                <feMergeNode in="coloredBlur"/>
                                <feMergeNode in="SourceGraphic"/>
                            </feMerge>
                        </filter>
                    </defs>
                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" 
                          stroke="url(#showGradient)" 
                          stroke-width="2" 
                          stroke-linecap="round" 
                          stroke-linejoin="round"
                          filter="url(#show-glow)" />
                </svg>
                <div class="absolute inset-0 w-10 h-10 bg-emerald-300/30 rounded-full animate-aurora-ring"></div>
            </div>
            {{ __('Detalles del Mantenimiento') }}
            <div class="ml-auto flex items-center gap-2 text-sm font-normal text-emerald-200/80">
                <div class="w-2 h-2 bg-emerald-400 rounded-full animate-aurora-blink"></div>
                Sistema Activo
            </div>
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        body { font-family: 'Inter', sans-serif; }
        
        .aurora-bg {
            background: linear-gradient(-45deg, 
                #0a0f1c, #1a2332, #0d1b2a, 
                #134e4a, #115e59, #064e3b, 
                #22c55e, #10b981, #059669,
                #1a2332, #0a0f1c);
            background-size: 800% 800%;
            animation: aurora-flow 25s ease-in-out infinite;
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
            background: radial-gradient(ellipse at center, transparent 0%, rgba(6, 78, 59, 0.3) 50%, rgba(10, 15, 28, 0.8) 100%);
            animation: aurora-radial 20s ease-in-out infinite alternate;
        }
        
        @keyframes aurora-flow {
            0%, 100% { background-position: 0% 50%; }
            25% { background-position: 100% 25%; }
            50% { background-position: 50% 100%; }
            75% { background-position: 25% 0%; }
        }
        
        @keyframes aurora-radial {
            0% { transform: scale(1) rotate(0deg); opacity: 0.8; }
            100% { transform: scale(1.2) rotate(180deg); opacity: 0.6; }
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
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(34, 197, 94, 0.15);
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.08),
                0 0 20px rgba(34, 197, 94, 0.08);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .aurora-card:hover {
            transform: translateY(-3px);
            box-shadow: 
                0 16px 40px rgba(0, 0, 0, 0.5),
                inset 0 1px 0 rgba(255, 255, 255, 0.12),
                0 0 30px rgba(34, 197, 94, 0.15);
            border-color: rgba(34, 197, 94, 0.25);
        }
        
        .aurora-btn {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.8) 0%, rgba(22, 163, 74, 0.9) 50%, rgba(21, 128, 61, 0.95) 100%);
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid rgba(34, 197, 94, 0.3);
            box-shadow: 0 4px 15px rgba(34, 197, 94, 0.2);
        }
        
        .aurora-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                transparent 0%,
                rgba(255, 255, 255, 0.2) 50%,
                transparent 100%);
            transition: left 0.5s ease;
        }
        
        .aurora-btn:hover::before {
            left: 100%;
        }
        
        .aurora-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(34, 197, 94, 0.3);
            border-color: rgba(34, 197, 94, 0.5);
        }
        
        .aurora-btn-secondary {
            background: linear-gradient(135deg, rgba(107, 114, 128, 0.6) 0%, rgba(75, 85, 99, 0.8) 50%, rgba(55, 65, 81, 0.9) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(107, 114, 128, 0.3);
            box-shadow: 0 4px 15px rgba(107, 114, 128, 0.2);
        }
        
        .aurora-btn-secondary:hover {
            box-shadow: 0 8px 25px rgba(107, 114, 128, 0.3);
            border-color: rgba(107, 114, 128, 0.5);
        }
        
        .aurora-btn-warning {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.8) 0%, rgba(217, 119, 6, 0.9) 50%, rgba(180, 83, 9, 0.95) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(245, 158, 11, 0.3);
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.2);
        }
        
        .aurora-btn-warning:hover {
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
            border-color: rgba(245, 158, 11, 0.5);
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
        
        .fade-in-delay-1 { animation-delay: 0.2s; }
        .fade-in-delay-2 { animation-delay: 0.4s; }
        .fade-in-delay-3 { animation-delay: 0.6s; }

        .estado-programado {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.2), rgba(37, 99, 235, 0.2));
            color: #93c5fd;
            border-color: rgba(59, 130, 246, 0.4);
        }
        
        .estado-en_proceso {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.2), rgba(217, 119, 6, 0.2));
            color: #fcd34d;
            border-color: rgba(245, 158, 11, 0.4);
        }
        
        .estado-completado {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.2), rgba(22, 163, 74, 0.2));
            color: #86efac;
            border-color: rgba(34, 197, 94, 0.4);
        }
        
        .estado-cancelado {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.2), rgba(220, 38, 38, 0.2));
            color: #fca5a5;
            border-color: rgba(239, 68, 68, 0.4);
        }

        @media (max-width: 768px) {
            .aurora-bg {
                background-size: 600% 600%;
            }
        }
    </style>

    <!-- Fondo Aurora -->
    <div class="aurora-bg"></div>

    <div class="py-8 relative z-10">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Breadcrumb -->
            <div class="mb-6 fade-in">
                <nav class="flex items-center gap-2 text-emerald-300/70 text-sm">
                    <a href="{{ route('mantenimientos.index') }}" class="hover:text-emerald-300 transition-colors">Mantenimientos</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-emerald-200">Mantenimiento #{{ $mantenimiento->id }}</span>
                </nav>
            </div>

            <!-- Header principal -->
            <div class="mb-8 fade-in fade-in-delay-1">
                <div class="aurora-card rounded-2xl p-8">
                    <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
                        <div class="flex items-center gap-6">
                            <div class="w-20 h-20 bg-emerald-500/20 rounded-2xl flex items-center justify-center backdrop-blur-sm border border-emerald-400/30">
                                <svg class="w-10 h-10 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-3xl font-bold text-white mb-2">{{ $mantenimiento->tipo_mantenimiento }}</h1>
                                <p class="text-emerald-300 text-lg mb-1">{{ $mantenimiento->salon?->nombre ?? 'Salón no disponible' }}</p>
                                <p class="text-emerald-300/70">
                                    {{ $mantenimiento->fecha_inicio ? $mantenimiento->fecha_inicio->format('d \d\e F, Y') : 'N/D' }} - 
                                    {{ $mantenimiento->fecha_fin ? $mantenimiento->fecha_fin->format('d \d\e F, Y') : 'N/D' }}
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col items-end gap-3">
                            <span class="estado-{{ $mantenimiento->estado }} inline-flex px-4 py-2 rounded-full text-sm font-semibold border backdrop-blur-sm">
                                {{ ucfirst(str_replace('_', ' ', $mantenimiento->estado)) }}
                            </span>
                            @if($mantenimiento->costo)
                                <div class="text-right">
                                    <p class="text-emerald-300/70 text-sm">Costo Total</p>
                                    <p class="text-2xl font-bold text-emerald-400">Q{{ number_format($mantenimiento->costo, 2) }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grid de información -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Información del salón -->
                <div class="lg:col-span-2 fade-in fade-in-delay-2">
                    <div class="aurora-card rounded-2xl p-6">
                        <h2 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                            <svg class="w-6 h-6 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Información del Mantenimiento
                        </h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Fechas y horarios -->
                            <div>
                                <h3 class="text-emerald-300 font-semibold mb-3">Programación</h3>
                                <div class="space-y-3">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <div>
                                            <p class="text-white text-sm">Fecha de Inicio</p>
                                            <p class="text-emerald-300">{{ $mantenimiento->fecha_inicio ? $mantenimiento->fecha_inicio->format('d/m/Y') : 'N/D' }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <div>
                                            <p class="text-white text-sm">Fecha de Fin</p>
                                            <p class="text-emerald-300">{{ $mantenimiento->fecha_fin ? $mantenimiento->fecha_fin->format('d/m/Y') : 'N/D' }}</p>
                                        </div>
                                    </div>
                                    
                                    @if($mantenimiento->hora_inicio && $mantenimiento->hora_fin)
                                        <div class="flex items-center gap-3">
                                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <div>
                                                <p class="text-white text-sm">Horario</p>
                                                <p class="text-emerald-300">{{ $mantenimiento->hora_inicio }} - {{ $mantenimiento->hora_fin }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Detalles adicionales -->
                            <div>
                                <h3 class="text-emerald-300 font-semibold mb-3">Detalles</h3>
                                <div class="space-y-3">
                                    @if($mantenimiento->proveedor)
                                        <div class="flex items-center gap-3">
                                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                            </svg>
                                            <div>
                                                <p class="text-white text-sm">Proveedor</p>
                                                <p class="text-emerald-300">{{ $mantenimiento->proveedor }}</p>
                                            </div>
                                        </div>
                                    @endif
                                    
                                    <div class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <div>
                                            <p class="text-white text-sm">Creado por</p>
                                            <p class="text-emerald-300">{{ $mantenimiento->creador?->name ?? 'Usuario no disponible' }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <div>
                                            <p class="text-white text-sm">Creado el</p>
                                            <p class="text-emerald-300">{{ $mantenimiento->created_at ? $mantenimiento->created_at->format('d/m/Y H:i') : 'N/D' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @if($mantenimiento->descripcion)
                            <div class="mt-6 pt-6 border-t border-emerald-500/20">
                                <h3 class="text-emerald-300 font-semibold mb-3">Descripción</h3>
                                <p class="text-white/90 leading-relaxed">{{ $mantenimiento->descripcion }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Panel de acciones -->
                <div class="fade-in fade-in-delay-3">
                    <div class="aurora-card rounded-2xl p-6">
                        <h2 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                            <svg class="w-6 h-6 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            Acciones
                        </h2>
                        
                        <div class="space-y-3">
                            <a href="{{ route('mantenimientos.edit', $mantenimiento) }}" class="aurora-btn-warning w-full text-white font-semibold px-4 py-3 rounded-lg flex items-center justify-center gap-2 hover:scale-105 transition-transform">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Editar Mantenimiento
                            </a>
                            
                            <a href="{{ route('mantenimientos.index') }}" class="aurora-btn-secondary w-full text-white font-semibold px-4 py-3 rounded-lg flex items-center justify-center gap-2 hover:scale-105 transition-transform">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Volver al Listado
                            </a>
                        </div>
                    </div>

                    <!-- Información del salón -->
                    @if($mantenimiento->salon)
                        <div class="aurora-card rounded-2xl p-6 mt-6">
                            <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                Información del Salón
                            </h3>
                            
                            <div class="space-y-3">
                                <div>
                                    <p class="text-emerald-300/70 text-sm">Nombre</p>
                                    <p class="text-white font-medium">{{ $mantenimiento->salon->nombre }}</p>
                                </div>
                                
                                @if($mantenimiento->salon->capacidad_maxima)
                                    <div>
                                        <p class="text-emerald-300/70 text-sm">Capacidad</p>
                                        <p class="text-white">{{ $mantenimiento->salon->capacidad_maxima }} personas</p>
                                    </div>
                                @endif
                                
                                @if($mantenimiento->salon->precio_base)
                                    <div>
                                        <p class="text-emerald-300/70 text-sm">Precio Base</p>
                                        <p class="text-emerald-400 font-semibold">Q{{ number_format($mantenimiento->salon->precio_base, 2) }}</p>
                                    </div>
                                @endif
                                
                                <div>
                                    <p class="text-emerald-300/70 text-sm">Estado del Salón</p>
                                    <span class="inline-flex px-2 py-1 rounded-full text-xs font-medium
                                        {{ $mantenimiento->salon->estado === 'activo' ? 'bg-green-500/20 text-green-300 border border-green-400/30' : 
                                           ($mantenimiento->salon->estado === 'mantenimiento' ? 'bg-yellow-500/20 text-yellow-300 border border-yellow-400/30' : 
                                            'bg-red-500/20 text-red-300 border border-red-400/30') }}">
                                        {{ ucfirst($mantenimiento->salon->estado) }}
                                    </span>
                                </div>
                                
                                <a href="{{ route('salones.show', $mantenimiento->salon) }}" class="aurora-btn w-full text-white font-medium px-4 py-2 rounded-lg flex items-center justify-center gap-2 hover:scale-105 transition-transform mt-4">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Ver Detalles del Salón
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Timeline de estados (si hay actualizaciones) -->
            <div class="fade-in fade-in-delay-3">
                <div class="aurora-card rounded-2xl p-6">
                    <h2 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                        <svg class="w-6 h-6 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Historial del Mantenimiento
                    </h2>
                    
                    <div class="space-y-4">
                        <!-- Estado actual -->
                        <div class="flex items-start gap-4">
                            <div class="w-3 h-3 bg-emerald-400 rounded-full mt-2 flex-shrink-0"></div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-white font-medium">Estado Actual: {{ ucfirst(str_replace('_', ' ', $mantenimiento->estado)) }}</h3>
                                    <span class="text-emerald-300/70 text-sm">{{ $mantenimiento->updated_at ? $mantenimiento->updated_at->format('d/m/Y H:i') : 'N/D' }}</span>
                                </div>
                                <p class="text-emerald-300/70 text-sm mt-1">
                                    @switch($mantenimiento->estado)
                                        @case('programado')
                                            El mantenimiento está programado y pendiente de ejecución
                                            @break
                                        @case('en_proceso')
                                            El mantenimiento está actualmente en progreso
                                            @break
                                        @case('completado')
                                            El mantenimiento ha sido completado exitosamente
                                            @break
                                        @case('cancelado')
                                            El mantenimiento ha sido cancelado
                                            @break
                                        @default
                                            Estado del mantenimiento
                                    @endswitch
                                </p>
                            </div>
                        </div>
                        
                        <!-- Creación -->
                        <div class="flex items-start gap-4">
                            <div class="w-3 h-3 bg-blue-400 rounded-full mt-2 flex-shrink-0"></div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-white font-medium">Mantenimiento Creado</h3>
                                    <span class="text-emerald-300/70 text-sm">{{ $mantenimiento->created_at ? $mantenimiento->created_at->format('d/m/Y H:i') : 'N/D' }}</span>
                                </div>
                                <p class="text-emerald-300/70 text-sm mt-1">Mantenimiento registrado por {{ $mantenimiento->creador?->name ?? 'Usuario no disponible' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animaciones de entrada
            const fadeElements = document.querySelectorAll('.fade-in');
            fadeElements.forEach((element, index) => {
                element.style.animationDelay = `${index * 0.1}s`;
            });
        });
    </script>

</x-app-layout>