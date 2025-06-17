<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-white leading-tight flex items-center gap-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Editar Mantenimiento
            </h2>
            <div class="text-sm text-gray-300">
                ID: #{{ $mantenimiento->id }}
            </div>
        </div>
    </x-slot>

    <style>
        /* Aurora Background Animation */
        @keyframes aurora-flow {
            0%, 100% { background-position: 0% 50%; }
            25% { background-position: 100% 50%; }
            50% { background-position: 50% 100%; }
            75% { background-position: 0% 100%; }
        }

        .aurora-bg {
            background: linear-gradient(135deg, 
                #064e3b 0%, #047857 15%, #059669 30%, #10b981 45%, 
                #22c55e 60%, #34d399 75%, #6ee7b7 90%, #a7f3d0 100%);
            background-size: 400% 400%;
            animation: aurora-flow 25s ease-in-out infinite;
        }

        .aurora-bg::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: 
                radial-gradient(circle at 30% 70%, rgba(34, 197, 94, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 70% 30%, rgba(16, 185, 129, 0.2) 0%, transparent 50%),
                radial-gradient(circle at 50% 50%, rgba(6, 78, 59, 0.4) 0%, transparent 70%);
            pointer-events: none;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(34, 197, 94, 0.2);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25),
                        0 0 30px rgba(34, 197, 94, 0.1),
                        inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }

        .glass-input {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(34, 197, 94, 0.3);
            transition: all 0.3s ease;
        }

        .glass-input:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(34, 197, 94, 0.6);
            box-shadow: 0 0 20px rgba(34, 197, 94, 0.3);
            transform: translateY(-1px);
        }

        .glass-input:hover {
            border-color: rgba(34, 197, 94, 0.4);
            background: rgba(255, 255, 255, 0.1);
        }

        .aurora-button {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 50%, #15803d 100%);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .aurora-button::before {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .aurora-button:hover::before { left: 100%; }
        .aurora-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(34, 197, 94, 0.4);
        }

        .cancel-button {
            background: linear-gradient(135deg, rgba(75, 85, 99, 0.8) 0%, rgba(55, 65, 81, 0.8) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(156, 163, 175, 0.3);
            transition: all 0.3s ease;
        }

        .cancel-button:hover {
            background: linear-gradient(135deg, rgba(75, 85, 99, 0.9) 0%, rgba(55, 65, 81, 0.9) 100%);
            border-color: rgba(156, 163, 175, 0.5);
            transform: translateY(-1px);
        }

        .icon-container {
            background: rgba(34, 197, 94, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(34, 197, 94, 0.2);
        }

        .info-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(34, 197, 94, 0.15);
            transition: all 0.3s ease;
        }

        .info-card:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(34, 197, 94, 0.25);
            transform: translateY(-2px);
        }

        @keyframes aurora-pulse {
            0%, 100% { 
                transform: scale(1);
                box-shadow: 0 0 20px rgba(34, 197, 94, 0.2);
            }
            50% { 
                transform: scale(1.02);
                box-shadow: 0 0 40px rgba(34, 197, 94, 0.4);
            }
        }

        .form-section {
            animation: aurora-pulse 4s ease-in-out infinite;
        }
    </style>

    <!-- Background Aurora -->
    <div class="fixed inset-0 aurora-bg"></div>
    <div class="fixed inset-0 aurora-bg::before"></div>

    <!-- Content -->
    <div class="relative z-10 min-h-screen">
        <!-- Title Section -->
        <div class="text-center py-12">
            <h1 class="text-5xl font-bold bg-gradient-to-r from-emerald-300 via-emerald-200 to-green-200 bg-clip-text text-transparent mb-4">
                Sistema de Mantenimiento Aurora
            </h1>
            <p class="text-emerald-200 text-xl opacity-90 max-w-2xl mx-auto">
                Gestión integral de mantenimientos para espacios de eventos premium
            </p>
        </div>

        <div class="max-w-7xl mx-auto px-6 pb-12">
            <!-- Main Form Container -->
            <div class="glass-card rounded-3xl shadow-2xl overflow-hidden form-section mb-12">
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-emerald-600 via-emerald-500 to-green-500 p-8 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent transform -skew-x-12"></div>
                    <div class="relative z-10">
                        <h2 class="text-3xl font-bold text-white mb-3">Información del Mantenimiento</h2>
                        <p class="text-emerald-100 text-lg opacity-90">Actualiza los detalles del mantenimiento programado</p>
                    </div>
                </div>

                <!-- Form -->
                <form action="{{ route('mantenimientos.update', $mantenimiento->id) }}" method="POST" class="p-8">
                    @csrf
                    @method('PUT')

                    <!-- Main Grid -->
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-10 mb-8">
                        <!-- Left Column -->
                        <div class="space-y-8">
                            <!-- Salón -->
                            <div class="group">
                                <label for="salon_id" class="block text-sm font-semibold text-emerald-100 mb-3 flex items-center gap-2">
                                    <div class="icon-container rounded-lg p-1.5">
                                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                    </div>
                                    Salón
                                </label>
                                <select name="salon_id" id="salon_id" class="w-full glass-input rounded-xl px-4 py-4 text-white focus:ring-2 focus:ring-emerald-400 focus:border-transparent" required>
                                    @foreach($salones as $salon)
                                        <option value="{{ $salon->id }}" {{ $mantenimiento->salon_id == $salon->id ? 'selected' : '' }}>
                                            {{ $salon->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Tipo de Mantenimiento -->
                            <div class="group">
                                <label for="tipo_mantenimiento" class="block text-sm font-semibold text-emerald-100 mb-3 flex items-center gap-2">
                                    <div class="icon-container rounded-lg p-1.5">
                                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    Tipo de Mantenimiento
                                </label>
                                <input type="text" name="tipo_mantenimiento" id="tipo_mantenimiento" 
                                    class="w-full glass-input rounded-xl px-4 py-4 text-white placeholder-emerald-200/60"
                                    value="{{ old('tipo_mantenimiento', $mantenimiento->tipo_mantenimiento) }}" 
                                    placeholder="Ej: Limpieza general, Reparación equipos..."
                                    required>
                            </div>

                            <!-- Proveedor -->
                            <div class="group">
                                <label for="proveedor" class="block text-sm font-semibold text-emerald-100 mb-3 flex items-center gap-2">
                                    <div class="icon-container rounded-lg p-1.5">
                                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    Proveedor
                                </label>
                                <input type="text" name="proveedor" id="proveedor" 
                                    class="w-full glass-input rounded-xl px-4 py-4 text-white placeholder-emerald-200/60"
                                    value="{{ old('proveedor', $mantenimiento->proveedor) }}"
                                    placeholder="Nombre del proveedor o empresa">
                            </div>

                            <!-- Costo -->
                            <div class="group">
                                <label for="costo" class="block text-sm font-semibold text-emerald-100 mb-3 flex items-center gap-2">
                                    <div class="icon-container rounded-lg p-1.5">
                                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                        </svg>
                                    </div>
                                    Costo Estimado
                                </label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-emerald-300 font-semibold">Q</span>
                                    <input type="number" step="0.01" name="costo" id="costo" 
                                        class="w-full glass-input rounded-xl pl-10 pr-4 py-4 text-white placeholder-emerald-200/60"
                                        value="{{ old('costo', $mantenimiento->costo) }}"
                                        placeholder="0.00">
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-8">
                            <!-- Fechas -->
                            <div class="grid grid-cols-2 gap-6">
                                <div class="group">
                                    <label for="fecha_inicio" class="block text-sm font-semibold text-emerald-100 mb-3 flex items-center gap-2">
                                        <div class="icon-container rounded-lg p-1.5">
                                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        Fecha Inicio
                                    </label>
                                    <input type="date" name="fecha_inicio" id="fecha_inicio" 
                                        class="w-full glass-input rounded-xl px-4 py-4 text-white"
                                        value="{{ old('fecha_inicio', optional($mantenimiento->fecha_inicio)->format('Y-m-d')) }}" required>
                                </div>
                                <div class="group">
                                    <label for="fecha_fin" class="block text-sm font-semibold text-emerald-100 mb-3 flex items-center gap-2">
                                        <div class="icon-container rounded-lg p-1.5">
                                            <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        Fecha Fin
                                    </label>
                                    <input type="date" name="fecha_fin" id="fecha_fin" 
                                        class="w-full glass-input rounded-xl px-4 py-4 text-white"
                                        value="{{ old('fecha_fin', optional($mantenimiento->fecha_fin)->format('Y-m-d')) }}" required>
                                </div>
                            </div>

                            <!-- Horarios -->
                            <div class="grid grid-cols-2 gap-6">
                                <div class="group">
                                    <label for="hora_inicio" class="block text-sm font-semibold text-emerald-100 mb-3 flex items-center gap-2">
                                        <div class="icon-container rounded-lg p-1.5">
                                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        Hora Inicio
                                    </label>
                                    <input type="time" name="hora_inicio" id="hora_inicio" 
                                        class="w-full glass-input rounded-xl px-4 py-4 text-white"
                                        value="{{ old('hora_inicio', $mantenimiento->hora_inicio) }}">
                                </div>
                                <div class="group">
                                    <label for="hora_fin" class="block text-sm font-semibold text-emerald-100 mb-3 flex items-center gap-2">
                                        <div class="icon-container rounded-lg p-1.5">
                                            <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        Hora Fin
                                    </label>
                                    <input type="time" name="hora_fin" id="hora_fin" 
                                        class="w-full glass-input rounded-xl px-4 py-4 text-white"
                                        value="{{ old('hora_fin', $mantenimiento->hora_fin) }}">
                                </div>
                            </div>

                            <!-- Estado -->
                            <div class="group">
                                <label for="estado" class="block text-sm font-semibold text-emerald-100 mb-3 flex items-center gap-2">
                                    <div class="icon-container rounded-lg p-1.5">
                                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    Estado
                                </label>
                                <select name="estado" id="estado" class="w-full glass-input rounded-xl px-4 py-4 text-white" required>
                                    <option value="programado" {{ $mantenimiento->estado == 'programado' ? 'selected' : '' }}>
                                        🟡 Programado
                                    </option>
                                    <option value="en_proceso" {{ $mantenimiento->estado == 'en_proceso' ? 'selected' : '' }}>
                                        🟠 En Proceso
                                    </option>
                                    <option value="completado" {{ $mantenimiento->estado == 'completado' ? 'selected' : '' }}>
                                        🟢 Completado
                                    </option>
                                    <option value="cancelado" {{ $mantenimiento->estado == 'cancelado' ? 'selected' : '' }}>
                                        🔴 Cancelado
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Descripción - Full Width -->
                    <div class="group mb-8">
                        <label for="descripcion" class="block text-sm font-semibold text-emerald-100 mb-3 flex items-center gap-2">
                            <div class="icon-container rounded-lg p-1.5">
                                <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            Descripción Detallada
                        </label>
                        <textarea name="descripcion" id="descripcion" rows="5"
                            class="w-full glass-input rounded-xl px-4 py-4 text-white placeholder-emerald-200/60 resize-none"
                            placeholder="Describe los detalles específicos del mantenimiento, equipos involucrados, procedimientos, etc.">{{ old('descripcion', $mantenimiento->descripcion) }}</textarea>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row justify-end gap-4 pt-8 border-t border-emerald-500/20">
                        <a href="{{ route('mantenimientos.index') }}" 
                            class="cancel-button inline-flex items-center justify-center px-8 py-4 rounded-xl text-white font-semibold">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Cancelar
                        </a>
                        <button type="submit"
                            class="aurora-button inline-flex items-center justify-center px-8 py-4 rounded-xl text-white font-semibold shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>


        </div>

        <!-- Floating Decorative Elements -->
        <div class="fixed top-20 left-10 w-32 h-32 bg-emerald-500/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="fixed bottom-20 right-10 w-40 h-40 bg-green-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
        <div class="fixed top-1/2 left-1/4 w-24 h-24 bg-emerald-400/5 rounded-full blur-3xl animate-pulse" style="animation-delay: 4s;"></div>
    </div>
</x-app-layout>