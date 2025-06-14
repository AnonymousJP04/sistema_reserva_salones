<x-app-layout>
    <x-slot name="header">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <h2 class="font-bold text-3xl text-transparent bg-clip-text bg-gradient-to-r from-emerald-200 via-green-300 to-emerald-400 leading-tight flex items-center gap-3 animate-aurora-glow">
            <div class="relative">
                <svg class="w-10 h-10 text-emerald-300 animate-aurora-pulse" fill="none" viewBox="0 0 24 24">
                    <defs>
                        <linearGradient id="maintenanceGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#6ee7b7"/>
                            <stop offset="50%" stop-color="#22c55e"/>
                            <stop offset="100%" stop-color="#047857"/>
                        </linearGradient>
                        <filter id="maintenance-glow">
                            <feGaussianBlur stdDeviation="3" result="coloredBlur"/>
                            <feMerge> 
                                <feMergeNode in="coloredBlur"/>
                                <feMergeNode in="SourceGraphic"/>
                            </feMerge>
                        </filter>
                    </defs>
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" 
                          stroke="url(#maintenanceGradient)" 
                          stroke-width="2" 
                          stroke-linecap="round" 
                          stroke-linejoin="round"
                          filter="url(#maintenance-glow)" />
                </svg>
                <div class="absolute inset-0 w-10 h-10 bg-emerald-300/30 rounded-full animate-aurora-ring"></div>
            </div>
            {{ __('Gestión de Mantenimientos') }}
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
            transform: translateY(-3px);
            box-shadow: 
                0 16px 40px rgba(0, 0, 0, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.2),
                0 0 30px rgba(34, 197, 94, 0.2);
            border-color: rgba(34, 197, 94, 0.4);
        }
        
        .aurora-table {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(34, 197, 94, 0.15);
        }
        
        .aurora-table th {
            background: rgba(34, 197, 94, 0.1);
            color: rgba(255, 255, 255, 0.9);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .aurora-table tr:hover {
            background: rgba(34, 197, 94, 0.05);
            box-shadow: inset 0 0 20px rgba(34, 197, 94, 0.1);
        }
        
        .aurora-btn {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 50%, #15803d 100%);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 4px 15px rgba(34, 197, 94, 0.3);
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
                rgba(255, 255, 255, 0.3) 50%,
                transparent 100%);
            transition: left 0.5s ease;
        }
        
        .aurora-btn:hover::before {
            left: 100%;
        }
        
        .aurora-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(34, 197, 94, 0.4);
        }
        
        .aurora-btn-secondary {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 50%, #1d4ed8 100%);
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }
        
        .aurora-btn-secondary:hover {
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
        }
        
        .aurora-btn-warning {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 50%, #b45309 100%);
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
        }
        
        .aurora-btn-warning:hover {
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4);
        }
        
        .aurora-btn-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 50%, #b91c1c 100%);
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
        }
        
        .aurora-btn-danger:hover {
            box-shadow: 0 8px 25px rgba(239, 68, 68, 0.4);
        }
        
        .aurora-search {
            background: rgba(31, 41, 55, 0.8);
            border: 1px solid rgba(34, 197, 94, 0.3);
            color: #e5e7eb;
            transition: all 0.3s ease;
        }
        
        .aurora-search:focus {
            background: rgba(31, 41, 55, 0.9);
            border: 1px solid #22c55e;
            box-shadow: 0 0 20px rgba(34, 197, 94, 0.3);
            outline: none;
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

        /* Estilos del Calendario */
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 2px;
        }
        
        .calendar-day {
            aspect-ratio: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            position: relative;
            cursor: pointer;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(34, 197, 94, 0.1);
            transition: all 0.3s ease;
            border-radius: 8px;
            overflow: hidden;
            min-height: 80px;
            padding: 4px;
        }
        
        .calendar-day:hover {
            border-color: rgba(34, 197, 94, 0.4);
            box-shadow: 0 4px 15px rgba(34, 197, 94, 0.2);
        }
        
        .calendar-day.has-maintenance {
            border-width: 2px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }
        
        .calendar-day.has-maintenance:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
        }
        
        .calendar-day.selected {
            border-color: rgba(34, 197, 94, 0.8) !important;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.3) !important;
        }
        
        .maintenance-indicator {
            position: absolute;
            top: 2px;
            right: 2px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { 
                opacity: 1; 
                transform: scale(1);
            }
            50% { 
                opacity: 0.7; 
                transform: scale(1.2);
            }
        }

        /* Modal Styles */
        .modal-backdrop {
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
        }
        
        .modal-content {
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(34, 197, 94, 0.2);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
        }

        /* Estados de mantenimiento */
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

        /* Toggle de vistas */
        .view-toggle {
            color: rgba(110, 231, 183, 0.7);
            background: transparent;
        }
        
        .view-toggle.active {
            color: white;
            background: rgba(34, 197, 94, 0.3);
            border: 1px solid rgba(34, 197, 94, 0.4);
        }

        .success-alert {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.1), rgba(16, 185, 129, 0.1));
            border: 1px solid rgba(34, 197, 94, 0.3);
            color: #86efac;
            backdrop-filter: blur(20px);
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Header con estadísticas -->
            <div class="mb-8 fade-in">
                <div class="aurora-card rounded-2xl p-6">
                    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
                        <div>
                            <h1 class="text-3xl font-bold text-white mb-2">Panel de Mantenimientos</h1>
                            <p class="text-emerald-200/70">Gestiona y programa los mantenimientos de tus salones</p>
                        </div>
                        <div class="flex items-center gap-6">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-blue-300">{{ $mantenimientos->where('estado', 'programado')->count() }}</div>
                                <div class="text-blue-200/70 text-sm">Programados</div>
                            </div>
                            <div class="w-px h-12 bg-emerald-400/30"></div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-yellow-300">{{ $mantenimientos->where('estado', 'en_proceso')->count() }}</div>
                                <div class="text-yellow-200/70 text-sm">En Proceso</div>
                            </div>
                            <div class="w-px h-12 bg-emerald-400/30"></div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-emerald-300">{{ $mantenimientos->where('estado', 'completado')->count() }}</div>
                                <div class="text-emerald-200/70 text-sm">Completados</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mensaje de éxito -->
            @if(session('success'))
                <div class="mb-6 fade-in fade-in-delay-1">
                    <div class="success-alert p-4 rounded-xl flex items-center">
                        <svg class="w-6 h-6 mr-3 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- Herramientas y Vista Toggle -->
            <div class="mb-6 fade-in fade-in-delay-1">
                <div class="aurora-card rounded-xl p-6">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                        <!-- Toggle de vistas -->
                        <div class="flex items-center bg-emerald-500/10 rounded-lg p-1 border border-emerald-400/30">
                            <button id="tableViewBtn" class="view-toggle active px-4 py-2 rounded-md text-sm font-medium transition-all">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 6h18m-9 8h9m-9 4h9m-18-8h6m0 0V4m0 6v6"></path>
                                </svg>
                                Tabla
                            </button>
                            <button id="calendarViewBtn" class="view-toggle px-4 py-2 rounded-md text-sm font-medium transition-all">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Calendario
                            </button>
                        </div>

                        <!-- Acciones -->
                        <div class="flex items-center gap-3">
                            <select class="aurora-search px-4 py-3 rounded-lg" id="salonFilter">
                                <option value="">Todos los salones</option>
                                @foreach($salones ?? [] as $salon)
                                    <option value="{{ $salon->id }}">{{ $salon->nombre }}</option>
                                @endforeach
                            </select>
                            
                            <a href="{{ route('mantenimientos.create') }}" id="newMaintenanceBtn" class="aurora-btn text-white font-semibold px-6 py-3 rounded-lg flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Nuevo Mantenimiento
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vista de Tabla -->
            <div id="tableView" class="fade-in fade-in-delay-2">
                <div class="aurora-card rounded-2xl overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="aurora-table min-w-full">
                            <thead>
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Salón</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Tipo</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Fechas</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Estado</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Proveedor</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Costo</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-emerald-500/20">
                                @forelse($mantenimientos as $mantenimiento)
                                    <tr class="transition-all duration-300 hover:bg-emerald-500/10">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 bg-emerald-500/20 rounded-lg flex items-center justify-center mr-3">
                                                    <svg class="w-5 h-5 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <div class="font-semibold text-white">{{ $mantenimiento->salon?->nombre ?? 'N/D' }}</div>
                                                    <div class="text-emerald-300/70 text-sm">Capacidad {{ $mantenimiento->salon?->capacidad_maxima ?? 'N/D' }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="text-white font-medium">{{ $mantenimiento->tipo_mantenimiento }}</span>
                                            <div class="text-emerald-300/70 text-sm">{{ Str::limit($mantenimiento->descripcion, 30) ?? 'Sin descripción' }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-white">{{ $mantenimiento->fecha_inicio ? $mantenimiento->fecha_inicio->format('d/m/Y') : 'N/D' }}</div>
                                            <div class="text-emerald-300/70 text-sm">hasta {{ $mantenimiento->fecha_fin ? $mantenimiento->fecha_fin->format('d/m/Y') : 'N/D' }}</div>
                                            @if($mantenimiento->hora_inicio && $mantenimiento->hora_fin)
                                                <div class="text-cyan-300 text-xs">{{ $mantenimiento->hora_inicio }} - {{ $mantenimiento->hora_fin }}</div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="estado-{{ $mantenimiento->estado }} inline-flex px-3 py-1 rounded-full text-xs font-semibold border">
                                                {{ ucfirst(str_replace('_', ' ', $mantenimiento->estado)) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="text-white">{{ $mantenimiento->proveedor ?? 'Sin proveedor' }}</span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="text-emerald-400 font-bold text-lg">
                                                @if($mantenimiento->costo)
                                                    Q{{ number_format($mantenimiento->costo, 2) }}
                                                @else
                                                    N/D
                                                @endif
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex justify-center items-center gap-2">
                                                <a href="{{ route('mantenimientos.edit', $mantenimiento) }}" class="aurora-btn-warning text-white px-3 py-2 rounded-lg text-sm font-medium flex items-center gap-1">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                    Editar
                                                </a>
                                                <form action="{{ route('mantenimientos.destroy', $mantenimiento) }}" method="POST" class="inline-block" onsubmit="return confirmDelete('{{ $mantenimiento->tipo_mantenimiento }}');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="aurora-btn-danger text-white px-3 py-2 rounded-lg text-sm font-medium flex items-center gap-1">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-12 text-center">
                                            <div class="flex flex-col items-center">
                                                <svg class="w-16 h-16 text-emerald-300/50 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                                                </svg>
                                                <h3 class="text-xl font-semibold text-emerald-200 mb-2">No hay mantenimientos registrados</h3>
                                                <p class="text-emerald-300/70 mb-6">Comienza creando tu primer mantenimiento</p>
                                                <a href="{{ route('mantenimientos.create') }}" class="aurora-btn text-white font-semibold px-6 py-3 rounded-lg flex items-center gap-2">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                    </svg>
                                                    Crear Primer Mantenimiento
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Vista de Calendario -->
            <div id="calendarView" class="hidden fade-in fade-in-delay-2">
                <div class="aurora-card rounded-2xl p-6">
                    <!-- Header del calendario -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-4">
                            <button id="prevMonth" class="aurora-btn-secondary p-2 rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                            <h3 id="currentMonth" class="text-2xl font-bold text-white">Junio 2025</h3>
                            <button id="nextMonth" class="aurora-btn-secondary p-2 rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                        <button id="todayBtn" class="aurora-btn text-white px-4 py-2 rounded-lg text-sm font-medium">
                            Hoy
                        </button>
                    </div>

                    <!-- Días de la semana -->
                    <div class="calendar-grid mb-2">
                        <div class="text-center text-emerald-300 font-semibold p-3">Dom</div>
                        <div class="text-center text-emerald-300 font-semibold p-3">Lun</div>
                        <div class="text-center text-emerald-300 font-semibold p-3">Mar</div>
                        <div class="text-center text-emerald-300 font-semibold p-3">Mié</div>
                        <div class="text-center text-emerald-300 font-semibold p-3">Jue</div>
                        <div class="text-center text-emerald-300 font-semibold p-3">Vie</div>
                        <div class="text-center text-emerald-300 font-semibold p-3">Sáb</div>
                    </div>

                    <!-- Días del calendario -->
                    <div id="calendarDays" class="calendar-grid">
                        <!-- Los días se generarán dinámicamente con JavaScript -->
                    </div>

                    <!-- Leyenda -->
                    <div class="mt-6 flex items-center gap-6 text-sm">
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 bg-blue-500/30 border border-blue-400/50 rounded"></div>
                            <span class="text-blue-300">Programado</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 bg-yellow-500/30 border border-yellow-400/50 rounded"></div>
                            <span class="text-yellow-300">En Proceso</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 bg-emerald-500/30 border border-emerald-400/50 rounded"></div>
                            <span class="text-emerald-300">Completado</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 bg-red-500/30 border border-red-400/50 rounded"></div>
                            <span class="text-red-300">Cancelado</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Paginación -->
            @if($mantenimientos->hasPages())
                <div class="mt-8 flex justify-center fade-in fade-in-delay-3">
                    <div class="aurora-card rounded-xl p-4">
                        <div class="flex items-center space-x-2">
                            {{-- Botón anterior --}}
                            @if ($mantenimientos->onFirstPage())
                                <span class="px-3 py-2 text-emerald-300/50 cursor-not-allowed">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </span>
                            @else
                                <a href="{{ $mantenimientos->previousPageUrl() }}" 
                                   class="px-3 py-2 text-emerald-300 hover:text-white hover:bg-emerald-500/20 rounded-lg transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </a>
                            @endif

                            {{-- Números de página --}}
                            @foreach ($mantenimientos->getUrlRange(1, $mantenimientos->lastPage()) as $page => $url)
                                @if ($page == $mantenimientos->currentPage())
                                    <span class="px-4 py-2 bg-emerald-500/30 text-emerald-200 rounded-lg font-semibold">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" 
                                       class="px-4 py-2 text-emerald-300 hover:text-white hover:bg-emerald-500/20 rounded-lg transition-all">{{ $page }}</a>
                                @endif
                            @endforeach

                            {{-- Botón siguiente --}}
                            @if ($mantenimientos->hasMorePages())
                                <a href="{{ $mantenimientos->nextPageUrl() }}" 
                                   class="px-3 py-2 text-emerald-300 hover:text-white hover:bg-emerald-500/20 rounded-lg transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            @else
                                <span class="px-3 py-2 text-emerald-300/50 cursor-not-allowed">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </span>
                            @endif
                        </div>
                        
                        <div class="text-center mt-3 text-emerald-200/70 text-sm">
                            Mostrando {{ $mantenimientos->firstItem() }} a {{ $mantenimientos->lastItem() }} de {{ $mantenimientos->total() }} mantenimientos
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Preparar datos de mantenimientos para el calendario
        const maintenanceData = {};
        
        @foreach($mantenimientos as $mantenimiento)
            @if($mantenimiento->fecha_inicio && $mantenimiento->fecha_fin)
                // Crear rango de fechas para el mantenimiento
                let startDate = new Date('{{ $mantenimiento->fecha_inicio->format('Y-m-d') }}');
                let endDate = new Date('{{ $mantenimiento->fecha_fin->format('Y-m-d') }}');
                
                // Agregar cada día del rango al objeto de datos
                for (let d = new Date(startDate); d <= endDate; d.setDate(d.getDate() + 1)) {
                    let dateStr = d.toISOString().split('T')[0];
                    if (!maintenanceData[dateStr]) {
                        maintenanceData[dateStr] = [];
                    }
                    maintenanceData[dateStr].push({
                        id: {{ $mantenimiento->id }},
                        salon: '{{ $mantenimiento->salon?->nombre ?? 'N/D' }}',
                        tipo: '{{ $mantenimiento->tipo_mantenimiento }}',
                        estado: '{{ $mantenimiento->estado }}',
                        proveedor: '{{ $mantenimiento->proveedor ?? 'Sin proveedor' }}',
                        fecha_inicio: '{{ $mantenimiento->fecha_inicio->format('Y-m-d') }}',
                        fecha_fin: '{{ $mantenimiento->fecha_fin->format('Y-m-d') }}',
                        hora_inicio: '{{ $mantenimiento->hora_inicio ?? '' }}',
                        hora_fin: '{{ $mantenimiento->hora_fin ?? '' }}'
                    });
                }
            @endif
        @endforeach

        // Variables del calendario
        let currentDate = new Date();
        let selectedDate = null;

        // Elementos del DOM
        const tableView = document.getElementById('tableView');
        const calendarView = document.getElementById('calendarView');
        const tableViewBtn = document.getElementById('tableViewBtn');
        const calendarViewBtn = document.getElementById('calendarViewBtn');

        // Toggle entre vistas
        tableViewBtn.addEventListener('click', () => {
            showTableView();
        });

        calendarViewBtn.addEventListener('click', () => {
            showCalendarView();
        });

        function showTableView() {
            tableView.classList.remove('hidden');
            calendarView.classList.add('hidden');
            tableViewBtn.classList.add('active');
            calendarViewBtn.classList.remove('active');
        }

        function showCalendarView() {
            tableView.classList.add('hidden');
            calendarView.classList.remove('hidden');
            calendarViewBtn.classList.add('active');
            tableViewBtn.classList.remove('active');
            renderCalendar();
        }

        // Funciones del calendario
        function renderCalendar() {
            const year = currentDate.getFullYear();
            const month = currentDate.getMonth();
            
            // Actualizar el título del mes
            const monthNames = [
                'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
            ];
            document.getElementById('currentMonth').textContent = `${monthNames[month]} ${year}`;
            
            // Limpiar días anteriores
            const calendarDays = document.getElementById('calendarDays');
            calendarDays.innerHTML = '';
            
            // Primer día del mes y último día
            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);
            const daysInMonth = lastDay.getDate();
            const startingDayOfWeek = firstDay.getDay();
            
            // Agregar días vacíos al inicio
            for (let i = 0; i < startingDayOfWeek; i++) {
                const emptyDay = document.createElement('div');
                emptyDay.className = 'calendar-day opacity-30';
                calendarDays.appendChild(emptyDay);
            }
            
            // Agregar días del mes
            for (let day = 1; day <= daysInMonth; day++) {
                const dayElement = document.createElement('div');
                dayElement.className = 'calendar-day text-white font-medium hover:bg-emerald-500/20 cursor-pointer transition-all duration-300';
                dayElement.innerHTML = `<span class="relative z-10">${day}</span>`;
                
                const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                
                // Verificar si hay mantenimientos en esta fecha
                if (maintenanceData[dateStr] && maintenanceData[dateStr].length > 0) {
                    const maintenances = maintenanceData[dateStr];
                    dayElement.classList.add('has-maintenance');
                    
                    // Determinar el color basado en el estado del primer mantenimiento
                    const primaryMaintenance = maintenances[0];
                    let bgColor, borderColor, textColor;
                    
                    switch(primaryMaintenance.estado) {
                        case 'programado':
                            bgColor = 'rgba(59, 130, 246, 0.3)';
                            borderColor = 'rgba(59, 130, 246, 0.6)';
                            textColor = '#dbeafe';
                            break;
                        case 'en_proceso':
                            bgColor = 'rgba(245, 158, 11, 0.3)';
                            borderColor = 'rgba(245, 158, 11, 0.6)';
                            textColor = '#fef3c7';
                            break;
                        case 'completado':
                            bgColor = 'rgba(34, 197, 94, 0.3)';
                            borderColor = 'rgba(34, 197, 94, 0.6)';
                            textColor = '#dcfce7';
                            break;
                        case 'cancelado':
                            bgColor = 'rgba(239, 68, 68, 0.3)';
                            borderColor = 'rgba(239, 68, 68, 0.6)';
                            textColor = '#fee2e2';
                            break;
                        default:
                            bgColor = 'rgba(156, 163, 175, 0.3)';
                            borderColor = 'rgba(156, 163, 175, 0.6)';
                            textColor = '#f3f4f6';
                    }
                    
                    dayElement.style.backgroundColor = bgColor;
                    dayElement.style.borderColor = borderColor;
                    dayElement.style.color = textColor;
                    
                    // Crear contenido del día con información del mantenimiento
                    const maintenanceCount = maintenances.length;
                    const contentHtml = `
                        <span class="relative z-10 font-bold">${day}</span>
                        <div class="absolute bottom-1 left-1 right-1 z-10">
                            <div class="text-xs font-medium truncate">
                                ${primaryMaintenance.tipo}
                            </div>
                            ${maintenanceCount > 1 ? 
                                `<div class="text-xs opacity-75">+${maintenanceCount - 1} más</div>` : 
                                `<div class="text-xs opacity-75">${primaryMaintenance.salon}</div>`
                            }
                        </div>
                        <div class="absolute top-1 right-1 w-2 h-2 rounded-full animate-pulse z-10" style="background-color: ${borderColor}"></div>
                    `;
                    
                    dayElement.innerHTML = contentHtml;
                    
                    // Tooltip con información detallada
                    let tooltipText = '';
                    maintenances.forEach((maintenance, index) => {
                        if (index > 0) tooltipText += '\n---\n';
                        tooltipText += `${maintenance.tipo}\n`;
                        tooltipText += `Salón: ${maintenance.salon}\n`;
                        tooltipText += `Estado: ${maintenance.estado.replace('_', ' ')}\n`;
                        if (maintenance.hora_inicio && maintenance.hora_fin) {
                            tooltipText += `Horario: ${maintenance.hora_inicio} - ${maintenance.hora_fin}\n`;
                        }
                        if (maintenance.proveedor && maintenance.proveedor !== 'Sin proveedor') {
                            tooltipText += `Proveedor: ${maintenance.proveedor}`;
                        }
                    });
                    dayElement.title = tooltipText;
                }
                
                // Agregar evento click
                dayElement.addEventListener('click', () => {
                    // Remover selección anterior
                    document.querySelectorAll('.calendar-day.selected').forEach(el => {
                        el.classList.remove('selected');
                    });
                    
                    // Seleccionar día actual
                    dayElement.classList.add('selected');
                    dayElement.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        dayElement.style.transform = 'scale(1)';
                    }, 150);
                    
                    selectedDate = dateStr;
                    
                    // Redireccionar a crear mantenimiento con fecha preseleccionada
                    window.location.href = `{{ route('mantenimientos.create') }}?fecha=${dateStr}`;
                });
                
                // Hover effects
                dayElement.addEventListener('mouseenter', () => {
                    if (!dayElement.classList.contains('has-maintenance')) {
                        dayElement.style.backgroundColor = 'rgba(34, 197, 94, 0.1)';
                        dayElement.style.borderColor = 'rgba(34, 197, 94, 0.3)';
                    }
                    dayElement.style.transform = 'translateY(-2px)';
                    dayElement.style.boxShadow = '0 4px 15px rgba(34, 197, 94, 0.3)';
                });
                
                dayElement.addEventListener('mouseleave', () => {
                    if (!dayElement.classList.contains('has-maintenance')) {
                        dayElement.style.backgroundColor = 'rgba(255, 255, 255, 0.03)';
                        dayElement.style.borderColor = 'rgba(34, 197, 94, 0.1)';
                    }
                    dayElement.style.transform = 'translateY(0)';
                    dayElement.style.boxShadow = 'none';
                });
                
                calendarDays.appendChild(dayElement);
            }
        }

        // Navegación del calendario
        document.getElementById('prevMonth').addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar();
        });

        document.getElementById('nextMonth').addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar();
        });

        document.getElementById('todayBtn').addEventListener('click', () => {
            currentDate = new Date();
            renderCalendar();
        });

        // Función de confirmación para eliminar
        function confirmDelete(tipoMantenimiento) {
            return confirm(`¿Estás seguro de que quieres eliminar el mantenimiento "${tipoMantenimiento}"?\n\nEsta acción no se puede deshacer.`);
        }

        // Filtrado por salón
        document.getElementById('salonFilter').addEventListener('change', function() {
            const selectedSalon = this.value;
            const rows = document.querySelectorAll('#tableView tbody tr');
            
            rows.forEach(row => {
                if (selectedSalon === '' || row.dataset.salonId === selectedSalon) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Animaciones de entrada
        document.addEventListener('DOMContentLoaded', function() {
            const fadeElements = document.querySelectorAll('.fade-in');
            fadeElements.forEach((element, index) => {
                element.style.animationDelay = `${index * 0.1}s`;
            });

            // Auto-hide success message
            const successAlert = document.querySelector('.success-alert');
            if (successAlert) {
                setTimeout(() => {
                    successAlert.style.opacity = '0';
                    successAlert.style.transform = 'translateY(-10px)';
                    setTimeout(() => {
                        successAlert.remove();
                    }, 300);
                }, 5000);
            }
        });
    </script>

</x-app-layout>