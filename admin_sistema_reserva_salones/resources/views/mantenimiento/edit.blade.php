<x-app-layout>
    <x-slot name="header">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <h2 class="font-bold text-3xl text-transparent bg-clip-text bg-gradient-to-r from-emerald-200 via-green-300 to-emerald-400 leading-tight flex items-center gap-3 animate-aurora-glow">
            <div class="relative">
                <svg class="w-10 h-10 text-emerald-300 animate-aurora-pulse" fill="none" viewBox="0 0 24 24">
                    <defs>
                        <linearGradient id="editGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#6ee7b7"/>
                            <stop offset="50%" stop-color="#22c55e"/>
                            <stop offset="100%" stop-color="#047857"/>
                        </linearGradient>
                        <filter id="edit-glow">
                            <feGaussianBlur stdDeviation="3" result="coloredBlur"/>
                            <feMerge> 
                                <feMergeNode in="coloredBlur"/>
                                <feMergeNode in="SourceGraphic"/>
                            </feMerge>
                        </filter>
                    </defs>
                    <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" 
                          stroke="url(#editGradient)" 
                          stroke-width="2" 
                          stroke-linecap="round" 
                          stroke-linejoin="round"
                          filter="url(#edit-glow)" />
                </svg>
                <div class="absolute inset-0 w-10 h-10 bg-emerald-300/30 rounded-full animate-aurora-ring"></div>
            </div>
            {{ __('Editar Mantenimiento') }}
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
        
        .aurora-btn-danger {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.8) 0%, rgba(220, 38, 38, 0.9) 50%, rgba(185, 28, 28, 0.95) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(239, 68, 68, 0.3);
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.2);
        }
        
        .aurora-btn-danger:hover {
            box-shadow: 0 8px 25px rgba(239, 68, 68, 0.3);
            border-color: rgba(239, 68, 68, 0.5);
        }
        
        .aurora-input {
            background: rgba(31, 41, 55, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(34, 197, 94, 0.2);
            color: #e5e7eb;
            transition: all 0.3s ease;
        }
        
        .aurora-input:focus {
            background: rgba(31, 41, 55, 0.8);
            border: 1px solid rgba(34, 197, 94, 0.6);
            box-shadow: 0 0 20px rgba(34, 197, 94, 0.2);
            outline: none;
        }
        
        .aurora-input::placeholder {
            color: rgba(110, 231, 183, 0.4);
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

        .success-alert {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.1), rgba(16, 185, 129, 0.1));
            border: 1px solid rgba(34, 197, 94, 0.3);
            color: #86efac;
            backdrop-filter: blur(20px);
        }

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
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Breadcrumb -->
            <div class="mb-6 fade-in">
                <nav class="flex items-center gap-2 text-emerald-300/70 text-sm">
                    <a href="{{ route('mantenimientos.index') }}" class="hover:text-emerald-300 transition-colors">Mantenimientos</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-emerald-200">Editar #{{ $mantenimiento->id }}</span>
                </nav>
            </div>

            <!-- Información del mantenimiento -->
            <div class="mb-6 fade-in fade-in-delay-1">
                <div class="aurora-card rounded-xl p-6">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 bg-emerald-500/20 rounded-xl flex items-center justify-center backdrop-blur-sm border border-emerald-400/30">
                            <svg class="w-8 h-8 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">{{ $mantenimiento->tipo_mantenimiento }}</h3>
                            <p class="text-emerald-300">{{ $mantenimiento->salon?->nombre ?? 'Salón no disponible' }}</p>
                            <p class="text-emerald-300/70 text-sm">
                                {{ $mantenimiento->fecha_inicio ? $mantenimiento->fecha_inicio->format('d/m/Y') : 'N/D' }} - 
                                {{ $mantenimiento->fecha_fin ? $mantenimiento->fecha_fin->format('d/m/Y') : 'N/D' }}
                            </p>
                        </div>
                        <div class="ml-auto">
                            <span class="estado-{{ $mantenimiento->estado }} inline-flex px-3 py-1 rounded-full text-xs font-semibold border backdrop-blur-sm">
                                {{ ucfirst(str_replace('_', ' ', $mantenimiento->estado)) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulario de Edición -->
            <div class="aurora-card rounded-2xl p-8 fade-in fade-in-delay-2">
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-white mb-2">Editar Mantenimiento</h1>
                    <p class="text-emerald-200/70">Modifica la información del mantenimiento</p>
                </div>

                <form method="POST" action="{{ route('mantenimientos.update', $mantenimiento) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Salón -->
                    <div class="fade-in fade-in-delay-3">
                        <label class="block text-emerald-300 font-medium mb-2">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            Salón *
                        </label>
                        <select name="salon_id" required class="aurora-input w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-emerald-400/20 transition-all">
                            <option value="">Seleccionar salón</option>
                            @foreach($salones ?? [] as $salon)
                                <option value="{{ $salon->id }}" {{ $mantenimiento->salon_id == $salon->id ? 'selected' : '' }}>
                                    {{ $salon->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('salon_id')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Fechas -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 fade-in fade-in-delay-3">
                        <div>
                            <label class="block text-emerald-300 font-medium mb-2">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Fecha de Inicio *
                            </label>
                            <input type="date" name="fecha_inicio" required 
                                   class="aurora-input w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-emerald-400/20 transition-all" 
                                   value="{{ $mantenimiento->fecha_inicio ? $mantenimiento->fecha_inicio->format('Y-m-d') : '' }}"
                                   min="{{ date('Y-m-d') }}">
                            @error('fecha_inicio')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-emerald-300 font-medium mb-2">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Fecha de Fin *
                            </label>
                            <input type="date" name="fecha_fin" required 
                                   class="aurora-input w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-emerald-400/20 transition-all" 
                                   value="{{ $mantenimiento->fecha_fin ? $mantenimiento->fecha_fin->format('Y-m-d') : '' }}"
                                   min="{{ date('Y-m-d') }}">
                            @error('fecha_fin')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Horarios -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 fade-in fade-in-delay-3">
                        <div>
                            <label class="block text-emerald-300 font-medium mb-2">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Hora de Inicio
                            </label>
                            <input type="time" name="hora_inicio" class="aurora-input w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-emerald-400/20 transition-all" value="{{ $mantenimiento->hora_inicio }}">
                            @error('hora_inicio')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-emerald-300 font-medium mb-2">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Hora de Fin
                            </label>
                            <input type="time" name="hora_fin" class="aurora-input w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-emerald-400/20 transition-all" value="{{ $mantenimiento->hora_fin }}">
                            @error('hora_fin')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Tipo de mantenimiento -->
                    <div class="fade-in fade-in-delay-3">
                        <label class="block text-emerald-300 font-medium mb-2">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Tipo de Mantenimiento *
                        </label>
                        <select name="tipo_mantenimiento" required class="aurora-input w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-emerald-400/20 transition-all">
                            <option value="">Seleccionar tipo</option>
                            <option value="Limpieza General" {{ $mantenimiento->tipo_mantenimiento == 'Limpieza General' ? 'selected' : '' }}>Limpieza General</option>
                            <option value="Mantenimiento Eléctrico" {{ $mantenimiento->tipo_mantenimiento == 'Mantenimiento Eléctrico' ? 'selected' : '' }}>Mantenimiento Eléctrico</option>
                            <option value="Reparación Climatización" {{ $mantenimiento->tipo_mantenimiento == 'Reparación Climatización' ? 'selected' : '' }}>Reparación Climatización</option>
                            <option value="Pintura" {{ $mantenimiento->tipo_mantenimiento == 'Pintura' ? 'selected' : '' }}>Pintura</option>
                            <option value="Reparación Mobiliario" {{ $mantenimiento->tipo_mantenimiento == 'Reparación Mobiliario' ? 'selected' : '' }}>Reparación Mobiliario</option>
                            <option value="Mantenimiento Preventivo" {{ $mantenimiento->tipo_mantenimiento == 'Mantenimiento Preventivo' ? 'selected' : '' }}>Mantenimiento Preventivo</option>
                            <option value="Plomería" {{ $mantenimiento->tipo_mantenimiento == 'Plomería' ? 'selected' : '' }}>Plomería</option>
                            <option value="Jardinería" {{ $mantenimiento->tipo_mantenimiento == 'Jardinería' ? 'selected' : '' }}>Jardinería</option>
                            <option value="Otro" {{ $mantenimiento->tipo_mantenimiento == 'Otro' ? 'selected' : '' }}>Otro</option>
                        </select>
                        @error('tipo_mantenimiento')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Descripción -->
                    <div class="fade-in fade-in-delay-3">
                        <label class="block text-emerald-300 font-medium mb-2">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Descripción
                        </label>
                        <textarea name="descripcion" rows="4" placeholder="Describe los detalles del mantenimiento..." class="aurora-input w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-emerald-400/20 transition-all resize-none">{{ $mantenimiento->descripcion }}</textarea>
                        @error('descripcion')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Proveedor y Costo -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 fade-in fade-in-delay-3">
                        <div>
                            <label class="block text-emerald-300 font-medium mb-2">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                Proveedor
                            </label>
                            <input type="text" name="proveedor" maxlength="150" placeholder="Nombre del proveedor" class="aurora-input w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-emerald-400/20 transition-all" value="{{ $mantenimiento->proveedor }}">
                            @error('proveedor')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-emerald-300 font-medium mb-2">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                                Costo Estimado (Q)
                            </label>
                            <input type="number" name="costo" step="0.01" min="0" placeholder="0.00" class="aurora-input w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-emerald-400/20 transition-all" value="{{ $mantenimiento->costo }}">
                            @error('costo')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Estado -->
                    <div class="fade-in fade-in-delay-3">
                        <label class="block text-emerald-300 font-medium mb-2">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Estado *
                        </label>
                        <select name="estado" required class="aurora-input w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-emerald-400/20 transition-all">
                            <option value="programado" {{ $mantenimiento->estado == 'programado' ? 'selected' : '' }}>Programado</option>
                            <option value="en_proceso" {{ $mantenimiento->estado == 'en_proceso' ? 'selected' : '' }}>En Proceso</option>
                            <option value="completado" {{ $mantenimiento->estado == 'completado' ? 'selected' : '' }}>Completado</option>
                            <option value="cancelado" {{ $mantenimiento->estado == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                        </select>
                        @error('estado')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botones del formulario principal -->
                    <div class="flex justify-between gap-4 pt-6 border-t border-emerald-500/20 fade-in fade-in-delay-3">
                        <a href="{{ route('mantenimientos.index') }}" class="aurora-btn-secondary text-white font-semibold px-6 py-3 rounded-lg flex items-center gap-2 hover:scale-105 transition-transform">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Cancelar
                        </a>

                        <button type="submit" class="aurora-btn text-white font-semibold px-6 py-3 rounded-lg flex items-center gap-2 hover:scale-105 transition-transform">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Actualizar Mantenimiento
                        </button>
                    </div>
                </form>

                <!-- Formulario separado para eliminar -->
                <div class="mt-6 pt-6 border-t border-red-500/20">
                    <div class="flex items-center justify-between p-4 bg-red-500/10 backdrop-blur-sm border border-red-500/20 rounded-lg">
                        <div>
                            <h3 class="text-red-300 font-semibold">Zona de Peligro</h3>
                            <p class="text-red-200/70 text-sm">Esta acción eliminará permanentemente el mantenimiento</p>
                        </div>
                        <form action="{{ route('mantenimientos.destroy', $mantenimiento) }}" method="POST" class="inline-block" onsubmit="return confirmDelete('{{ $mantenimiento->tipo_mantenimiento }}');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="aurora-btn-danger text-white font-semibold px-6 py-3 rounded-lg flex items-center gap-2 hover:scale-105 transition-transform">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Eliminar Mantenimiento
                            </button>
                        </form>
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

            // Validación de fechas - no permitir fechas anteriores a hoy
            const today = new Date().toISOString().split('T')[0];
            const fechaInicioInput = document.querySelector('input[name="fecha_inicio"]');
            const fechaFinInput = document.querySelector('input[name="fecha_fin"]');
            
            if (fechaInicioInput && fechaFinInput) {
                // Solo aplicar validación si la fecha actual es anterior a hoy
                fechaInicioInput.addEventListener('change', function() {
                    if (this.value < today) {
                        this.value = today;
                        showAlert('No se pueden programar mantenimientos en fechas pasadas', 'warning');
                    }
                    if (!fechaFinInput.value || fechaFinInput.value < this.value) {
                        fechaFinInput.value = this.value;
                    }
                });

                fechaFinInput.addEventListener('change', function() {
                    if (this.value < today) {
                        this.value = today;
                        showAlert('No se pueden programar mantenimientos en fechas pasadas', 'warning');
                    }
                    if (this.value < fechaInicioInput.value) {
                        this.value = fechaInicioInput.value;
                    }
                });
            }

            // Validación de horarios
            const horaInicioInput = document.querySelector('input[name="hora_inicio"]');
            const horaFinInput = document.querySelector('input[name="hora_fin"]');
            
            if (horaInicioInput && horaFinInput) {
                function validarHorarios() {
                    if (horaInicioInput.value && horaFinInput.value) {
                        if (horaFinInput.value <= horaInicioInput.value) {
                            horaFinInput.setCustomValidity('La hora de fin debe ser posterior a la hora de inicio');
                        } else {
                            horaFinInput.setCustomValidity('');
                        }
                    }
                }
                
                horaInicioInput.addEventListener('change', validarHorarios);
                horaFinInput.addEventListener('change', validarHorarios);
            }

            // Efectos adicionales para inputs
            const inputs = document.querySelectorAll('.aurora-input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-2px)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });
            });
        });

        // Función para mostrar alertas
        function showAlert(message, type = 'info') {
            const alertDiv = document.createElement('div');
            alertDiv.className = `fixed top-4 right-4 z-50 p-4 rounded-lg border backdrop-blur-sm transition-all duration-300 ${
                type === 'warning' ? 'bg-yellow-500/20 border-yellow-400/50 text-yellow-200' :
                type === 'error' ? 'bg-red-500/20 border-red-400/50 text-red-200' :
                'bg-emerald-500/20 border-emerald-400/50 text-emerald-200'
            }`;
            alertDiv.innerHTML = `
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.268 15.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                    <span>${message}</span>
                    <button onclick="this.parentElement.parentElement.remove()" class="ml-2 text-current opacity-70 hover:opacity-100">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            `;
            document.body.appendChild(alertDiv);
            
            setTimeout(() => {
                alertDiv.style.opacity = '0';
                alertDiv.style.transform = 'translateX(100%)';
                setTimeout(() => alertDiv.remove(), 300);
            }, 3000);
        }

        // Función de confirmación para eliminar
        function confirmDelete(tipoMantenimiento) {
            return confirm(`¿Estás seguro de que quieres eliminar el mantenimiento "${tipoMantenimiento}"?\n\nEsta acción no se puede deshacer.`);
        }
    </script>

</x-app-layout>