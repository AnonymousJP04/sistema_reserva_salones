<x-app-layout>
    <x-slot name="header">
        <!-- Meta CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!-- Header con efectos Aurora -->
        <div class="relative overflow-hidden rounded-lg">
            <!-- Fondo Aurora para el header -->
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-800 to-green-900 opacity-90"></div>
            <div class="relative px-6 py-4">
                <div class="flex items-center space-x-4">
                    <!-- Icono Aurora animado -->
                    <div class="animate-bounce">
                        <svg class="w-8 h-8 text-green-400" viewBox="0 0 24 24" fill="none">
                            <defs>
                                <linearGradient id="reservaGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#22c55e"/>
                                    <stop offset="50%" style="stop-color:#10b981"/>
                                    <stop offset="100%" style="stop-color:#059669"/>
                                </linearGradient>
                            </defs>
                            <path d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V7a2 2 0 012-2h4a2 2 0 012 2v0M8 7v8a2 2 0 002 2h4a2 2 0 002-2V7m-6 0h6" stroke="url(#reservaGradient)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h2 class="font-bold text-2xl bg-gradient-to-r from-green-400 via-green-300 to-green-500 bg-clip-text text-transparent">
                        {{ __('Detalle de la Reserva') }}
                    </h2>
                </div>
            </div>
        </div>
    </x-slot>

    <!-- Fondo Aurora para toda la página -->
    <div class="aurora-bg fixed inset-0 z-0"></div>
    
    <!-- Partículas flotantes -->
    <div class="particles fixed inset-0 pointer-events-none z-10">
        <div class="particle" style="left: 5%; animation-delay: 0s;"></div>
        <div class="particle" style="left: 20%; animation-delay: 1s;"></div>
        <div class="particle" style="left: 35%; animation-delay: 2s;"></div>
        <div class="particle" style="left: 50%; animation-delay: 3s;"></div>
        <div class="particle" style="left: 65%; animation-delay: 4s;"></div>
        <div class="particle" style="left: 80%; animation-delay: 5s;"></div>
        <div class="particle" style="left: 95%; animation-delay: 6s;"></div>
    </div>

    <div class="relative z-20 py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Botón de regreso -->
            <div class="mb-8">
                <a href="{{ route('reservas.index') }}"
                   class="group inline-flex items-center space-x-3 backdrop-blur-xl bg-white/10 hover:bg-white/20 
                          text-white border border-green-400/40 hover:border-green-400/70 rounded-xl px-6 py-4 
                          transition-all duration-300 shadow-lg hover:shadow-green-400/25 hover:-translate-y-1
                          opacity-0 animate-fade-in">
                    <div class="relative">
                        <svg class="w-5 h-5 group-hover:-translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        <div class="absolute inset-0 bg-green-400/20 rounded-full scale-0 group-hover:scale-150 transition-transform duration-300"></div>
                    </div>
                    <span class="font-semibold text-lg">Volver al listado</span>
                </a>
            </div>

            <!-- Contenedor principal -->
            <div class="backdrop-blur-xl bg-white/10 border border-green-400/30 shadow-2xl rounded-2xl overflow-hidden 
                       opacity-0 animate-fade-in" style="animation-delay: 0.2s;">
                
                <!-- Header del detalle -->
                <div class="bg-gradient-to-r from-green-600 via-green-500 to-green-600 text-white px-8 py-6 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent 
                               translate-x-[-100%] hover:translate-x-[100%] transition-transform duration-1000"></div>
                    <div class="relative z-10 flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold">Reserva #{{ $reserva->id }}</h3>
                                <p class="text-green-100 opacity-90">{{ now()->format('d M Y, H:i') }}</p>
                            </div>
                        </div>
                        
                        <!-- Estado de la reserva -->
                        <div class="text-right">
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold
                                {{ $reserva->estado === 'aprobada' ? 'bg-green-500/20 text-green-100 border border-green-400/50' : 
                                   ($reserva->estado === 'rechazada' ? 'bg-red-500/20 text-red-100 border border-red-400/50' : 
                                   ($reserva->estado === 'pendiente' ? 'bg-yellow-500/20 text-yellow-100 border border-yellow-400/50' : 
                                   'bg-blue-500/20 text-blue-100 border border-blue-400/50')) }}">
                                @if($reserva->estado === 'aprobada')
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                     Aprobada
                                @elseif($reserva->estado === 'rechazada')
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                     Rechazada
                                @elseif($reserva->estado === 'pendiente')
                                    <svg class="w-4 h-4 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Pendiente
                                @else
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ ucfirst($reserva->estado) }}
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Contenido principal -->
                <div class="p-8 bg-gradient-to-br from-slate-800/30 to-slate-900/50 space-y-8">
                    
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

    <!-- Información General de la Reserva -->
    <div class="backdrop-blur-xl bg-white/10 border border-green-400/30 shadow-2xl rounded-2xl overflow-hidden opacity-0 animate-fade-in">
        <div class="bg-gradient-to-r from-green-600 via-green-500 to-green-600 text-white px-6 py-4">
            <h3 class="text-xl font-bold flex items-center space-x-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V7a2 2 0 012-2h4a2 2 0 012 2v0M8 7v8a2 2 0 002 2h4a2 2 0 002-2V7m-6 0h6"></path>
                </svg>
                <span>Información de la Reserva</span>
            </h3>
        </div>
        <div class="p-6 space-y-6">
            <div class="flex items-center space-x-4 p-4 bg-white/5 rounded-xl border border-white/10">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-white/60 text-sm font-medium">Cliente</p>
                    <p class="text-white text-xl font-bold break-words">{{ $reserva->usuario->name ?? 'N/A' }}</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 p-4 bg-white/5 rounded-xl border border-white/10">
                <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-white/60 text-sm font-medium">Correo Electrónico</p>
                    <p class="text-white text-xl font-bold break-words">{{ $reserva->usuario->email ?? 'N/A' }}</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 p-4 bg-white/5 rounded-xl border border-white/10">
                <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-white/60 text-sm font-medium">Salón Reservado</p>
                    <p class="text-white text-xl font-bold break-words">{{ $reserva->salon->nombre ?? 'N/A' }}</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 p-4 bg-white/5 rounded-xl border border-white/10">
                <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-white/60 text-sm font-medium">Código de Reserva</p>
                    <p class="text-white text-xl font-bold break-words">{{ $reserva->codigo_reserva }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Detalles del Evento -->
    <div class="backdrop-blur-xl bg-white/10 border border-green-400/30 shadow-2xl rounded-2xl overflow-hidden opacity-0 animate-fade-in">
        <div class="bg-gradient-to-r from-blue-600 via-blue-500 to-blue-600 text-white px-6 py-4">
            <h3 class="text-xl font-bold flex items-center space-x-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V7a2 2 0 012-2h4a2 2 0 012 2v0M8 7v8a2 2 0 002 2h4a2 2 0 002-2V7m-6 0h6"></path>
                </svg>
                <span>Detalles del Evento</span>
            </h3>
        </div>
        <div class="p-6 space-y-6">
            <div class="flex items-center space-x-4 p-4 bg-white/5 rounded-xl border border-white/10">
                <div class="w-12 h-12 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-white/60 text-sm font-medium">Fecha de Reserva</p>
                    <p class="text-white text-xl font-bold break-words">{{ \Carbon\Carbon::parse($reserva->fecha_reserva)->format('d M Y') }}</p>
                    <p class="text-white/60 text-sm">{{ \Carbon\Carbon::parse($reserva->fecha_reserva)->locale('es')->dayName }}</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 p-4 bg-white/5 rounded-xl border border-white/10">
                <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-white/60 text-sm font-medium">Hora de Inicio</p>
                    <p class="text-white text-xl font-bold break-words">{{ \Carbon\Carbon::parse($reserva->hora_inicio)->format('H:i') }}</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 p-4 bg-white/5 rounded-xl border border-white/10">
                <div class="w-12 h-12 bg-gradient-to-br from-pink-400 to-pink-600 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-white/60 text-sm font-medium">Hora de Finalización</p>
                    <p class="text-white text-xl font-bold break-words">{{ \Carbon\Carbon::parse($reserva->hora_fin)->format('H:i') }}</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 p-4 bg-white/5 rounded-xl border border-white/10">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-white/60 text-sm font-medium">Número de Personas</p>
                    <p class="text-white text-xl font-bold break-words">{{ $reserva->numero_personas }}</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 p-4 bg-white/5 rounded-xl border border-white/10">
                <div class="w-12 h-12 bg-gradient-to-br from-indigo-400 to-indigo-600 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-white/60 text-sm font-medium">Tipo de Evento</p>
                    <p class="text-white text-xl font-bold break-words">{{ $reserva->tipo_evento ?? 'No especificado' }}</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 p-4 bg-white/5 rounded-xl border border-white/10">
                <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-white/60 text-sm font-medium">Total</p>
                    <p class="text-white text-xl font-bold break-words">Q {{ number_format($reserva->total, 2) }}</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 p-4 bg-white/5 rounded-xl border border-white/10">
                <div class="w-12 h-12 bg-gradient-to-br from-teal-400 to-teal-600 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-white/60 text-sm font-medium">Observaciones</p>
                    <p class="text-white text-base break-words">{{ $reserva->observaciones ?? 'Sin observaciones' }}</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 p-4 bg-white/5 rounded-xl border border-white/10">
                <div class="w-12 h-12 bg-gradient-to-br 
                    {{ $reserva->estado === 'aprobada' ? 'from-green-400 to-green-600' : 
                       ($reserva->estado === 'rechazada' ? 'from-red-400 to-red-600' : 
                       'from-yellow-400 to-yellow-600') }} 
                    rounded-full flex items-center justify-center">
                    @if($reserva->estado === 'aprobada')
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    @elseif($reserva->estado === 'rechazada')
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    @else
                        <svg class="w-6 h-6 text-white animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    @endif
                </div>
                <div class="flex-1">
                    <p class="text-white/60 text-sm font-medium">Estado de la Reserva</p>
                    <p class="text-white text-xl font-bold break-words">{{ ucfirst($reserva->estado) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

                    <!-- Observaciones -->
                    @if ($reserva->observaciones)
                        <div class="backdrop-blur-sm bg-white/5 p-6 rounded-xl border border-white/10 hover:bg-white/10 transition-all duration-300">
                            <h4 class="text-indigo-300 font-bold text-xl mb-4 flex items-center space-x-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span>Observaciones</span>
                            </h4>
                            
                            <div class="backdrop-blur-sm bg-white/5 p-6 rounded-lg border border-white/10">
                                <div class="flex items-start space-x-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-indigo-400 to-indigo-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-grow">
                                        <p class="text-white text-base leading-relaxed">{{ $reserva->observaciones }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Timeline de estado (opcional para mostrar historial) -->
                    <div class="backdrop-blur-sm bg-white/5 p-6 rounded-xl border border-white/10 hover:bg-white/10 transition-all duration-300">
                        <h4 class="text-emerald-300 font-bold text-xl mb-4 flex items-center space-x-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            <span>Resumen de la Reserva</span>
                        </h4>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Información creada -->
                            <div class="backdrop-blur-sm bg-white/5 p-4 rounded-lg text-center">
                                <div class="w-12 h-12 bg-gradient-to-br from-slate-400 to-slate-600 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </div>
                                <p class="text-slate-300 font-semibold text-sm">Creada</p>
                                <p class="text-white text-lg font-bold">{{ $reserva->created_at->format('d M Y') }}</p>
                                <p class="text-white/60 text-xs">{{ $reserva->created_at->format('H:i') }}</p>
                            </div>

                            <!-- Estado actual -->
                            <div class="backdrop-blur-sm bg-white/5 p-4 rounded-lg text-center">
                                <div class="w-12 h-12 bg-gradient-to-br 
                                    {{ $reserva->estado === 'aprobada' ? 'from-green-400 to-green-600' : 
                                       ($reserva->estado === 'rechazada' ? 'from-red-400 to-red-600' : 'from-yellow-400 to-yellow-600') }} 
                                    rounded-full flex items-center justify-center mx-auto mb-3">
                                    @if($reserva->estado === 'aprobada')
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    @elseif($reserva->estado === 'rechazada')
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    @else
                                        <svg class="w-6 h-6 text-white animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    @endif
                                </div>
                                <p class="text-{{ $reserva->estado === 'aprobada' ? 'green' : ($reserva->estado === 'rechazada' ? 'red' : 'yellow') }}-300 font-semibold text-sm">Estado Actual</p>
                                <p class="text-white text-lg font-bold">{{ ucfirst($reserva->estado) }}</p>
                            </div>

                            <!-- Última actualización -->
                            <div class="backdrop-blur-sm bg-white/5 p-4 rounded-lg text-center">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                    </svg>
                                </div>
                                <p class="text-blue-300 font-semibold text-sm">Actualizada</p>
                                <p class="text-white text-lg font-bold">{{ $reserva->updated_at->format('d M Y') }}</p>
                                <p class="text-white/60 text-xs">{{ $reserva->updated_at->format('H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Acciones -->
                    <div class="pt-6 border-t border-white/10">
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <button onclick="exportToPDF()" 
                               class="flex-1 backdrop-blur-sm bg-white/10 hover:bg-white/20 text-white font-semibold py-4 px-6 rounded-xl 
                                      border border-white/30 hover:border-white/50 transition-all duration-300 hover:-translate-y-1
                                      flex items-center justify-center space-x-3 shadow-lg max-w-xs mx-auto sm:mx-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                                </svg>
                                <span class="text-lg">Exportar PDF</span>
                            </button>

                            <button onclick="shareReservation()" 
                               class="flex-1 backdrop-blur-sm bg-green-500/20 hover:bg-green-500/30 text-green-300 font-semibold py-4 px-6 rounded-xl 
                                      border border-green-500/30 hover:border-green-500/50 transition-all duration-300 hover:-translate-y-1
                                      flex items-center justify-center space-x-3 shadow-lg max-w-xs mx-auto sm:mx-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                                </svg>
                                <span class="text-lg">Compartir</span>
                            </button>

                            <!-- Botón de Gestionar (siempre visible) -->
                            <button onclick="showApprovalModal()" 
                               class="flex-1 backdrop-blur-sm bg-blue-500/20 hover:bg-blue-500/30 text-blue-300 font-semibold py-4 px-6 rounded-xl 
                                      border border-blue-500/30 hover:border-blue-500/50 transition-all duration-300 hover:-translate-y-1
                                      flex items-center justify-center space-x-3 shadow-lg max-w-xs mx-auto sm:mx-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                                <span class="text-lg">Gestionar</span>
                            </button>
                        </div>
                    </div>

                    <!-- Modal de gestión (siempre visible) -->
                    <div id="approvalModal" class="fixed inset-0 bg-black/70 backdrop-blur-md z-50 flex items-center justify-center p-4 opacity-0 pointer-events-none transition-all duration-300">
                        <div class="backdrop-blur-xl bg-white/10 border border-green-400/30 rounded-2xl p-8 max-w-md w-full shadow-2xl">
                            <div class="text-center mb-6">
                                <h3 class="text-2xl font-bold text-white mb-2">Gestionar Reserva</h3>
                                <p class="text-white/70">¿Qué acción deseas realizar?</p>
                            </div>
                            
                            <div class="space-y-4">
                                <button onclick="updateReservationStatus('aprobada')" 
                                       class="w-full bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 
                                              text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 
                                              flex items-center justify-center space-x-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Aprobar Reserva</span>
                                </button>
                                
                                <button onclick="updateReservationStatus('rechazada')" 
                                       class="w-full bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 
                                              text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 
                                              flex items-center justify-center space-x-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>Rechazar Reserva</span>
                                </button>

                                <!-- Nuevo botón para estado pendiente -->
                                <button onclick="updateReservationStatus('pendiente')" 
                                       class="w-full bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 
                                              text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 
                                              flex items-center justify-center space-x-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>Pendiente</span>
                                </button>
                                
                                <button onclick="closeApprovalModal()" 
                                       class="w-full backdrop-blur-sm bg-white/10 hover:bg-white/20 text-white font-semibold py-3 px-6 rounded-xl 
                                              border border-white/30 hover:border-white/50 transition-all duration-300">
                                    Cancelar
                                </button>
                            </div>
                        </div>
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
        
        /* Efectos especiales */
        .hover\:scale-110:hover {
            transform: scale(1.1);
        }
        
        /* Estilos para impresión */
        @media print {
            .aurora-bg, .particles, nav, button, .no-print {
                display: none !important;
            }
            
            body {
                background: white !important;
                color: black !important;
            }
            
            .backdrop-blur-xl, .bg-white\/10 {
                background: white !important;
                border: 1px solid #ccc !important;
                color: black !important;
            }
            
            .text-white {
                color: black !important;
            }
            
            .border-white\/10 {
                border-color: #ccc !important;
            }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .particles {
                display: none;
            }
            
            .grid-cols-1.lg\:grid-cols-2 {
                grid-template-columns: 1fr;
            }
            
            .flex-col.sm\:flex-row {
                flex-direction: column;
            }
        }

        /* Estilos mejorados para el modal */
        #approvalModal {
            backdrop-filter: blur(16px);
            transition: all 0.3s ease;
        }

        #approvalModal.opacity-0 {
            opacity: 0;
            transform: scale(0.95);
        }

        #approvalModal:not(.opacity-0) {
            opacity: 1;
            transform: scale(1);
        }

        #approvalModal > div {
            transition: all 0.3s ease;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        /* Botones con mejor hover */
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
    </style>

    <!-- Script para efectos y funcionalidades -->
    <script>
        // Variable global para el ID de la reserva
        const reservaId = {{ $reserva->id }};
        
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

 <!-- Script para efectos y funcionalidades -->

    // Variable global para el ID de la reserva

    
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

    // ===== FUNCIONES DE EXPORTACIÓN =====

    // Función para exportar a PDF
    function exportToPDF() {
        showNotification('Preparando exportación PDF...', 'info');
        
        // Crear nueva ventana para la impresión
        const printWindow = window.open('', '_blank');
        
        const htmlContent = `
            <!DOCTYPE html>
            <html>
            <head>
                <title>Reserva #{{ $reserva->id }} - Eventos Aurora</title>
                <style>
                    body { font-family: Arial, sans-serif; margin: 20px; font-size: 12px; color: #333; }
                    .header { text-align: center; margin-bottom: 30px; border-bottom: 3px solid #22c55e; padding-bottom: 20px; }
                    .header h1 { color: #22c55e; margin: 0; font-size: 28px; }
                    .header p { color: #666; margin: 8px 0; font-size: 14px; }
                    .section { margin: 20px 0; background: #f8f9fa; padding: 15px; border-radius: 8px; border-left: 4px solid #22c55e; }
                    .section h3 { color: #22c55e; margin: 0 0 15px 0; font-size: 18px; }
                    .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin: 15px 0; }
                    .info-item { background: white; padding: 10px; border-radius: 5px; border: 1px solid #e0e0e0; }
                    .info-label { font-weight: bold; color: #555; font-size: 11px; margin-bottom: 3px; }
                    .info-value { color: #333; font-size: 14px; font-weight: 600; }
                    .status { display: inline-block; padding: 5px 15px; border-radius: 20px; font-weight: bold; font-size: 12px; }
                    .status.aprobada { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
                    .status.pendiente { background: #fff3cd; color: #856404; border: 1px solid #ffeaa7; }
                    .status.rechazada { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
                    .watermark { position: fixed; bottom: 20px; right: 20px; opacity: 0.1; font-size: 48px; color: #22c55e; transform: rotate(-45deg); z-index: -1; }
                    .footer { margin-top: 40px; text-align: center; font-size: 10px; color: #666; border-top: 1px solid #ddd; padding-top: 15px; }
                </style>
            </head>
            <body>
                <div class="watermark">🎯 AURORA</div>
                
                <div class="header">
                    <h1>🎯 Detalle de Reserva</h1>
                    <p><strong>Sistema de Gestión de Eventos Aurora</strong></p>
                    <p>Generado el: ${new Date().toLocaleDateString('es-ES', { 
                        weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit'
                    })}</p>
                    <div class="status {{ $reserva->estado }}">{{ ucfirst($reserva->estado) }}</div>
                </div>
                
                <div class="section">
                    <h3>📋 Información General</h3>
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Reserva ID</div>
                            <div class="info-value">#{{ $reserva->id }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Código de Reserva</div>
                            <div class="info-value">{{ $reserva->codigo_reserva }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Cliente</div>
                            <div class="info-value">{{ $reserva->usuario->name ?? 'N/A' }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Email</div>
                            <div class="info-value">{{ $reserva->usuario->email ?? 'N/A' }}</div>
                        </div>
                    </div>
                </div>
                
                <div class="section">
                    <h3>🏢 Detalles del Evento</h3>
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Salón</div>
                            <div class="info-value">{{ $reserva->salon->nombre ?? 'N/A' }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Tipo de Evento</div>
                            <div class="info-value">{{ $reserva->tipo_evento ?? 'No especificado' }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Fecha</div>
                            <div class="info-value">{{ \Carbon\Carbon::parse($reserva->fecha_reserva)->format('d M Y') }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Número de Personas</div>
                            <div class="info-value">{{ $reserva->numero_personas }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Hora de Inicio</div>
                            <div class="info-value">{{ \Carbon\Carbon::parse($reserva->hora_inicio)->format('H:i') }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Hora de Finalización</div>
                            <div class="info-value">{{ \Carbon\Carbon::parse($reserva->hora_fin)->format('H:i') }}</div>
                        </div>
                    </div>
                </div>
                
                <div class="section">
                    <h3>💰 Información Financiera</h3>
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Total</div>
                            <div class="info-value">Q {{ number_format($reserva->total, 2) }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Estado</div>
                            <div class="info-value">{{ ucfirst($reserva->estado) }}</div>
                        </div>
                    </div>
                </div>
                
                @if($reserva->observaciones)
                <div class="section">
                    <h3>📝 Observaciones</h3>
                    <div style="background: white; padding: 15px; border-radius: 5px; border: 1px solid #e0e0e0;">
                        {{ $reserva->observaciones }}
                    </div>
                </div>
                @endif
                
                <div class="section">
                    <h3>📅 Timeline</h3>
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Creada</div>
                            <div class="info-value">{{ $reserva->created_at->format('d M Y - H:i') }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Última Actualización</div>
                            <div class="info-value">{{ $reserva->updated_at->format('d M Y - H:i') }}</div>
                        </div>
                    </div>
                </div>
                
                <div class="footer">
                    <p><strong>🎯 Eventos Aurora - Sistema de Gestión de Reservas</strong></p>
                    <p>Este documento contiene información confidencial sobre la reserva.</p>
                    <p>Documento generado automáticamente - No requiere firma</p>
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

    // Función para compartir reserva
    function shareReservation() {
        const reservationData = {
            title: 'Reserva #{{ $reserva->id }} - Eventos Aurora',
            text: 'Detalles de la reserva para {{ $reserva->salon->nombre ?? "N/A" }} el {{ \Carbon\Carbon::parse($reserva->fecha_reserva)->format("d M Y") }}',
            url: window.location.href
        };

        if (navigator.share) {
            navigator.share(reservationData).catch(err => {
                console.log('Error al compartir:', err);
                copyToClipboard();
            });
        } else {
            copyToClipboard();
        }
    }

    // Función para copiar al portapapeles
    function copyToClipboard() {
        const url = window.location.href;
        
        if (navigator.clipboard) {
            navigator.clipboard.writeText(url).then(() => {
                showNotification('¡URL copiada al portapapeles!', 'success');
            }).catch(() => {
                fallbackCopyTextToClipboard(url);
            });
        } else {
            fallbackCopyTextToClipboard(url);
        }
    }

    // Fallback para navegadores que no soportan clipboard API
    function fallbackCopyTextToClipboard(text) {
        const textArea = document.createElement("textarea");
        textArea.value = text;
        textArea.style.position = "fixed";
        textArea.style.opacity = "0";
        
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        
        try {
            document.execCommand('copy');
            showNotification('¡URL copiada al portapapeles!', 'success');
        } catch (err) {
            showNotification('No se pudo copiar la URL', 'error');
        }
        
        document.body.removeChild(textArea);
    }

    // Función para mostrar notificaciones
    function showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        notification.innerHTML = `
            <div class="flex items-center space-x-3">
                <div class="flex-shrink-0">
                    ${type === 'success' ? 
                        '<svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>' :
                        type === 'info' ?
                        '<svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>' :
                        '<svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>'
                    }
                </div>
                <div class="text-white font-medium">${message}</div>
            </div>
        `;
        
        notification.className = `fixed top-4 right-4 ${
            type === 'success' ? 'bg-green-500/90' : 
            type === 'info' ? 'bg-blue-500/90' : 
            'bg-red-500/90'
        } backdrop-blur-sm border ${
            type === 'success' ? 'border-green-400/50' : 
            type === 'info' ? 'border-blue-400/50' : 
            'border-red-400/50'
        } text-white px-6 py-4 rounded-xl shadow-lg z-50 transform translate-x-full transition-transform duration-300`;
        
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

    // Funciones para el modal de aprobación
    function showApprovalModal() {
        const modal = document.getElementById('approvalModal');
        if (modal) {
            modal.classList.remove('opacity-0', 'pointer-events-none');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeApprovalModal() {
        const modal = document.getElementById('approvalModal');
        if (modal) {
            modal.classList.add('opacity-0', 'pointer-events-none');
            document.body.style.overflow = 'auto';
        }
    }

    // Función corregida para actualizar estado de reserva
    function updateReservationStatus(status) {
        // Mostrar notificación de carga
        showNotification(`Actualizando estado a ${status}...`, 'info');
        
        // Obtener el token CSRF
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        // Hacer la petición AJAX al servidor
        fetch(`/reservas/${reservaId}/update-status`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                estado: status
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la respuesta del servidor');
            }
            return response.json();
        })
        .then(data => {
            showNotification(`Reserva ${status} exitosamente`, 'success');
            closeApprovalModal();
            
            // Recargar la página después de 1.5 segundos
            setTimeout(() => {
                window.location.reload();
            }, 1500);
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Error al actualizar el estado. Revise la consola para más detalles.', 'error');
            
            // Simulación exitosa para pruebas (remover en producción)
            setTimeout(() => {
                showNotification(`Reserva ${status} exitosamente (simulación)`, 'success');
                closeApprovalModal();
                setTimeout(() => {
                    window.location.reload();
                }, 1500);
            }, 2000);
        });
    }

    // Cerrar modal con ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeApprovalModal();
        }
    });

    // Cerrar modal al hacer click fuera
    document.getElementById('approvalModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeApprovalModal();
        }
    });

    // Atajos de teclado corregidos
    document.addEventListener('keydown', function(e) {
        // Atajo para exportar PDF (Ctrl/Cmd + P)
        if ((e.ctrlKey || e.metaKey) && e.key === 'p') {
            e.preventDefault();
            exportToPDF(); // Corregido: llama a exportToPDF en lugar de window.print()
        }
        
        // Atajo para compartir (Ctrl/Cmd + S)
        if ((e.ctrlKey || e.metaKey) && e.key === 's') {
            e.preventDefault();
            shareReservation();
        }
        
        // Atajo para gestionar (Ctrl/Cmd + G)
        if ((e.ctrlKey || e.metaKey) && e.key === 'g' && document.getElementById('approvalModal')) {
            e.preventDefault();
            showApprovalModal();
        }
    });

    // Función para manejar el redimensionamiento
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

    // Función para tracking
    function trackReservationView() {
        console.log('Vista de reserva #{{ $reserva->id }} cargada');
        // Aquí puedes agregar código para analytics
    }

    // Ejecutar tracking
    trackReservationView();

    // Mensajes de consola
    console.log('🎯 Reserva #{{ $reserva->id }} - Eventos Aurora');
    console.log('📅 Fecha: {{ $reserva->fecha_reserva }}');
    console.log('🏢 Salón: {{ $reserva->salon->nombre ?? "N/A" }}');
    console.log('✨ Estado: {{ ucfirst($reserva->estado) }}');
</script>
</x-app-layout>