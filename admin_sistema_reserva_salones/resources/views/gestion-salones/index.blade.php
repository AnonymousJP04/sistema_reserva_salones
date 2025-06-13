<x-app-layout>
    <x-slot name="header">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <h2 class="font-bold text-3xl text-transparent bg-clip-text bg-gradient-to-r from-emerald-200 via-green-300 to-emerald-400 leading-tight flex items-center gap-3 animate-aurora-glow">
            <div class="relative">
                <svg class="w-10 h-10 text-emerald-300 animate-aurora-pulse" fill="none" viewBox="0 0 24 24">
                    <defs>
                        <linearGradient id="salonGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#6ee7b7"/>
                            <stop offset="50%" stop-color="#22c55e"/>
                            <stop offset="100%" stop-color="#047857"/>
                        </linearGradient>
                        <filter id="salon-glow">
                            <feGaussianBlur stdDeviation="3" result="coloredBlur"/>
                            <feMerge> 
                                <feMergeNode in="coloredBlur"/>
                                <feMergeNode in="SourceGraphic"/>
                            </feMerge>
                        </filter>
                    </defs>
                    <path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" 
                          fill="url(#salonGradient)" 
                          filter="url(#salon-glow)" />
                </svg>
                <div class="absolute inset-0 w-10 h-10 bg-emerald-300/30 rounded-full animate-aurora-ring"></div>
            </div>
            {{ __('Gestión de Salones') }}
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
            animation: badge-shine 3s infinite;
        }
        
        @keyframes badge-shine {
            0% { left: -100%; }
            100% { left: 100%; }
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
        
        .salon-image {
            transition: all 0.3s ease;
            border-radius: 0.5rem;
            overflow: hidden;
        }
        
        .salon-image:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(34, 197, 94, 0.3);
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
            
            <!-- Header con estadísticas rápidas -->
            <div class="mb-8 fade-in">
                <div class="aurora-card rounded-2xl p-6">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                        <div>
                            <h1 class="text-3xl font-bold text-white mb-2">Lista de Salones</h1>
                            <p class="text-emerald-200/70">Gestiona todos los salones de eventos disponibles</p>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-emerald-300">{{ $salones->total() }}</div>
                                <div class="text-emerald-200/70 text-sm">Total Salones</div>
                            </div>
                            <div class="w-px h-12 bg-emerald-400/30"></div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-green-300">{{ $salones->where('estado', 'activo')->count() }}</div>
                                <div class="text-green-200/70 text-sm">Activos</div>
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

            <!-- Barra de herramientas -->
            <div class="mb-6 fade-in fade-in-delay-2">
                <div class="aurora-card rounded-xl p-6">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                        <!-- Buscador -->
                        <div class="flex-1 max-w-md">
                            <div class="relative">
                                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <input 
                                    type="text" 
                                    placeholder="Buscar salones..." 
                                    class="aurora-search w-full pl-10 pr-4 py-3 rounded-lg"
                                    id="searchInput"
                                >
                            </div>
                        </div>
                        
                        <!-- Filtros y acciones -->
                        <div class="flex items-center gap-3">
                            <!-- Filtro por estado -->
                            <select class="aurora-search px-4 py-3 rounded-lg" id="statusFilter">
                                <option value="">Todos los estados</option>
                                <option value="activo">Activos</option>
                                <option value="mantenimiento">En mantenimiento</option>
                                <option value="inactivo">Inactivos</option>
                            </select>
                            
                            <!-- Botón crear -->
                            <a href="{{ route('salones.create') }}" class="aurora-btn text-white font-semibold px-6 py-3 rounded-lg flex items-center gap-2 hover:scale-105 transition-transform">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Crear Nuevo Salón
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabla de salones -->
            <div class="aurora-card rounded-2xl overflow-hidden fade-in fade-in-delay-3">
                <div class="overflow-x-auto">
                    <table class="aurora-table min-w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Imagen</th>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Nombre</th>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Capacidad</th>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Precio Base</th>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-emerald-500/20" id="salonesTableBody">
                            @forelse($salones as $salon)
                                <tr class="transition-all duration-300 hover:bg-emerald-500/10 salon-row" 
                                    data-name="{{ strtolower($salon->nombre) }}" 
                                    data-status="{{ $salon->estado }}">
                                    <!-- Imagen -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($salon->imagen_principal)
                                            <img src="{{ asset('storage/' . $salon->imagen_principal) }}" 
                                                 alt="{{ $salon->nombre }}" 
                                                 class="salon-image w-20 h-16 object-cover rounded-lg border border-emerald-400/30">
                                        @else
                                            <div class="w-20 h-16 bg-emerald-500/20 rounded-lg border border-emerald-400/30 flex items-center justify-center">
                                                <svg class="w-8 h-8 text-emerald-400/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        @endif
                                    </td>
                                    
                                    <!-- Nombre -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div>
                                                <div class="font-semibold text-white text-lg">{{ $salon->nombre }}</div>
                                                <div class="text-emerald-300/70 text-sm">{{ Str::limit($salon->descripcion, 50) }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <!-- Capacidad -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-emerald-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                            <span class="text-white font-medium">{{ $salon->capacidad_maxima }}</span>
                                            <span class="text-emerald-300/70 text-sm ml-1">personas</span>
                                        </div>
                                    </td>
                                    
                                    <!-- Precio -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="text-emerald-400 font-bold text-lg mr-1">Q</span>
                                            <span class="text-white font-bold text-lg">{{ number_format($salon->precio_base, 2) }}</span>
                                        </div>
                                    </td>

                                    
                                    <!-- Estado -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="aurora-badge inline-flex px-3 py-1 rounded-full text-xs font-semibold
                                            @if($salon->estado == 'activo') bg-green-500/20 text-green-300 border border-green-400/30
                                            @elseif($salon->estado == 'mantenimiento') bg-yellow-500/20 text-yellow-300 border border-yellow-400/30
                                            @else bg-red-500/20 text-red-300 border border-red-400/30
                                            @endif">
                                            @if($salon->estado == 'activo')
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                </svg>
                                            @elseif($salon->estado == 'mantenimiento')
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                                </svg>
                                            @else
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                                </svg>
                                            @endif
                                            {{ ucfirst($salon->estado) }}
                                        </span>
                                    </td>
                                    
                                    <!-- Acciones -->
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex justify-center items-center gap-2">
                                            <!-- Ver -->
                                            <a href="{{ route('salones.show', $salon) }}" 
                                               class="aurora-btn-secondary text-white px-3 py-2 rounded-lg text-sm font-medium flex items-center gap-1 hover:scale-105 transition-transform"
                                               title="Ver detalles">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                Ver
                                            </a>
                                            
                                            <!-- Editar -->
                                            <a href="{{ route('salones.edit', $salon) }}" 
                                               class="aurora-btn-warning text-white px-3 py-2 rounded-lg text-sm font-medium flex items-center gap-1 hover:scale-105 transition-transform"
                                               title="Editar salón">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Editar
                                            </a>
                                            
                                            <!-- Eliminar -->
                                            <form action="{{ route('salones.destroy', $salon) }}" method="POST" 
                                                  class="inline-block"
                                                  onsubmit="return confirmDelete('{{ $salon->nombre }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="aurora-btn-danger text-white px-3 py-2 rounded-lg text-sm font-medium flex items-center gap-1 hover:scale-105 transition-transform"
                                                        title="Eliminar salón">
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
                                    <td colspan="6" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-16 h-16 text-emerald-300/50 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                            </svg>
                                            <h3 class="text-xl font-semibold text-emerald-200 mb-2">No hay salones registrados</h3>
                                            <p class="text-emerald-300/70 mb-6">Comienza creando tu primer salón de eventos</p>
                                            <a href="{{ route('salones.create') }}" 
                                               class="aurora-btn text-white font-semibold px-6 py-3 rounded-lg flex items-center gap-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                </svg>
                                                Crear Primer Salón
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Paginación -->
            @if($salones->hasPages())
                <div class="mt-8 flex justify-center fade-in fade-in-delay-3">
                    <div class="aurora-card rounded-xl p-4">
                        <div class="flex items-center space-x-2">
                            {{-- Botón anterior --}}
                            @if ($salones->onFirstPage())
                                <span class="px-3 py-2 text-emerald-300/50 cursor-not-allowed">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </span>
                            @else
                                <a href="{{ $salones->previousPageUrl() }}" 
                                   class="px-3 py-2 text-emerald-300 hover:text-white hover:bg-emerald-500/20 rounded-lg transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </a>
                            @endif

                            {{-- Números de página --}}
                            @foreach ($salones->getUrlRange(1, $salones->lastPage()) as $page => $url)
                                @if ($page == $salones->currentPage())
                                    <span class="px-4 py-2 bg-emerald-500/30 text-emerald-200 rounded-lg font-semibold">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" 
                                       class="px-4 py-2 text-emerald-300 hover:text-white hover:bg-emerald-500/20 rounded-lg transition-all">{{ $page }}</a>
                                @endif
                            @endforeach

                            {{-- Botón siguiente --}}
                            @if ($salones->hasMorePages())
                                <a href="{{ $salones->nextPageUrl() }}" 
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
                            Mostrando {{ $salones->firstItem() }} a {{ $salones->lastItem() }} de {{ $salones->total() }} salones
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        // Sistema de búsqueda en tiempo real
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const statusFilter = document.getElementById('statusFilter');
            const tableBody = document.getElementById('salonesTableBody');
            const rows = document.querySelectorAll('.salon-row');

            function filterTable() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedStatus = statusFilter.value.toLowerCase();

                rows.forEach(row => {
                    const name = row.dataset.name;
                    const status = row.dataset.status;
                    
                    const matchesSearch = name.includes(searchTerm);
                    const matchesStatus = selectedStatus === '' || status === selectedStatus;
                    
                    if (matchesSearch && matchesStatus) {
                        row.style.display = '';
                        row.style.opacity = '1';
                        row.style.transform = 'translateY(0)';
                    } else {
                        row.style.opacity = '0';
                        row.style.transform = 'translateY(-10px)';
                        setTimeout(() => {
                            if (row.style.opacity === '0') {
                                row.style.display = 'none';
                            }
                        }, 300);
                    }
                });

                // Mostrar mensaje si no hay resultados
                const visibleRows = Array.from(rows).filter(row => row.style.display !== 'none');
                if (visibleRows.length === 0 && (searchTerm || selectedStatus)) {
                    showNoResults();
                } else {
                    hideNoResults();
                }
            }

            function showNoResults() {
                let noResultsRow = document.getElementById('noResultsRow');
                if (!noResultsRow) {
                    noResultsRow = document.createElement('tr');
                    noResultsRow.id = 'noResultsRow';
                    noResultsRow.innerHTML = `
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <svg class="w-16 h-16 text-emerald-300/50 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <h3 class="text-xl font-semibold text-emerald-200 mb-2">No se encontraron salones</h3>
                                <p class="text-emerald-300/70">Intenta ajustar los filtros de búsqueda</p>
                            </div>
                        </td>
                    `;
                    tableBody.appendChild(noResultsRow);
                }
            }

            function hideNoResults() {
                const noResultsRow = document.getElementById('noResultsRow');
                if (noResultsRow) {
                    noResultsRow.remove();
                }
            }

            // Event listeners
            searchInput.addEventListener('input', filterTable);
            statusFilter.addEventListener('change', filterTable);

            // Animaciones de entrada
            const fadeElements = document.querySelectorAll('.fade-in');
            fadeElements.forEach((element, index) => {
                element.style.animationDelay = `${index * 0.1}s`;
            });
        });

        // Función de confirmación para eliminar
        function confirmDelete(salonName) {
            return confirm(`¿Estás seguro de que quieres eliminar el salón "${salonName}"?\n\nEsta acción no se puede deshacer.`);
        }

        // Efectos adicionales para mejorar la experiencia
        document.addEventListener('DOMContentLoaded', function() {
            // Efecto hover mejorado para las filas
            const rows = document.querySelectorAll('.salon-row');
            rows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(5px)';
                });
                
                row.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateX(0)';
                });
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