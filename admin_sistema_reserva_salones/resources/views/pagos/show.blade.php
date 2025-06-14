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
                        <div class="animate-pulse">
                            <svg class="w-8 h-8 text-green-400" viewBox="0 0 24 24" fill="none">
                                <defs>
                                    <linearGradient id="pagoGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#22c55e"/>
                                        <stop offset="50%" style="stop-color:#10b981"/>
                                        <stop offset="100%" style="stop-color:#059669"/>
                                    </linearGradient>
                                </defs>
                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke="url(#pagoGradient)" stroke-width="2"/>
                                <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke="url(#pagoGradient)" stroke-width="2"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-2xl bg-gradient-to-r from-green-400 via-green-300 to-green-500 bg-clip-text text-transparent">
                                Detalles del Pago #{{ $pago->id }}
                            </h2>
                            <p class="text-green-200 text-sm opacity-90">Información completa de la transacción</p>
                        </div>
                    </div>
                    
                    <!-- Badge de estado -->
                    <div class="hidden md:block">
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold border text-lg
                            {{ $pago->estado == 'pendiente' ? 'bg-yellow-500/20 text-yellow-300 border-yellow-500/40' : 
                               ($pago->estado == 'verificado' ? 'bg-green-500/20 text-green-300 border-green-500/40' : 
                               'bg-red-500/20 text-red-300 border-red-500/40') }}">
                            @if($pago->estado == 'pendiente')
                                <svg class="w-5 h-5 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                ⏳ Pendiente
                            @elseif($pago->estado == 'verificado')
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                ✅ Verificado
                            @else
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                ❌ Rechazado
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <!-- Fondo Aurora para toda la página -->
    <div class="aurora-bg fixed inset-0 z-0"></div>
    
    <!-- Partículas flotantes -->
    <div class="particles fixed inset-0 pointer-events-none z-10">
        <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
        <div class="particle" style="left: 20%; animation-delay: 2s;"></div>
        <div class="particle" style="left: 30%; animation-delay: 4s;"></div>
        <div class="particle" style="left: 40%; animation-delay: 6s;"></div>
        <div class="particle" style="left: 50%; animation-delay: 8s;"></div>
        <div class="particle" style="left: 60%; animation-delay: 10s;"></div>
        <div class="particle" style="left: 70%; animation-delay: 12s;"></div>
        <div class="particle" style="left: 80%; animation-delay: 14s;"></div>
        <div class="particle" style="left: 90%; animation-delay: 16s;"></div>
    </div>

    <div class="relative z-20 max-w-6xl mx-auto p-6">
        
        <!-- Información Principal del Pago -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            
            <!-- Card Principal - Información del Pago -->
            <div class="lg:col-span-2 backdrop-blur-xl bg-white/10 border border-green-400/30 shadow-2xl rounded-2xl overflow-hidden 
                       opacity-0 animate-fade-in">
                
                <!-- Header del card -->
                <div class="bg-gradient-to-r from-green-600 via-green-500 to-green-600 text-white px-6 py-4">
                    <h3 class="text-xl font-bold flex items-center space-x-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <span>Información de la Transacción</span>
                    </h3>
                </div>
                
                <!-- Contenido del card -->
                <div class="p-6 space-y-6">
                    
                    <!-- Reserva ID -->
                    <div class="flex items-center space-x-4 p-4 bg-white/5 rounded-xl border border-white/10">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V7a2 2 0 012-2h4a2 2 0 012 2v0M8 7v8a2 2 0 002 2h4a2 2 0 002-2V7m-6 0h6"></path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-white/60 text-sm font-medium">Reserva ID</p>
                            <p class="text-white text-xl font-bold">#{{ $pago->reserva_id }}</p>
                        </div>
                    </div>
                    
                    <!-- Monto -->
                    <div class="flex items-center space-x-4 p-4 bg-white/5 rounded-xl border border-white/10">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-white/60 text-sm font-medium">Monto Total</p>
                            <p class="text-green-300 text-3xl font-bold">Q {{ number_format($pago->monto, 2) }}</p>
                        </div>
                    </div>
                    
                    <!-- Método de Pago -->
                    <div class="flex items-center space-x-4 p-4 bg-white/5 rounded-xl border border-white/10">
                        <div class="w-12 h-12 bg-gradient-to-br 
                            {{ $pago->metodo_pago === 'efectivo' ? 'from-yellow-400 to-yellow-600' : 
                               ($pago->metodo_pago === 'tarjeta' ? 'from-indigo-400 to-indigo-600' : 'from-cyan-400 to-cyan-600') }} 
                            rounded-full flex items-center justify-center">
                            @if($pago->metodo_pago === 'efectivo')
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            @elseif($pago->metodo_pago === 'tarjeta')
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                </svg>
                            @else
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                </svg>
                            @endif
                        </div>
                        <div class="flex-1">
                            <p class="text-white/60 text-sm font-medium">Método de Pago</p>
                            <p class="text-white text-xl font-bold capitalize">{{ $pago->metodo_pago }}</p>
                        </div>
                    </div>
                    
                    <!-- Fecha de Pago -->
                    <div class="flex items-center space-x-4 p-4 bg-white/5 rounded-xl border border-white/10">
                        <div class="w-12 h-12 bg-gradient-to-br from-pink-400 to-pink-600 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V7a2 2 0 012-2h4a2 2 0 012 2v0M8 7v8a2 2 0 002 2h4a2 2 0 002-2V7m-6 0h6"></path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-white/60 text-sm font-medium">Fecha de Pago</p>
                            <p class="text-white text-xl font-bold">{{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d M Y - H:i') }}</p>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <!-- Card Lateral - Información Adicional -->
            <div class="backdrop-blur-xl bg-white/10 border border-green-400/30 shadow-2xl rounded-2xl overflow-hidden 
                       opacity-0 animate-fade-in" style="animation-delay: 0.2s;">
                
                <!-- Header del card -->
                <div class="bg-gradient-to-r from-blue-600 via-blue-500 to-blue-600 text-white px-6 py-4">
                    <h3 class="text-lg font-bold flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Detalles Adicionales</span>
                    </h3>
                </div>
                
                <!-- Contenido del card -->
                <div class="p-6 space-y-4">
    
    <!-- Referencia Bancaria -->
    <div class="space-y-2">
        <p class="text-white/60 text-sm font-medium flex items-center space-x-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"></path>
            </svg>
            <span>Referencia Bancaria</span>
        </p>
        <p class="text-white font-semibold bg-white/5 px-3 py-2 rounded-lg border border-white/10">
            {{ $pago->referencia_bancaria ?? 'N/A' }}
        </p>
    </div>
    
    <!-- Comprobante -->
    <div class="space-y-2">
        <p class="text-white/60 text-sm font-medium flex items-center space-x-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <span>Comprobante</span>
        </p>
        <p class="text-white font-semibold bg-white/5 px-3 py-2 rounded-lg border border-white/10">
            {{ $pago->comprobante ? 'Adjunto disponible' : 'Sin comprobante' }}
        </p>
    </div>
    
    <!-- Verificado Por -->
    <div class="space-y-2">
        <p class="text-white/60 text-sm font-medium flex items-center space-x-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            <span>Verificado Por</span>
        </p>
        <p class="text-white font-semibold bg-white/5 px-3 py-2 rounded-lg border border-white/10">
            {{ $pago->verificado_por ? $pago->verificadoPor->name ?? 'Usuario ID: ' . $pago->verificado_por : 'N/A' }}
        </p>
    </div>
    
    <!-- Fecha de Verificación -->
    <div class="space-y-2">
        <p class="text-white/60 text-sm font-medium flex items-center space-x-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>Fecha de Verificación</span>
        </p>
        <p class="text-white font-semibold bg-white/5 px-3 py-2 rounded-lg border border-white/10">
            {{ $pago->fecha_verificacion ? \Carbon\Carbon::parse($pago->fecha_verificacion)->format('d M Y - H:i') : 'Pendiente' }}
        </p>
    </div>
    
    <!-- Observaciones -->
    <div class="space-y-2">
        <p class="text-white/60 text-sm font-medium flex items-center space-x-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
            </svg>
            <span>Observaciones</span>
        </p>
        <div class="text-white bg-white/5 px-3 py-3 rounded-lg border border-white/10 min-h-[60px]">
            {{ $pago->observaciones ?? 'Sin observaciones adicionales' }}
        </div>
    </div>
    
</div>
            </div>
        </div>
        
        <!-- Sección de Comprobante -->
        @if ($pago->comprobante)
            <div class="backdrop-blur-xl bg-white/10 border border-green-400/30 shadow-2xl rounded-2xl overflow-hidden 
                       opacity-0 animate-fade-in mb-8" style="animation-delay: 0.4s;">
                
                <!-- Header del card -->
                <div class="bg-gradient-to-r from-orange-600 via-orange-500 to-orange-600 text-white px-6 py-4">
                    <h3 class="text-xl font-bold flex items-center space-x-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                        <span>Comprobante de Pago</span>
                    </h3>
                </div>
                
                <!-- Contenido del card -->
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <!-- Información del archivo -->
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4 p-4 bg-white/5 rounded-xl border border-white/10">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-white/60 text-sm">Nombre del Archivo</p>
                                    <p class="text-white font-semibold">{{ $pago->comprobante->nombre_archivo }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center space-x-4 p-4 bg-white/5 rounded-xl border border-white/10">
                                <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-green-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-white/60 text-sm">Tipo de Archivo</p>
                                    <p class="text-white font-semibold uppercase">{{ $pago->comprobante->tipo_archivo }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center space-x-4 p-4 bg-white/5 rounded-xl border border-white/10">
                                <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-purple-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-white/60 text-sm">Tamaño del Archivo</p>
                                    <p class="text-white font-semibold">{{ $pago->comprobante->tamaño_archivo }} KB</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Vista previa del comprobante -->
                        <div class="flex flex-col items-center space-y-4">
                            <div class="w-full max-w-md bg-white/5 rounded-xl border border-white/10 p-4">
                                <img src="{{ asset('storage/' . $pago->comprobante->ruta_archivo) }}" 
                                     alt="Comprobante de Pago" 
                                     class="w-full h-auto rounded-lg shadow-lg cursor-pointer transition-transform duration-300 hover:scale-105"
                                     onclick="openImageModal(this.src)">
                            </div>
                            <button onclick="openImageModal('{{ asset('storage/' . $pago->comprobante->ruta_archivo) }}')"
                                    class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 
                                          text-white font-semibold rounded-lg transition-all duration-300 shadow-lg transform hover:scale-105
                                          flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <span>Ver en Grande</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        
        <!-- Sección de Gestión de Estado -->
        <div class="backdrop-blur-xl bg-white/10 border border-green-400/30 shadow-2xl rounded-2xl overflow-hidden 
                   opacity-0 animate-fade-in mb-8" style="animation-delay: 0.6s;">
            
            <!-- Header del card -->
            <div class="bg-gradient-to-r from-indigo-600 via-indigo-500 to-indigo-600 text-white px-6 py-4">
                <h3 class="text-xl font-bold flex items-center space-x-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                    <span>Gestión de Estado del Pago</span>
                </h3>
            </div>
            
            <!-- Contenido del card -->
            <div class="p-6">
                <form action="{{ route('pagos.verificar', $pago->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PATCH')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Selector de Estado -->
                        <div class="space-y-3">
                            <label for="estado" class="block text-white font-semibold text-lg">
                                Cambiar Estado del Pago:
                            </label>
                            <select name="estado" id="estado" 
                                    class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/30 text-white 
                                          focus:border-green-400 focus:ring-2 focus:ring-green-400/50 backdrop-blur-sm
                                          transition-all duration-300 text-lg font-medium">
                                <option value="pendiente" {{ $pago->estado == 'pendiente' ? 'selected' : '' }} class="bg-slate-800">
                                    ⏳ Pendiente
                                </option>
                                <option value="verificado" {{ $pago->estado == 'verificado' ? 'selected' : '' }} class="bg-slate-800">
                                    ✅ Verificado
                                </option>
                                <option value="rechazado" {{ $pago->estado == 'rechazado' ? 'selected' : '' }} class="bg-slate-800">
                                    ❌ Rechazado
                                </option>
                            </select>
                        </div>
                        
                        <!-- Botón de Acción -->
                        <div class="flex items-end">
                            <button type="submit" 
                                    class="w-full px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 
                                          text-white font-bold rounded-lg transition-all duration-300 shadow-lg transform hover:scale-105
                                          flex items-center justify-center space-x-2 text-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Guardar Cambios</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Botón de Navegación -->
        <div class="flex justify-center opacity-0 animate-fade-in" style="animation-delay: 0.8s;">
            <a href="{{ route('pagos.index') }}" 
               class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-slate-600 to-slate-700 hover:from-slate-700 hover:to-slate-800 
                     text-white font-bold rounded-xl transition-all duration-300 shadow-xl transform hover:scale-105 hover:-translate-y-1
                     border border-white/20 backdrop-blur-sm space-x-3 text-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span>Volver al Listado</span>
            </a>
        </div>
    </div>

    <!-- Modal para imagen del comprobante -->
    <div id="imageModal" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-50 hidden items-center justify-center">
        <div class="relative max-w-4xl max-h-[90vh] m-4">
            <button onclick="closeImageModal()" 
                    class="absolute top-4 right-4 z-10 w-10 h-10 bg-red-500/80 hover:bg-red-600 
                          text-white rounded-full flex items-center justify-center backdrop-blur-sm
                          transition-all duration-300 hover:scale-110">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <img id="modalImage" src="" alt="Comprobante Ampliado" class="max-w-full max-h-full rounded-lg shadow-2xl">
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
            animation: fadeIn 1s ease forwards;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
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
            width: 3px;
            height: 3px;
            background: #22c55e;
            border-radius: 50%;
            opacity: 0.7;
            animation: particle-float 15s linear infinite;
        }
        
        @keyframes particle-float {
            0% { 
                transform: translateY(100vh) translateX(0) scale(0);
                opacity: 0;
            }
            10% { 
                opacity: 1;
                transform: scale(1);
            }
            90% { 
                opacity: 1;
            }
            100% { 
                transform: translateY(-10vh) translateX(150px) scale(0);
                opacity: 0;
            }
        }
        
        /* Efectos de hover mejorados */
        .hover\:scale-105:hover {
            transform: scale(1.05);
        }
        
        .hover\:-translate-y-1:hover {
            transform: translateY(-4px);
        }
        
        /* Estilos para select */
        select option {
            background-color: #1e293b !important;
            color: white !important;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .particles {
                display: none;
            }
            
            .grid-cols-1.lg\:grid-cols-3 {
                grid-template-columns: 1fr;
            }
            
            .grid-cols-1.md\:grid-cols-2 {
                grid-template-columns: 1fr;
            }
        }
        
        /* Modal styles */
        #imageModal.flex {
            display: flex !important;
        }
        
        /* Glassmorphism effect */
        .backdrop-blur-xl {
            backdrop-filter: blur(16px);
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: rgba(34, 197, 94, 0.5);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(34, 197, 94, 0.7);
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
                    particle.style.animationDelay = Math.random() * 3 + 's';
                    particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
                    
                    const particlesContainer = document.querySelector('.particles');
                    if (particlesContainer) {
                        particlesContainer.appendChild(particle);
                        
                        setTimeout(() => {
                            if (particle.parentNode) {
                                particle.remove();
                            }
                        }, 15000);
                    }
                }
            }

            // Crear partículas cada 2 segundos
            setInterval(createParticle, 2000);

            // Animación de entrada escalonada
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
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

            // Efecto de hover en los cards
            document.querySelectorAll('.backdrop-blur-xl').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                    this.style.boxShadow = '0 25px 50px -12px rgba(34, 197, 94, 0.25)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = '';
                });
            });

            // Notificación de éxito para el formulario
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    showNotification('Procesando cambio de estado...', 'info');
                });
            }
        });

        // Función para abrir modal de imagen
        function openImageModal(imageSrc) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            
            modalImage.src = imageSrc;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            
            // Prevent body scroll
            document.body.style.overflow = 'hidden';
        }

        // Función para cerrar modal de imagen
        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            
            // Restore body scroll
            document.body.style.overflow = 'auto';
        }

        // Cerrar modal al hacer clic fuera de la imagen
        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeImageModal();
            }
        });

        // Cerrar modal con la tecla Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeImageModal();
            }
        });

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
            
            notification.className = `fixed top-4 right-4 ${colors[type] || colors.info} backdrop-blur-sm border text-white px-6 py-4 rounded-xl shadow-xl z-50 transform translate-x-full transition-transform duration-300`;
            
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
            }, 4000);
        }

        // Tracking y console logs
        console.log('👁️ Vista de detalle de pago #{{ $pago->id }} cargada');
        console.log('💰 Monto: Q {{ number_format($pago->monto, 2) }}');
        console.log('📊 Estado: {{ ucfirst($pago->estado) }}');
        console.log('💳 Método: {{ ucfirst($pago->metodo_pago) }}');
        console.log('🌟 Tema Aurora aplicado correctamente');
        
        // Mensaje de bienvenida
        setTimeout(() => {
            showNotification('Detalles del pago cargados correctamente', 'success');
        }, 1000);
    </script>
</x-app-layout>