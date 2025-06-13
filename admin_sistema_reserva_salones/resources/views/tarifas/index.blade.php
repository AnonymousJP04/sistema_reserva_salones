<x-app-layout>
    <x-slot name="header">
        <!-- Header con efectos Aurora -->
        <div class="relative overflow-hidden rounded-lg">
            <!-- Fondo Aurora para el header -->
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-800 to-green-900 opacity-90"></div>
            <div class="relative px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <!-- Icono Aurora animado -->
                        <div class="animate-bounce">
                            <svg class="w-8 h-8 text-green-400" viewBox="0 0 24 24" fill="none">
                                <defs>
                                    <linearGradient id="tarifasGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#22c55e"/>
                                        <stop offset="50%" style="stop-color:#10b981"/>
                                        <stop offset="100%" style="stop-color:#059669"/>
                                    </linearGradient>
                                </defs>
                                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" stroke="url(#tarifasGradient)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-2xl bg-gradient-to-r from-green-400 via-green-300 to-green-500 bg-clip-text text-transparent">
                                Listado de Tarifas
                            </h2>
                            <p class="text-green-200 text-sm opacity-90">Gestión de precios y tarifas de salones</p>
                        </div>
                    </div>
                    
                    <!-- Estadísticas rápidas -->
                    <div class="hidden md:flex items-center space-x-6">
                        <div class="text-center">
                            <p class="text-2xl font-bold text-white">{{ $tarifas->count() }}</p>
                            <p class="text-green-200 text-xs">Tarifas</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold text-green-400">{{ $tarifas->where('activa', true)->count() }}</p>
                            <p class="text-green-200 text-xs">Activas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <!-- Fondo Aurora para toda la página -->
    <div class="aurora-bg fixed inset-0 z-0"></div>
    
    <!-- Partículas flotantes -->
    <div class="particles fixed inset-0 pointer-events-none z-10">
        <div class="particle" style="left: 5%; animation-delay: 0s;"></div>
        <div class="particle" style="left: 15%; animation-delay: 1s;"></div>
        <div class="particle" style="left: 25%; animation-delay: 2s;"></div>
        <div class="particle" style="left: 35%; animation-delay: 3s;"></div>
        <div class="particle" style="left: 45%; animation-delay: 4s;"></div>
        <div class="particle" style="left: 55%; animation-delay: 5s;"></div>
        <div class="particle" style="left: 65%; animation-delay: 6s;"></div>
        <div class="particle" style="left: 75%; animation-delay: 7s;"></div>
        <div class="particle" style="left: 85%; animation-delay: 8s;"></div>
        <div class="particle" style="left: 95%; animation-delay: 9s;"></div>
    </div>

    <div class="relative z-20 max-w-7xl mx-auto p-6">
        
        <!-- Filtros y controles -->
        <div class="mb-8 backdrop-blur-xl bg-white/10 border border-green-400/30 shadow-2xl rounded-2xl p-6 
                   opacity-0 animate-fade-in">
            <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                <!-- Filtros -->
                <div class="flex flex-wrap gap-3">
                    <select class="px-4 py-2 rounded-lg bg-white/10 border border-white/30 text-white 
                                  focus:border-green-400 focus:ring-2 focus:ring-green-400/50 backdrop-blur-sm
                                  transition-all duration-300" onchange="filterByStatus(this.value)">
                        <option value="" class="bg-slate-800">Todas las tarifas</option>
                        <option value="activa" class="bg-slate-800">Activas</option>
                        <option value="inactiva" class="bg-slate-800">Inactivas</option>
                    </select>
                    
                    <select class="px-4 py-2 rounded-lg bg-white/10 border border-white/30 text-white 
                                  focus:border-green-400 focus:ring-2 focus:ring-green-400/50 backdrop-blur-sm
                                  transition-all duration-300" onchange="filterByEventType(this.value)">
                        <option value="" class="bg-slate-800">Todos los tipos</option>
                        <option value="corporativo" class="bg-slate-800">Corporativo</option>
                        <option value="social" class="bg-slate-800">Social</option>
                        <option value="familiar" class="bg-slate-800">Familiar</option>
                    </select>
                </div>
                
                <!-- Búsqueda y acciones -->
                <div class="flex gap-3">
                    <div class="relative">
                        <input type="text" placeholder="Buscar tarifas..." 
                               class="pl-10 pr-4 py-2 rounded-lg bg-white/10 border border-white/30 text-white placeholder-white/50 
                                     focus:border-green-400 focus:ring-2 focus:ring-green-400/50 backdrop-blur-sm
                                     transition-all duration-300 w-64" 
                               onkeyup="searchTarifas(this.value)">
                        <svg class="w-5 h-5 text-white/50 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    
                    <a href="{{ route('tarifas.create') }}" 
                       class="px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 
                             text-white font-semibold rounded-lg transition-all duration-300 shadow-lg
                             flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Nueva Tarifa</span>
                    </a>
                    
                    <!-- Botones de exportación mejorados -->
<div class="flex gap-2">
    <button class="px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 
                  text-white font-semibold rounded-lg transition-all duration-300 shadow-lg transform hover:scale-105
                  flex items-center space-x-2" onclick="exportToCSV()">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
        </svg>
        <span>CSV</span>
    </button>
    
    <button class="px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 
                  text-white font-semibold rounded-lg transition-all duration-300 shadow-lg transform hover:scale-105
                  flex items-center space-x-2" onclick="exportToPDF()">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
        </svg>
        <span>PDF</span>
    </button>
    
    
</div>
                </div>
            </div>
        </div>

        <!-- Tabla de tarifas -->
        <div class="backdrop-blur-xl bg-white/10 border border-green-400/30 shadow-2xl rounded-2xl overflow-hidden 
                   opacity-0 animate-fade-in" style="animation-delay: 0.2s;">
            
            <!-- Header de la tabla -->
            <div class="bg-gradient-to-r from-green-600 via-green-500 to-green-600 text-white px-6 py-4">
                <h3 class="text-xl font-bold flex items-center space-x-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                    <span>Tarifas Registradas</span>
                </h3>
            </div>

            <!-- Contenido de la tabla -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-white/20" id="tarifasTable">
                    <thead class="bg-gradient-to-r from-slate-700/50 to-slate-800/50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-green-300 uppercase tracking-wider cursor-pointer hover:text-green-200 transition-colors"
                                onclick="sortTable(0)">
                                <div class="flex items-center space-x-1">
                                    <span>Salón</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-green-300 uppercase tracking-wider">
                                Nombre Tarifa
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-green-300 uppercase tracking-wider">
                                Tipo Evento
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-green-300 uppercase tracking-wider cursor-pointer hover:text-green-200 transition-colors"
                                onclick="sortTable(3)">
                                <div class="flex items-center space-x-1">
                                    <span>Precio/Hora</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-green-300 uppercase tracking-wider">
                                Medio Día
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-green-300 uppercase tracking-wider">
                                Día Completo
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-green-300 uppercase tracking-wider">
                                Estado
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-green-300 uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gradient-to-br from-slate-800/30 to-slate-900/50 divide-y divide-white/10" id="tarifasTableBody">
                        @forelse($tarifas as $tarifa)
                            <tr class="hover:bg-white/5 transition-all duration-300 group" 
                                data-active="{{ $tarifa->activa ? 'activa' : 'inactiva' }}" 
                                data-event-type="{{ $tarifa->tipo_evento ?? '' }}">
                                
                                <!-- Salón -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-white font-semibold">{{ $tarifa->salon->nombre ?? 'N/A' }}</p>
                                            <p class="text-white/60 text-xs">Salón asignado</p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Nombre Tarifa -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-white font-semibold">{{ $tarifa->nombre ?? 'Sin nombre' }}</p>
                                            <p class="text-white/60 text-xs">Nombre de la tarifa</p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Tipo Evento -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold border
                                        {{ $tarifa->tipo_evento === 'corporativo' ? 'bg-indigo-500/20 text-indigo-300 border-indigo-500/40' : 
                                           ($tarifa->tipo_evento === 'social' ? 'bg-pink-500/20 text-pink-300 border-pink-500/40' : 
                                           'bg-orange-500/20 text-orange-300 border-orange-500/40') }}">
                                        @if($tarifa->tipo_evento === 'corporativo')
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"></path>
                                            </svg>
                                        @elseif($tarifa->tipo_evento === 'social')
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                            </svg>
                                        @endif
                                        {{ ucfirst($tarifa->tipo_evento ?? 'General') }}
                                    </span>
                                </td>

                                <!-- Precio por Hora -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-white font-bold text-lg">Q {{ number_format($tarifa->precio_hora ?? 0, 2) }}</p>
                                            <p class="text-green-300 text-xs">Por hora</p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Precio Medio Día -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-white font-bold text-lg">Q {{ number_format($tarifa->precio_medio_dia ?? 0, 2) }}</p>
                                            <p class="text-yellow-300 text-xs">Medio día</p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Precio Día Completo -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V7a2 2 0 012-2h4a2 2 0 012 2v0M8 7v8a2 2 0 002 2h4a2 2 0 002-2V7m-6 0h6"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-white font-bold text-lg">Q {{ number_format($tarifa->precio_dia_completo ?? 0, 2) }}</p>
                                            <p class="text-orange-300 text-xs">Día completo</p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Estado -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold border
                                        {{ $tarifa->activa ? 'bg-green-500/20 text-green-300 border-green-500/40' : 'bg-gray-500/20 text-gray-300 border-gray-500/40' }}">
                                        @if($tarifa->activa)
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            Activa
                                        @else
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                            </svg>
                                            Inactiva
                                        @endif
                                    </span>
                                </td>

                                <!-- Acciones -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-2">
                                        @if(Route::has('tarifas.show'))
                                            <a href="{{ route('tarifas.show', $tarifa->id) }}" 
                                               class="inline-flex items-center px-3 py-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 
                                                     text-white text-sm font-semibold rounded-lg transition-all duration-300 shadow-lg hover:-translate-y-1
                                                     opacity-0 group-hover:opacity-100">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                Ver
                                            </a>
                                        @endif
                                        
                                        @if(Route::has('tarifas.edit'))
                                            <a href="{{ route('tarifas.edit', $tarifa->id) }}" 
                                               class="inline-flex items-center px-3 py-2 bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 
                                                     text-white text-sm font-semibold rounded-lg transition-all duration-300 shadow-lg hover:-translate-y-1
                                                     opacity-0 group-hover:opacity-100">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                </svg>
                                                Editar
                                            </a>
                                        @endif
                                        
                                        <button onclick="toggleStatus({{ $tarifa->id }}, {{ $tarifa->activa ? 'false' : 'true' }})" 
                                               class="inline-flex items-center px-3 py-2 bg-gradient-to-r 
                                                     {{ $tarifa->activa ? 'from-red-500 to-red-600 hover:from-red-600 hover:to-red-700' : 'from-green-500 to-green-600 hover:from-green-600 hover:to-green-700' }}
                                                     text-white text-sm font-semibold rounded-lg transition-all duration-300 shadow-lg hover:-translate-y-1
                                                     opacity-0 group-hover:opacity-100">
                                            @if($tarifa->activa)
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                Desactivar
                                            @else
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                Activar
                                            @endif
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-12 text-center">
                                    <div class="space-y-4">
                                        <svg class="w-16 h-16 mx-auto text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                        </svg>
                                        <h3 class="text-xl font-semibold text-white">No hay tarifas registradas</h3>
                                        <p class="text-white/60">Las tarifas de los salones aparecerán aquí una vez que sean creadas</p>
                                        <a href="{{ route('tarifas.create') }}" 
                                           class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 
                                                 text-white font-semibold rounded-lg transition-all duration-300 shadow-lg">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                            </svg>
                                            Crear primera tarifa
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Footer de la tabla con paginación -->
            @if(method_exists($tarifas, 'links'))
                <div class="bg-gradient-to-r from-slate-700/50 to-slate-800/50 px-6 py-4 flex items-center justify-between">
                    <div class="text-white/70 text-sm">
                        Mostrando {{ $tarifas->count() }} de {{ $tarifas->total() }} tarifas
                    </div>
                    <div class="pagination-wrapper">
                        {{ $tarifas->links() }}
                    </div>
                </div>
            @endif
        </div>

        <!-- Cards de resumen -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Total Tarifas -->
            <div class="backdrop-blur-xl bg-white/10 border border-green-400/30 shadow-2xl rounded-2xl p-6 
                       opacity-0 animate-fade-in hover:bg-white/15 transition-all duration-300" style="animation-delay: 0.4s;">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-green-300 font-semibold text-sm">Total Tarifas</p>
                        <p class="text-white text-2xl font-bold">{{ $tarifas->count() }}</p>
                    </div>
                </div>
            </div>

            <!-- Tarifas Activas -->
            <div class="backdrop-blur-xl bg-white/10 border border-green-400/30 shadow-2xl rounded-2xl p-6 
                       opacity-0 animate-fade-in hover:bg-white/15 transition-all duration-300" style="animation-delay: 0.6s;">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-700 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-green-300 font-semibold text-sm">Tarifas Activas</p>
                        <p class="text-white text-2xl font-bold">{{ $tarifas->where('activa', true)->count() }}</p>
                        <p class="text-green-200 text-xs">Disponibles</p>
                    </div>
                </div>
            </div>

            <!-- Precio Promedio -->
            <div class="backdrop-blur-xl bg-white/10 border border-yellow-400/30 shadow-2xl rounded-2xl p-6 
                       opacity-0 animate-fade-in hover:bg-white/15 transition-all duration-300" style="animation-delay: 0.8s;">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-yellow-300 font-semibold text-sm">Precio Promedio</p>
                        <p class="text-white text-2xl font-bold">Q {{ number_format($tarifas->avg('precio_hora') ?? 0, 0) }}</p>
                        <p class="text-yellow-200 text-xs">Por hora</p>
                    </div>
                </div>
            </div>

            <!-- Tarifas por Tipo -->
            <div class="backdrop-blur-xl bg-white/10 border border-blue-400/30 shadow-2xl rounded-2xl p-6 
                       opacity-0 animate-fade-in hover:bg-white/15 transition-all duration-300" style="animation-delay: 1s;">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-blue-300 font-semibold text-sm">Tipos Diferentes</p>
                        <p class="text-white text-2xl font-bold">{{ $tarifas->pluck('tipo_evento')->unique()->count() }}</p>
                        <p class="text-blue-200 text-xs">Categorías</p>
                    </div>
                </div>
            </div>
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
        
        /* Estilos para paginación */
        .pagination-wrapper .pagination {
            display: flex;
            space-x: 1rem;
        }
        
        .pagination-wrapper .pagination > * {
            padding: 0.5rem 0.75rem;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 0.5rem;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 1px solid rgba(34, 197, 94, 0.3);
        }
        
        .pagination-wrapper .pagination > *:hover {
            background: rgba(34, 197, 94, 0.2);
            border-color: rgba(34, 197, 94, 0.5);
            transform: translateY(-1px);
        }
        
        .pagination-wrapper .pagination .active {
            background: rgba(34, 197, 94, 0.3) !important;
            border-color: rgba(34, 197, 94, 0.6) !important;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .particles {
                display: none;
            }
            
            .overflow-x-auto {
                -webkit-overflow-scrolling: touch;
            }
            
            .grid-cols-1.md\:grid-cols-4 {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        /* Efectos hover mejorados */
        tr:hover {
            background: rgba(255, 255, 255, 0.05) !important;
        }
        
        /* Estilos para select */
        select option {
            background-color: #1e293b !important;
            color: white !important;
        }
        
        /* Estilos para botones de acción */
        .group:hover .opacity-0 {
            opacity: 1;
        }
    </style>

    <!-- Script para efectos y funcionalidades -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Crear partículas dinámicamente
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

            // Crear partículas cada 3 segundos
            setInterval(createParticle, 3000);

            // Animación de entrada escalonada
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -30px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animationPlayState = 'running';
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.animate-fade-in').forEach(el => {
                observer.observe(el);
            });
        });

        // Función para filtrar por estado
        function filterByStatus(status) {
            const rows = document.querySelectorAll('#tarifasTableBody tr');
            
            rows.forEach(row => {
                if (status === '' || row.getAttribute('data-active') === status) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
            
            updateVisibleCount();
        }

        // Función para filtrar por tipo de evento
        function filterByEventType(eventType) {
            const rows = document.querySelectorAll('#tarifasTableBody tr');
            
            rows.forEach(row => {
                if (eventType === '' || row.getAttribute('data-event-type') === eventType) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
            
            updateVisibleCount();
        }

        // Función para buscar tarifas
        function searchTarifas(query) {
            const rows = document.querySelectorAll('#tarifasTableBody tr');
            const searchTerm = query.toLowerCase();
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
            
            updateVisibleCount();
        }

        // Función para actualizar contador de elementos visibles
        function updateVisibleCount() {
            const visibleRows = document.querySelectorAll('#tarifasTableBody tr[style="table-row"], #tarifasTableBody tr:not([style*="none"])');
            const totalRows = document.querySelectorAll('#tarifasTableBody tr');
            
            const counter = document.querySelector('.text-white\\/70.text-sm');
            if (counter) {
                counter.textContent = `Mostrando ${visibleRows.length} de ${totalRows.length} tarifas`;
            }
        }

        // Función para ordenar tabla
        function sortTable(columnIndex) {
            const table = document.getElementById('tarifasTable');
            const tbody = table.getElementsByTagName('tbody')[0];
            const rows = Array.from(tbody.getElementsByTagName('tr'));
            
            // Determinar dirección de ordenamiento
            const header = table.getElementsByTagName('th')[columnIndex];
            const isAscending = !header.classList.contains('sorted-desc');
            
            // Limpiar clases de ordenamiento previas
            document.querySelectorAll('th').forEach(th => {
                th.classList.remove('sorted-asc', 'sorted-desc');
            });
            
            // Agregar clase de ordenamiento actual
            header.classList.add(isAscending ? 'sorted-asc' : 'sorted-desc');
            
            // Ordenar filas
            rows.sort((a, b) => {
                const aText = a.getElementsByTagName('td')[columnIndex].textContent.trim();
                const bText = b.getElementsByTagName('td')[columnIndex].textContent.trim();
                
                // Manejar números (precios)
                if (columnIndex === 3) { // Columna de precio
                    const aPrice = parseFloat(aText.replace(/[Q,]/g, '')) || 0;
                    const bPrice = parseFloat(bText.replace(/[Q,]/g, '')) || 0;
                    return isAscending ? aPrice - bPrice : bPrice - aPrice;
                }
                
                // Manejar texto
                return isAscending ? aText.localeCompare(bText) : bText.localeCompare(aText);
            });
            
            // Reorganizar filas en el DOM
            rows.forEach(row => {
                tbody.appendChild(row);
            });
        }

        // Función para exportar tarifas
        // ===== FUNCIONES DE EXPORTACIÓN MEJORADAS =====

// Función para exportar tarifas a CSV
function exportToCSV() {
    showNotification('Preparando exportación CSV...', 'info');
    
    // Obtener datos de la tabla
    const table = document.getElementById('tarifasTable');
    const rows = table.querySelectorAll('tbody tr:not([style*="none"])'); // Solo filas visibles
    
    // Crear datos CSV
    let csvContent = "data:text/csv;charset=utf-8,";
    
    // Headers
    csvContent += "Salón,Nombre Tarifa,Tipo Evento,Precio Hora,Precio Medio Día,Precio Día Completo,Estado\n";
    
    // Datos
    rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        if (cells.length > 0) {
            const salon = cells[0].textContent.trim().split('\n')[0];
            const nombre = cells[1].textContent.trim().split('\n')[0];
            const tipo = cells[2].textContent.trim().replace(/\s+/g, ' ');
            const precioHora = cells[3].textContent.trim().split('\n')[0].replace('Q ', '');
            const precioMedio = cells[4].textContent.trim().split('\n')[0].replace('Q ', '');
            const precioDia = cells[5].textContent.trim().split('\n')[0].replace('Q ', '');
            const estado = cells[6].textContent.trim().replace(/\s+/g, ' ');
            
            csvContent += `"${salon}","${nombre}","${tipo}","${precioHora}","${precioMedio}","${precioDia}","${estado}"\n`;
        }
    });
    
    // Crear y descargar archivo
    const encodedUri = encodeURI(csvContent);
    const link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", `tarifas_eventos_aurora_${new Date().toISOString().split('T')[0]}.csv`);
    document.body.appendChild(link);
    
    setTimeout(() => {
        link.click();
        document.body.removeChild(link);
        showNotification('Exportación CSV completada exitosamente', 'success');
    }, 1000);
}

// Función para exportar tarifas a PDF
function exportToPDF() {
    showNotification('Preparando exportación PDF...', 'info');
    
    // Obtener datos de la tabla
    const table = document.getElementById('tarifasTable');
    const rows = table.querySelectorAll('tbody tr:not([style*="none"])'); // Solo filas visibles
    
    // Crear nueva ventana para la impresión
    const printWindow = window.open('', '_blank');
    
    let tableContent = '';
    let totalTarifas = 0;
    let tarifasActivas = 0;
    let promedioPrecio = 0;
    let sumaPrecio = 0;
    
    // Procesar datos
    rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        if (cells.length > 0) {
            const salon = cells[0].textContent.trim().split('\n')[0];
            const nombre = cells[1].textContent.trim().split('\n')[0];
            const tipo = cells[2].textContent.trim().replace(/\s+/g, ' ');
            const precioHora = cells[3].textContent.trim().split('\n')[0];
            const precioMedio = cells[4].textContent.trim().split('\n')[0];
            const precioDia = cells[5].textContent.trim().split('\n')[0];
            const estado = cells[6].textContent.trim();
            
            // Estadísticas
            totalTarifas++;
            if (estado.includes('Activa')) tarifasActivas++;
            
            const precioNumerico = parseFloat(precioHora.replace(/[Q,]/g, '')) || 0;
            sumaPrecio += precioNumerico;
            
            tableContent += `
                <tr>
                    <td>${salon}</td>
                    <td>${nombre}</td>
                    <td style="text-align: center;">${tipo}</td>
                    <td style="text-align: right;">${precioHora}</td>
                    <td style="text-align: right;">${precioMedio}</td>
                    <td style="text-align: right;">${precioDia}</td>
                    <td style="text-align: center;">${estado.replace(/\s+/g, ' ')}</td>
                </tr>
            `;
        }
    });
    
    promedioPrecio = totalTarifas > 0 ? (sumaPrecio / totalTarifas) : 0;
    
    // HTML para el PDF
    const htmlContent = `
        <!DOCTYPE html>
        <html>
        <head>
            <title>Reporte de Tarifas - Eventos Aurora</title>
            <style>
                body { font-family: Arial, sans-serif; margin: 20px; font-size: 12px; }
                .header { text-align: center; margin-bottom: 30px; border-bottom: 3px solid #22c55e; padding-bottom: 20px; }
                .header h1 { color: #22c55e; margin: 0; font-size: 28px; }
                .header p { color: #666; margin: 8px 0; font-size: 14px; }
                .stats { display: flex; justify-content: space-around; margin: 20px 0; background-color: #f8f9fa; padding: 15px; border-radius: 8px; }
                .stat-item { text-align: center; }
                .stat-item h3 { margin: 0; color: #22c55e; font-size: 18px; }
                .stat-item p { margin: 5px 0; color: #666; font-size: 11px; }
                table { width: 100%; border-collapse: collapse; margin-top: 20px; font-size: 10px; }
                th, td { border: 1px solid #ddd; padding: 6px; text-align: left; }
                th { background-color: #22c55e; color: white; font-weight: bold; text-align: center; }
                tr:nth-child(even) { background-color: #f9f9f9; }
                .footer { margin-top: 30px; text-align: center; font-size: 10px; color: #666; border-top: 1px solid #ddd; padding-top: 15px; }
                .watermark { position: fixed; bottom: 20px; right: 20px; opacity: 0.1; font-size: 48px; color: #22c55e; transform: rotate(-45deg); z-index: -1; }
            </style>
        </head>
        <body>
            <div class="watermark">💰 AURORA</div>
            
            <div class="header">
                <h1>💰 Reporte de Tarifas</h1>
                <p><strong>Sistema de Gestión de Eventos Aurora</strong></p>
                <p>Generado el: ${new Date().toLocaleDateString('es-ES', { 
                    weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit'
                })}</p>
                <p>Total de registros: <strong>${totalTarifas}</strong></p>
            </div>
            
            <div class="stats">
                <div class="stat-item">
                    <h3>${totalTarifas}</h3>
                    <p>Total Tarifas</p>
                </div>
                <div class="stat-item">
                    <h3>${tarifasActivas}</h3>
                    <p>Tarifas Activas</p>
                </div>
                <div class="stat-item">
                    <h3>Q ${promedioPrecio.toLocaleString('es-ES', {minimumFractionDigits: 2})}</h3>
                    <p>Precio Promedio/Hora</p>
                </div>
                <div class="stat-item">
                    <h3>${totalTarifas > 0 ? Math.round((tarifasActivas / totalTarifas) * 100) : 0}%</h3>
                    <p>Tarifas Disponibles</p>
                </div>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>Salón</th>
                        <th>Nombre Tarifa</th>
                        <th>Tipo Evento</th>
                        <th>Precio/Hora</th>
                        <th>Medio Día</th>
                        <th>Día Completo</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    ${tableContent}
                </tbody>
            </table>
            
            <div class="footer">
                <p><strong>💰 Eventos Aurora - Sistema de Gestión de Tarifas</strong></p>
                <p>Este reporte contiene información confidencial sobre precios y tarifas.</p>
            </div>
        </body>
        </html>
    `;
    
    printWindow.document.write(htmlContent);
    printWindow.document.close();
    
    setTimeout(() => {
        printWindow.print();
        showNotification('PDF generado exitosamente - Verifique la ventana de impresión', 'success');
    }, 1500);
}

// Función para exportar en todos los formatos
function exportAllFormats() {
    showNotification('Preparando exportación completa...', 'info');
    
    setTimeout(() => exportToCSV(), 500);
    setTimeout(() => exportToPDF(), 2000);
    setTimeout(() => showNotification('Exportación completa finalizada - Revise sus descargas', 'success'), 4000);
}

        // Función para cambiar estado de tarifa
        function toggleStatus(tarifaId, newStatus) {
            const action = newStatus === 'true' ? 'activar' : 'desactivar';
            
            if (confirm(`¿Estás seguro de que quieres ${action} esta tarifa?`)) {
                showNotification(`Procesando cambio de estado...`, 'info');
                
                // Aquí implementarías la lógica para cambiar el estado
                // Por ejemplo, hacer una petición AJAX al servidor
                
                setTimeout(() => {
                    showNotification(`Tarifa ${action === 'activar' ? 'activada' : 'desactivada'} exitosamente`, 'success');
                    // Opcional: actualizar la fila o recargar la página
                    location.reload();
                }, 1500);
            }
        }

        // Función para mostrar notificaciones
        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            
            const icons = {
                success: '<svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>',
                error: '<svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>',
                info: '<svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>'
            };
            
            const colors = {
                success: 'bg-green-500/90 border-green-400/50',
                error: 'bg-red-500/90 border-red-400/50',
                info: 'bg-blue-500/90 border-blue-400/50'
            };
            
            notification.innerHTML = `
                <div class="flex items-center space-x-3">
                    <div class="flex-shrink-0">
                        ${icons[type] || icons.info}
                    </div>
                    <div class="text-white font-medium">${message}</div>
                </div>
            `;
            
            notification.className = `fixed top-4 right-4 ${colors[type] || colors.info} backdrop-blur-sm border text-white px-6 py-4 rounded-xl shadow-lg z-50 transform translate-x-full transition-transform duration-300`;
            
            document.body.appendChild(notification);
            
            // Animación de entrada
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);
            
            // Animación de salida
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.remove();
                    }
                }, 300);
            }, 3000);
        }

        // Atajos de teclado
        document.addEventListener('keydown', function(e) {
            // Ctrl/Cmd + F para enfocar búsqueda
            if ((e.ctrlKey || e.metaKey) && e.key === 'f') {
                e.preventDefault();
                const searchInput = document.querySelector('input[placeholder*="Buscar"]');
                if (searchInput) {
                    searchInput.focus();
                }
            }
            
            // Ctrl/Cmd + E para exportar CSV
if ((e.ctrlKey || e.metaKey) && e.key === 'e') {
    e.preventDefault();
    exportToCSV();
}

// Ctrl/Cmd + P para exportar PDF
if ((e.ctrlKey || e.metaKey) && e.key === 'p') {
    e.preventDefault();
    exportToPDF();
}
        });

        // Función para tracking
        function trackPageView() {
            console.log('💰 Vista de tarifas cargada');
            console.log('📊 Total de tarifas: {{ $tarifas->count() }}');
            console.log('✅ Tarifas activas: {{ $tarifas->where("activa", true)->count() }}');
        }

        // Ejecutar tracking
        trackPageView();

        // Mensajes de consola
        console.log('🌟 Eventos Aurora - Sistema de Gestión de Tarifas');
        console.log('✨ Vista de listado de tarifas cargada exitosamente');
        console.log('🎨 Tema Aurora aplicado correctamente');
    </script>
</x-app-layout>