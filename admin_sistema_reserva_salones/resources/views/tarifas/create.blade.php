<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Nueva Tarifa
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-6 sm:px-6 lg:px-8 bg-white rounded shadow">
        <form action="{{ route('tarifas.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="salon_id" class="block font-semibold mb-1">Salón</label>
                <select name="salon_id" id="salon_id" class="border rounded w-full px-3 py-2">
                    <option value="">Seleccione un salón</option>
                    @foreach($salones as $salon)
                        <option value="{{ $salon->id }}" {{ old('salon_id') == $salon->id ? 'selected' : '' }}>
                            {{ $salon->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('salon_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="nombre" class="block font-semibold mb-1">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="border rounded w-full px-3 py-2" maxlength="100" required>
                @error('nombre')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tipo_evento" class="block font-semibold mb-1">Tipo de Evento</label>
                <input type="text" name="tipo_evento" id="tipo_evento" value="{{ old('tipo_evento') }}" class="border rounded w-full px-3 py-2" maxlength="100">
                @error('tipo_evento')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="precio_por_hora" class="block font-semibold mb-1">Precio por Hora</label>
                <input type="number" name="precio_por_hora" id="precio_por_hora" step="0.01" min="0" value="{{ old('precio_por_hora') }}" class="border rounded w-full px-3 py-2">
                @error('precio_por_hora')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="precio_medio_dia" class="block font-semibold mb-1">Precio Medio Día</label>
                <input type="number" name="precio_medio_dia" id="precio_medio_dia" step="0.01" min="0" value="{{ old('precio_medio_dia') }}" class="border rounded w-full px-3 py-2">
                @error('precio_medio_dia')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="precio_dia_completo" class="block font-semibold mb-1">Precio Día Completo</label>
                <input type="number" name="precio_dia_completo" id="precio_dia_completo" step="0.01" min="0" value="{{ old('precio_dia_completo') }}" class="border rounded w-full px-3 py-2">
                @error('precio_dia_completo')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="vigente_desde" class="block font-semibold mb-1">Vigente Desde</label>
                <input type="date" name="vigente_desde" id="vigente_desde" value="{{ old('vigente_desde') }}" class="border rounded w-full px-3 py-2" required>
                @error('vigente_desde')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="vigente_hasta" class="block font-semibold mb-1">Vigente Hasta</label>
                <input type="date" name="vigente_hasta" id="vigente_hasta" value="{{ old('vigente_hasta') }}" class="border rounded w-full px-3 py-2" required>
                @error('vigente_hasta')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="horas_minimas" class="block font-semibold mb-1">Horas Mínimas</label>
                <input type="number" name="horas_minimas" id="horas_minimas" min="1" value="{{ old('horas_minimas', 1) }}" class="border rounded w-full px-3 py-2" required>
                @error('horas_minimas')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center space-x-4">
                <div>
                    <label for="aplica_fines_semana" class="inline-flex items-center">
                        <input type="checkbox" name="aplica_fines_semana" id="aplica_fines_semana" value="1" {{ old('aplica_fines_semana', true) ? 'checked' : '' }} class="form-checkbox">
                        <span class="ml-2">Aplica fines de semana</span>
                    </label>
                </div>
                <div>
                    <label for="recargo_fin_semana" class="block font-semibold mb-1">Recargo Fin de Semana (%)</label>
                    <input type="number" name="recargo_fin_semana" id="recargo_fin_semana" step="0.01" min="0" max="100" value="{{ old('recargo_fin_semana', 0.00) }}" class="border rounded w-full px-3 py-2" style="width: 120px;">
                    @error('recargo_fin_semana')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="activa" class="inline-flex items-center">
                    <input type="checkbox" name="activa" id="activa" value="1" {{ old('activa', true) ? 'checked' : '' }} class="form-checkbox">
                    <span class="ml-2 font-semibold">Activa</span>
                </label>
            </div>

            <div class="pt-4">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                    Guardar Tarifa
                </button>
                <a href="{{ route('tarifas.index') }}" class="ml-4 text-gray-600 hover:underline">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
