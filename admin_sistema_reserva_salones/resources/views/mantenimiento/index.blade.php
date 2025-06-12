<x-app-layout>
    <x-slot name="header">
        <div class="relative overflow-hidden bg-gradient-to-r from-slate-900 via-purple-900 to-slate-900 rounded-xl p-6 shadow-2xl">
            <!-- Aurora Background Effect -->
            <div class="absolute inset-0 opacity-30">
                <div class="absolute top-0 left-1/4 w-96 h-32 bg-gradient-to-r from-green-400/20 via-blue-400/30 to-purple-500/20 rounded-full filter blur-3xl animate-pulse"></div>
                <div class="absolute top-8 right-1/4 w-80 h-24 bg-gradient-to-l from-cyan-400/25 via-teal-400/20 to-green-400/15 rounded-full filter blur-2xl animate-pulse" style="animation-delay: 1s;"></div>
            </div>
            
            <h2 class="relative font-bold text-3xl text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 via-green-300 to-purple-300 drop-shadow-lg">
                ✨ Mantenimientos
            </h2>
            <p class="relative text-slate-300 mt-2 text-sm opacity-90">Gestión de mantenimientos con el poder de las auroras</p>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 px-4">
        <!-- Botón Nuevo Mantenimiento -->
        <div class="mb-6 flex justify-end">
            <a href="{{ route('mantenimientos.create') }}"
               class="group relative overflow-hidden bg-gradient-to-r from-emerald-500 via-cyan-500 to-blue-500 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-300 border border-cyan-400/30">
               <!-- Efecto de brillo -->
               <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
               <span class="relative flex items-center gap-2">
                   <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                   </svg>
                   Nuevo Mantenimiento
               </span>
            </a>
        </div>

        <!-- Mensaje de Éxito -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-gradient-to-r from-emerald-900/80 via-teal-900/80 to-cyan-900/80 text-emerald-100 rounded-xl border border-emerald-400/30 shadow-lg backdrop-blur-sm">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-emerald-400/20 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- Tabla Principal -->
        <div class="relative bg-gradient-to-br from-slate-900/95 via-slate-800/95 to-slate-900/95 backdrop-blur-lg rounded-2xl overflow-hidden shadow-2xl border border-slate-700/50">
            <!-- Efecto Aurora en el fondo de la tabla -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-r from-green-400/30 via-blue-400/40 to-purple-500/30 filter blur-3xl"></div>
                <div class="absolute bottom-0 right-0 w-full h-32 bg-gradient-to-l from-cyan-400/25 via-teal-400/30 to-green-400/25 filter blur-3xl"></div>
            </div>

            <div class="relative overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-slate-800/80 via-slate-700/80 to-slate-800/80 backdrop-blur-sm border-b border-slate-600/50">
                            <th class="px-6 py-4 text-left text-sm font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-green-300 uppercase tracking-wider">
                                🏢 Salón
                            </th>
                            <th class="px-6 py-4 text-left text-sm font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-300 to-blue-300 uppercase tracking-wider">
                                📅 Fecha Inicio
                            </th>
                            <th class="px-6 py-4 text-left text-sm font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-300 uppercase tracking-wider">
                                🔄 Estado
                            </th>
                            <th class="px-6 py-4 text-left text-sm font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-300 to-pink-300 uppercase tracking-wider">
                                👤 Creado por
                            </th>
                            <th class="px-6 py-4 text-center text-sm font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-300 to-cyan-300 uppercase tracking-wider">
                                ⚡ Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/50">
                        @foreach($mantenimientos as $m)
                            <tr class="group hover:bg-gradient-to-r hover:from-slate-800/30 hover:via-slate-700/30 hover:to-slate-800/30 transition-all duration-300 border-b border-slate-700/30">
                                <!-- Salón -->
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-gradient-to-br from-cyan-500/20 to-blue-500/20 rounded-xl flex items-center justify-center border border-cyan-400/30">
                                            <svg class="w-5 h-5 text-cyan-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <span class="text-slate-200 font-semibold">{{ $m->salon?->nombre ?? 'N/D' }}</span>
                                        </div>
                                    </div>
                                </td>

                                <!-- Fecha -->
                                <td class="px-6 py-5">
                                    <div class="space-y-1">
                                        <div class="text-slate-200 font-medium">
                                            {{ $m->fecha_inicio ? $m->fecha_inicio->format('d/m/Y') : 'N/D' }}
                                        </div>
                                        <div class="text-slate-400 text-xs flex items-center gap-1">
                                            <span>hasta</span>
                                            <span class="text-cyan-300">{{ $m->fecha_fin ? $m->fecha_fin->format('d/m/Y') : 'N/D' }}</span>
                                        </div>
                                    </div>
                                </td>

                                <!-- Estado -->
                                <td class="px-6 py-5">
                                    <span class="px-3 py-1.5 text-xs font-semibold rounded-full 
                                        @if(strtolower($m->estado ?? '') === 'completado')
                                            bg-gradient-to-r from-emerald-500/20 to-green-500/20 text-emerald-300 border border-emerald-400/30
                                        @elseif(strtolower($m->estado ?? '') === 'en_progreso')
                                            bg-gradient-to-r from-amber-500/20 to-yellow-500/20 text-amber-300 border border-amber-400/30
                                        @elseif(strtolower($m->estado ?? '') === 'pendiente')
                                            bg-gradient-to-r from-blue-500/20 to-cyan-500/20 text-blue-300 border border-blue-400/30
                                        @else
                                            bg-gradient-to-r from-slate-500/20 to-gray-500/20 text-slate-300 border border-slate-400/30
                                        @endif
                                    ">
                                        {{ ucfirst($m->estado ?? 'N/D') }}
                                    </span>
                                </td>

                                <!-- Creado por -->
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 bg-gradient-to-br from-purple-500/20 to-pink-500/20 rounded-full flex items-center justify-center border border-purple-400/30">
                                            <svg class="w-4 h-4 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                        <span class="text-slate-300 text-sm">{{ $m->creador?->name ?? '---' }}</span>
                                    </div>
                                </td>

                                <!-- Acciones -->
                                <td class="px-6 py-5 text-center">
                                    <form action="{{ route('mantenimientos.destroy', $m) }}" method="POST" class="inline-block"
                                          onsubmit="return confirm('¿Eliminar mantenimiento?');">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="group relative overflow-hidden bg-gradient-to-r from-red-600/80 to-pink-600/80 hover:from-red-500 hover:to-pink-500 text-white px-4 py-2 rounded-lg font-medium shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 border border-red-400/30">
                                            <!-- Efecto de brillo en hover -->
                                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-500"></div>
                                            <span class="relative flex items-center gap-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Eliminar
                                            </span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div class="relative p-6 bg-gradient-to-r from-slate-800/50 via-slate-700/50 to-slate-800/50 border-t border-slate-600/50">
                <div class="aurora-pagination">
                    {{ $mantenimientos->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Estilos adicionales para la paginación -->
    <style>
        .aurora-pagination .pagination {
            @apply flex items-center gap-2;
        }
        
        .aurora-pagination .page-link {
            @apply px-3 py-2 text-sm bg-gradient-to-r from-slate-700 to-slate-600 text-slate-300 rounded-lg border border-slate-500/50 hover:from-cyan-600/50 hover:to-blue-600/50 hover:text-white transition-all duration-300 hover:shadow-lg;
        }
        
        .aurora-pagination .page-link.active {
            @apply bg-gradient-to-r from-cyan-500 to-blue-500 text-white border-cyan-400/50 shadow-lg;
        }

        /* Animaciones personalizadas */
        @keyframes aurora-glow {
            0%, 100% { opacity: 0.3; transform: translateY(0px); }
            50% { opacity: 0.8; transform: translateY(-5px); }
        }

        .animate-aurora {
            animation: aurora-glow 3s ease-in-out infinite;
        }

        /* Efecto de partículas de luz */
        .table-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 80%, rgba(0, 255, 255, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(0, 255, 128, 0.1) 0%, transparent 50%);
            pointer-events: none;
            z-index: 1;
        }
    </style>
</x-app-layout>