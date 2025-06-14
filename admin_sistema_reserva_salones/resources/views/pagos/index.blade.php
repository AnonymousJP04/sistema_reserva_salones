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
                                    <linearGradient id="pagosGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#22c55e"/>
                                        <stop offset="50%" style="stop-color:#10b981"/>
                                        <stop offset="100%" style="stop-color:#059669"/>
                                    </linearGradient>
                                </defs>
                                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" stroke="url(#pagosGradient)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-2xl bg-gradient-to-r from-green-400 via-green-300 to-green-500 bg-clip-text text-transparent">
                                Lista de Pagos
                            </h2>
                            <p class="text-green-200 text-sm opacity-90">Gestión de transacciones y pagos</p>
                        </div>
                    </div>
                    
                    <!-- Estadísticas rápidas -->
                    <div class="hidden md:flex items-center space-x-6">
                        <div class="text-center">
                            <p class="text-2xl font-bold text-white">{{ $pagos->count() }}</p>
                            <p class="text-green-200 text-xs">Pagos</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold text-green-400">Q {{ number_format($pagos->where('estado', 'verificado')->sum('monto'), 2) }}</p>
                            <p class="text-green-200 text-xs">Verificados</p>
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
                        <option value="" class="bg-slate-800">Todos los estados</option>
                        <option value="pendiente" class="bg-slate-800">Pendiente</option>
                        <option value="verificado" class="bg-slate-800">Verificado</option>
                        <option value="rechazado" class="bg-slate-800">Rechazado</option>
                    </select>
                    
                    <select class="px-4 py-2 rounded-lg bg-white/10 border border-white/30 text-white 
                                  focus:border-green-400 focus:ring-2 focus:ring-green-400/50 backdrop-blur-sm
                                  transition-all duration-300" onchange="filterByMethod(this.value)">
                        <option value="" class="bg-slate-800">Todos los métodos</option>
                        <option value="efectivo" class="bg-slate-800">Efectivo</option>
                        <option value="tarjeta" class="bg-slate-800">Tarjeta</option>
                        <option value="deposito" class="bg-slate-800">Depósito</option>
                    </select>
                </div>
                
                <!-- Búsqueda y Exportación -->
                <div class="flex gap-3">
                    <div class="relative">
                        <input type="text" placeholder="Buscar por ID o reserva..." 
                               class="pl-10 pr-4 py-2 rounded-lg bg-white/10 border border-white/30 text-white placeholder-white/50 
                                     focus:border-green-400 focus:ring-2 focus:ring-green-400/50 backdrop-blur-sm
                                     transition-all duration-300 w-64" 
                               onkeyup="searchPayments(this.value)">
                        <svg class="w-5 h-5 text-white/50 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    
                    <!-- Botones de exportación -->
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
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla de pagos -->
        <div class="backdrop-blur-xl bg-white/10 border border-green-400/30 shadow-2xl rounded-2xl overflow-hidden 
                   opacity-0 animate-fade-in" style="animation-delay: 0.2s;">
            
            <!-- Header de la tabla -->
            <div class="bg-gradient-to-r from-green-600 via-green-500 to-green-600 text-white px-6 py-4">
                <h3 class="text-xl font-bold flex items-center space-x-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <span>Transacciones Registradas</span>
                </h3>
            </div>

            <!-- Contenido de la tabla -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-white/20" id="paymentsTable">
                    <thead class="bg-gradient-to-r from-slate-700/50 to-slate-800/50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-green-300 uppercase tracking-wider cursor-pointer hover:text-green-200 transition-colors"
                                onclick="sortTable(0)">
                                <div class="flex items-center space-x-1">
                                    <span>ID</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-green-300 uppercase tracking-wider cursor-pointer hover:text-green-200 transition-colors"
                                onclick="sortTable(1)">
                                <div class="flex items-center space-x-1">
                                    <span>Reserva</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-green-300 uppercase tracking-wider cursor-pointer hover:text-green-200 transition-colors"
                                onclick="sortTable(2)">
                                <div class="flex items-center space-x-1">
                                    <span>Monto</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-green-300 uppercase tracking-wider">
                                Método de Pago
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-green-300 uppercase tracking-wider cursor-pointer hover:text-green-200 transition-colors"
                                onclick="sortTable(4)">
                                <div class="flex items-center space-x-1">
                                    <span>Fecha</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-green-300 uppercase tracking-wider">
                                Estado
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-green-300 uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gradient-to-br from-slate-800/30 to-slate-900/50 divide-y divide-white/10" id="paymentsTableBody">
                        @foreach ($pagos as $pago)
                            <tr class="hover:bg-white/5 transition-all duration-300 group" data-status="{{ $pago->estado }}" data-method="{{ $pago->metodo_pago }}">
                                <!-- ID -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center">
                                            <span class="text-white font-bold text-sm">#{{ $pago->id }}</span>
                                        </div>
                                        <div>
                                            <p class="text-white font-semibold">{{ $pago->id }}</p>
                                            <p class="text-white/60 text-xs">ID del pago</p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Reserva ID -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V7a2 2 0 012-2h4a2 2 0 012 2v0M8 7v8a2 2 0 002 2h4a2 2 0 002-2V7m-6 0h6"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-white font-semibold">#{{ $pago->reserva_id }}</p>
                                            <p class="text-white/60 text-xs">Reserva asociada</p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Monto -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-white font-bold text-lg">Q {{ number_format($pago->monto, 2) }}</p>
                                            <p class="text-green-300 text-xs">Monto total</p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Método de Pago -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gradient-to-br 
                                            {{ $pago->metodo_pago === 'efectivo' ? 'from-yellow-400 to-yellow-600' : 
                                               ($pago->metodo_pago === 'tarjeta' ? 'from-indigo-400 to-indigo-600' : 'from-cyan-400 to-cyan-600') }} 
                                            rounded-full flex items-center justify-center">
                                            @if($pago->metodo_pago === 'efectivo')
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                                </svg>
                                            @elseif($pago->metodo_pago === 'tarjeta')
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                                </svg>
                                            @else
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                                </svg>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="text-white font-semibold capitalize">{{ $pago->metodo_pago }}</p>
                                            <p class="text-white/60 text-xs">Método usado</p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Fecha -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gradient-to-br from-pink-400 to-pink-600 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V7a2 2 0 012-2h4a2 2 0 012 2v0M8 7v8a2 2 0 002 2h4a2 2 0 002-2V7m-6 0h6"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-white font-semibold">{{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d M Y') }}</p>
                                            <p class="text-white/60 text-xs">{{ \Carbon\Carbon::parse($pago->fecha_pago)->format('H:i') }}</p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Estado -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold border
                                        {{ $pago->estado == 'pendiente' ? 'bg-yellow-500/20 text-yellow-300 border-yellow-500/40' : 
                                           ($pago->estado == 'verificado' ? 'bg-green-500/20 text-green-300 border-green-500/40' : 
                                           'bg-red-500/20 text-red-300 border-red-500/40') }}">
                                        @if($pago->estado == 'pendiente')
                                            <svg class="w-4 h-4 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            ⏳ Pendiente
                                        @elseif($pago->estado == 'verificado')
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            ✅ Verificado
                                        @else
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                            Rechazado
                                        @endif
                                    </span>
                                </td>

                                <!-- Acciones -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('pagos.show', $pago->id) }}" 
                                           class="inline-flex items-center px-3 py-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 
                                                 text-white text-sm font-semibold rounded-lg transition-all duration-300 shadow-lg hover:-translate-y-1
                                                 opacity-0 group-hover:opacity-100">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            Ver
                                        </a>
                                        
                                        @if($pago->estado === 'pendiente')
                                            <form action="{{ route('pagos.update', $pago->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" onclick="return confirm('¿Estás seguro de que quieres aprobar este pago?')"
                                                       class="inline-flex items-center px-3 py-2 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 
                                                             text-white text-sm font-semibold rounded-lg transition-all duration-300 shadow-lg hover:-translate-y-1
                                                             opacity-0 group-hover:opacity-100">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                    OK
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Footer de la tabla con paginación -->
            <div class="bg-gradient-to-r from-slate-700/50 to-slate-800/50 px-6 py-4 flex items-center justify-between">
                <div class="text-white/70 text-sm">
                    Mostrando {{ $pagos->count() }} de {{ $pagos->total() }} pagos
                </div>
                <div class="pagination-wrapper">
                    {{ $pagos->links() }}
                </div>
            </div>
        </div>

        <!-- Cards de resumen -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Total Pagos -->
            <div class="backdrop-blur-xl bg-white/10 border border-green-400/30 shadow-2xl rounded-2xl p-6 
                       opacity-0 animate-fade-in hover:bg-white/15 transition-all duration-300" style="animation-delay: 0.4s;">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-green-300 font-semibold text-sm">Total Recaudado</p>
                        <p class="text-white text-2xl font-bold">Q {{ number_format($pagos->sum('monto'), 2) }}</p>
                    </div>
                </div>
            </div>

            <!-- Pagos Pendientes -->
            <div class="backdrop-blur-xl bg-white/10 border border-yellow-400/30 shadow-2xl rounded-2xl p-6 
                       opacity-0 animate-fade-in hover:bg-white/15 transition-all duration-300" style="animation-delay: 0.6s;">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-full flex items-center justify-center animate-pulse">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-yellow-300 font-semibold text-sm">Pagos Pendientes</p>
                        <p class="text-white text-2xl font-bold">{{ $pagos->where('estado', 'pendiente')->count() }}</p>
                        <p class="text-yellow-200 text-xs">Q {{ number_format($pagos->where('estado', 'pendiente')->sum('monto'), 2) }} en espera</p>
                    </div>
                </div>
            </div>

            <!-- Tasa de Aprobación -->
            <div class="backdrop-blur-xl bg-white/10 border border-blue-400/30 shadow-2xl rounded-2xl p-6 
                       opacity-0 animate-fade-in hover:bg-white/15 transition-all duration-300" style="animation-delay: 0.8s;">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-blue-300 font-semibold text-sm">Tasa de Aprobación</p>
                        <p class="text-white text-2xl font-bold">
                            {{ $pagos->count() > 0 ? round(($pagos->where('estado', 'verificado')->count() / $pagos->count()) * 100, 1) : 0 }}%
                        </p>
                        <p class="text-blue-200 text-xs">{{ $pagos->where('estado', 'verificado')->count() }} de {{ $pagos->count() }} aprobados</p>
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
        
        /* Estilos responsivos */
        @media (max-width: 768px) {
            .particles {
                display: none;
            }
            
            .overflow-x-auto {
                -webkit-overflow-scrolling: touch;
            }
            
            .grid-cols-1.md\:grid-cols-3 {
                grid-template-columns: 1fr;
            }
        }
        
        /* Efectos hover mejorados */
        tr:hover {
            background: rgba(255, 255, 255, 0.05) !important;
        }
        
        /* Estilos para select y input */
        select option {
            background-color: #1e293b !important;
            color: white !important;
        }
        
        /* Animaciones de carga */
        .loading {
            opacity: 0.5;
            pointer-events: none;
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
            const rows = document.querySelectorAll('#paymentsTableBody tr');
            
            rows.forEach(row => {
                if (status === '' || row.getAttribute('data-status') === status) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
            
            updateVisibleCount();
        }

        // Función para filtrar por método de pago
        function filterByMethod(method) {
            const rows = document.querySelectorAll('#paymentsTableBody tr');
            
            rows.forEach(row => {
                if (method === '' || row.getAttribute('data-method') === method) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
            
            updateVisibleCount();
        }

        // Función para buscar pagos
        function searchPayments(query) {
            const rows = document.querySelectorAll('#paymentsTableBody tr');
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
            const visibleRows = document.querySelectorAll('#paymentsTableBody tr[style="table-row"], #paymentsTableBody tr:not([style*="none"])');
            const totalRows = document.querySelectorAll('#paymentsTableBody tr');
            
            // Actualizar contador si existe
            const counter = document.querySelector('.text-white\\/70.text-sm');
            if (counter) {
                counter.textContent = `Mostrando ${visibleRows.length} de ${totalRows.length} pagos`;
            }
        }

        // Función para ordenar tabla
        function sortTable(columnIndex) {
            const table = document.getElementById('paymentsTable');
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
                
                // Manejar números
                if (!isNaN(aText) && !isNaN(bText)) {
                    return isAscending ? aText - bText : bText - aText;
                }
                
                // Manejar texto
                return isAscending ? aText.localeCompare(bText) : bText.localeCompare(aText);
            });
            
            // Reorganizar filas en el DOM
            rows.forEach(row => {
                tbody.appendChild(row);
            });
        }

        // ===== FUNCIONES DE EXPORTACIÓN =====
        
        // Función para exportar pagos a CSV
        function exportToCSV() {
            showNotification('Preparando exportación CSV...', 'info');
            
            // Obtener datos de la tabla
            const table = document.getElementById('paymentsTable');
            const rows = table.querySelectorAll('tbody tr:not([style*="none"])'); // Solo filas visibles
            
            // Crear datos CSV
            let csvContent = "data:text/csv;charset=utf-8,";
            
            // Headers
            csvContent += "ID,Reserva ID,Monto,Método de Pago,Fecha,Estado,Cliente\n";
            
            // Datos
            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                if (cells.length > 0) {
                    const id = cells[0].textContent.trim().split('\n')[0].replace('#', '');
                    const reserva = cells[1].textContent.trim().split('\n')[0].replace('#', '');
                    const monto = cells[2].textContent.trim().split('\n')[0].replace('Q ', '');
                    const metodo = cells[3].textContent.trim().split('\n')[0];
                    const fecha = cells[4].textContent.trim().split('\n')[0];
                    const estado = cells[5].textContent.trim().replace('⏳ ', '').replace('✅ ', '').replace('❌ ', '');
                    
                    csvContent += `"${id}","${reserva}","${monto}","${metodo}","${fecha}","${estado}","N/A"\n`;
                }
            });
            
            // Crear y descargar archivo
            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", `pagos_eventos_aurora_${new Date().toISOString().split('T')[0]}.csv`);
            document.body.appendChild(link);
            
            setTimeout(() => {
                link.click();
                document.body.removeChild(link);
                showNotification('Exportación CSV completada exitosamente', 'success');
            }, 1000);
        }

        // Función para exportar pagos a PDF
        function exportToPDF() {
            showNotification('Preparando exportación PDF...', 'info');
            
            // Obtener datos de la tabla
            const table = document.getElementById('paymentsTable');
            const rows = table.querySelectorAll('tbody tr:not([style*="none"])'); // Solo filas visibles
            
            // Crear nueva ventana para la impresión
            const printWindow = window.open('', '_blank');
            
            let tableContent = '';
            let totalMonto = 0;
            let pendientes = 0;
            let verificados = 0;
            let rechazados = 0;
            
            // Procesar datos
            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                if (cells.length > 0) {
                    const id = cells[0].textContent.trim().split('\n')[0];
                    const reserva = cells[1].textContent.trim().split('\n')[0];
                    const monto = cells[2].textContent.trim().split('\n')[0];
                    const metodo = cells[3].textContent.trim().split('\n')[0];
                    const fecha = cells[4].textContent.trim().split('\n')[0];
                    const estado = cells[5].textContent.trim();
                    
                    // Estadísticas
                    const montoNumerico = parseFloat(monto.replace('Q ', '').replace(',', ''));
                    if (!isNaN(montoNumerico)) totalMonto += montoNumerico;
                    
                    if (estado.includes('Pendiente')) pendientes++;
                    else if (estado.includes('Verificado')) verificados++;
                    else if (estado.includes('Rechazado')) rechazados++;
                    
                    tableContent += `
                        <tr>
                            <td>${id}</td>
                            <td>${reserva}</td>
                            <td style="text-align: right;">${monto}</td>
                            <td>${metodo}</td>
                            <td>${fecha}</td>
                            <td style="text-align: center;">${estado.replace('⏳ ', '').replace('✅ ', '').replace('❌ ', '')}</td>
                        </tr>
                    `;
                }
            });
            
            // HTML para el PDF
            const htmlContent = `
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Reporte de Pagos - Eventos Aurora</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            margin: 20px;
                            font-size: 12px;
                        }
                        .header {
                            text-align: center;
                            margin-bottom: 30px;
                            border-bottom: 3px solid #22c55e;
                            padding-bottom: 20px;
                        }
                        .header h1 {
                            color: #22c55e;
                            margin: 0;
                            font-size: 28px;
                        }
                        .header p {
                            color: #666;
                            margin: 8px 0;
                            font-size: 14px;
                        }
                        .stats {
                            display: flex;
                            justify-content: space-around;
                            margin: 20px 0;
                            background-color: #f8f9fa;
                            padding: 15px;
                            border-radius: 8px;
                            border: 1px solid #e9ecef;
                        }
                        .stat-item {
                            text-align: center;
                        }
                        .stat-item h3 {
                            margin: 0;
                            color: #22c55e;
                            font-size: 18px;
                        }
                        .stat-item p {
                            margin: 5px 0;
                            color: #666;
                            font-size: 11px;
                        }
                        table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-top: 20px;
                            font-size: 11px;
                        }
                        th, td {
                            border: 1px solid #ddd;
                            padding: 8px;
                            text-align: left;
                        }
                        th {
                            background-color: #22c55e;
                            color: white;
                            font-weight: bold;
                            text-align: center;
                        }
                        tr:nth-child(even) {
                            background-color: #f9f9f9;
                        }
                        tr:hover {
                            background-color: #e8f5e8;
                        }
                        .footer {
                            margin-top: 30px;
                            text-align: center;
                            font-size: 10px;
                            color: #666;
                            border-top: 1px solid #ddd;
                            padding-top: 15px;
                        }
                        .watermark {
                            position: fixed;
                            bottom: 20px;
                            right: 20px;
                            opacity: 0.1;
                            font-size: 48px;
                            color: #22c55e;
                            transform: rotate(-45deg);
                            z-index: -1;
                        }
                    </style>
                </head>
                <body>
                    <div class="watermark">🌟 AURORA</div>
                    
                    <div class="header">
                        <h1>📊 Reporte de Pagos</h1>
                        <p><strong>Sistema de Gestión de Eventos Aurora</strong></p>
                        <p>Generado el: ${new Date().toLocaleDateString('es-ES', { 
                            weekday: 'long', 
                            year: 'numeric', 
                            month: 'long', 
                            day: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit'
                        })}</p>
                        <p>Total de registros: <strong>${rows.length}</strong></p>
                    </div>
                    
                    <div class="stats">
                        <div class="stat-item">
                            <h3>Q ${totalMonto.toLocaleString('es-ES', {minimumFractionDigits: 2})}</h3>
                            <p>Total Recaudado</p>
                        </div>
                        <div class="stat-item">
                            <h3>${verificados}</h3>
                            <p>Pagos Verificados</p>
                        </div>
                        <div class="stat-item">
                            <h3>${pendientes}</h3>
                            <p>Pagos Pendientes</p>
                        </div>
                        <div class="stat-item">
                            <h3>${rows.length > 0 ? Math.round((verificados / rows.length) * 100) : 0}%</h3>
                            <p>Tasa de Aprobación</p>
                        </div>
                    </div>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Reserva</th>
                                <th>Monto</th>
                                <th>Método</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${tableContent}
                        </tbody>
                    </table>
                    
                    <div class="footer">
                        <p><strong>🌟 Eventos Aurora - Sistema de Gestión de Pagos</strong></p>
                        <p>Este reporte contiene información confidencial y es de uso exclusivo del personal autorizado.</p>
                        <p>Documento generado automáticamente - No requiere firma</p>
                    </div>
                </body>
                </html>
            `;
            
            printWindow.document.write(htmlContent);
            printWindow.document.close();
            
            // Esperar a que cargue y luego imprimir
            setTimeout(() => {
                printWindow.print();
                showNotification('PDF generado exitosamente - Verifique la ventana de impresión', 'success');
            }, 1500);
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

        // Función para manejar redimensionamiento
        function handleResize() {
            const isMobile = window.innerWidth <= 768;
            const particles = document.querySelectorAll('.particle');
            
            if (isMobile) {
                particles.forEach(particle => {
                    particle.style.display = 'none';
                });
            } else {
                particles.forEach(particle => {
                    particle.style.display = 'block';
                });
            }
        }

        // Escuchar cambios de tamaño
        window.addEventListener('resize', handleResize);

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
            console.log('💰 Vista de pagos cargada');
            console.log('📊 Total de pagos: {{ $pagos->count() }}');
            console.log('✅ Pagos verificados: {{ $pagos->where("estado", "verificado")->count() }}');
            console.log('⏳ Pagos pendientes: {{ $pagos->where("estado", "pendiente")->count() }}');
        }

        // Ejecutar tracking
        trackPageView();

        // Mensajes de consola
        console.log('🌟 Eventos Aurora - Sistema de Gestión de Pagos');
        console.log('✨ Vista de listado de pagos cargada exitosamente');
        console.log('🎨 Tema Aurora aplicado correctamente');
        console.log('📥 Funciones de exportación: CSV y PDF habilitadas');
        console.log('⌨️ Atajos: Ctrl+F (buscar), Ctrl+E (CSV), Ctrl+P (PDF)');
    </script>
</x-app-layout>