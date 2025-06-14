<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <svg class="w-8 h-8 text-green-400 animate-bounce" fill="none" viewBox="0 0 24 24">
                <defs>
                    <linearGradient id="tarifasCreateGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#22c55e"/>
                        <stop offset="100%" stop-color="#10b981"/>
                    </linearGradient>
                </defs>
                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" stroke="url(#tarifasCreateGradient)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <h2 class="font-bold text-2xl bg-gradient-to-r from-green-400 via-green-300 to-green-500 bg-clip-text text-transparent">
                Crear Nueva Tarifa
            </h2>
        </div>
    </x-slot>

    <style>
        .aurora-card {
            background: rgba(255,255,255,0.07);
            backdrop-filter: blur(18px);
            border: 1.5px solid rgba(34,197,94,0.18);
            box-shadow: 0 8px 32px rgba(0,0,0,0.25), 0 0 20px rgba(34,197,94,0.10);
            transition: all 0.3s cubic-bezier(.4,0,.2,1);
        }
        .aurora-card:hover {
            box-shadow: 0 20px 40px rgba(0,0,0,0.35), 0 0 30px rgba(34,197,94,0.18);
            border-color: rgba(34,197,94,0.35);
        }
        .aurora-input {
            @apply bg-white/10 border border-white/30 text-white placeholder-white/60 rounded-lg px-3 py-2 w-full focus:border-green-400 focus:ring-2 focus:ring-green-400/40 transition-all duration-200;
        }
        .aurora-label {
            @apply font-semibold text-green-200 mb-1;
        }
        .aurora-btn {
            @apply bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold px-6 py-2 rounded-lg shadow-lg transition-all duration-200;
        }
        .aurora-btn-cancel {
            @apply ml-4 text-green-200 hover:text-green-400 underline transition-all duration-150;
        }
        .animate-fadeInUp {
            animation: fadeInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
            opacity: 0;
        }
        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(30px) scale(0.97);}
            100% { opacity: 1; transform: translateY(0) scale(1);}
        }
    </style>

    <div class="max-w-3xl mx-auto py-8 px-4 sm:px-6 lg:px-8 animate-fadeInUp">
        <div class="aurora-card rounded-2xl p-8">
            <form action="{{ route('tarifas.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="salon_id" class="aurora-label block">Salón</label>
                    <select name="salon_id" id="salon_id" class="aurora-input">
                        <option value="">Seleccione un salón</option>
                        @foreach($salones as $salon)
                            <option value="{{ $salon->id }}" {{ old('salon_id') == $salon->id ? 'selected' : '' }}>
                                {{ $salon->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('salon_id')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="nombre" class="aurora-label block">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" maxlength="100" required class="aurora-input">
                    @error('nombre')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="tipo_evento" class="aurora-label block">Tipo de Evento</label>
                    <input type="text" name="tipo_evento" id="tipo_evento" value="{{ old('tipo_evento') }}" maxlength="100" class="aurora-input">
                    @error('tipo_evento')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="precio_por_hora" class="aurora-label block">Precio por Hora</label>
                        <input type="number" name="precio_por_hora" id="precio_por_hora" step="0.01" min="0" value="{{ old('precio_por_hora') }}" class="aurora-input">
                        @error('precio_por_hora')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="precio_medio_dia" class="aurora-label block">Precio Medio Día</label>
                        <input type="number" name="precio_medio_dia" id="precio_medio_dia" step="0.01" min="0" value="{{ old('precio_medio_dia') }}" class="aurora-input">
                        @error('precio_medio_dia')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="precio_dia_completo" class="aurora-label block">Precio Día Completo</label>
                        <input type="number" name="precio_dia_completo" id="precio_dia_completo" step="0.01" min="0" value="{{ old('precio_dia_completo') }}" class="aurora-input">
                        @error('precio_dia_completo')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="vigente_desde" class="aurora-label block">Vigente Desde</label>
                        <input type="date" name="vigente_desde" id="vigente_desde" value="{{ old('vigente_desde') }}" required class="aurora-input">
                        @error('vigente_desde')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="vigente_hasta" class="aurora-label block">Vigente Hasta</label>
                        <input type="date" name="vigente_hasta" id="vigente_hasta" value="{{ old('vigente_hasta') }}" required class="aurora-input">
                        @error('vigente_hasta')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="horas_minimas" class="aurora-label block">Horas Mínimas</label>
                        <input type="number" name="horas_minimas" id="horas_minimas" min="1" value="{{ old('horas_minimas', 1) }}" required class="aurora-input">
                        @error('horas_minimas')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="recargo_fin_semana" class="aurora-label block">Recargo Fin de Semana (%)</label>
                        <input type="number" name="recargo_fin_semana" id="recargo_fin_semana" step="0.01" min="0" max="100" value="{{ old('recargo_fin_semana', 0.00) }}" class="aurora-input">
                        @error('recargo_fin_semana')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex items-center mt-6">
                        <input type="checkbox" name="aplica_fines_semana" id="aplica_fines_semana" value="1" {{ old('aplica_fines_semana', true) ? 'checked' : '' }} class="form-checkbox text-green-500 focus:ring-green-400">
                        <label for="aplica_fines_semana" class="ml-2 text-green-200">Aplica fines de semana</label>
                    </div>
                </div>

                <div class="flex items-center mt-2">
                    <input type="checkbox" name="activa" id="activa" value="1" {{ old('activa', true) ? 'checked' : '' }} class="form-checkbox text-green-500 focus:ring-green-400">
                    <label for="activa" class="ml-2 font-semibold text-green-200">Activa</label>
                </div>

                <div class="pt-6 flex items-center">
                    <button type="submit" class="aurora-btn">
                        Guardar Tarifa
                    </button>
                    <a href="{{ route('tarifas.index') }}" class="aurora-btn-cancel">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>