<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Mantenimiento') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 bg-white shadow-md rounded p-6">

            <form method="POST" action="{{ route('mantenimientos.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700">Salón</label>
                    <select name="salon_id" class="w-full border-gray-300 rounded mt-1" required>
                        <option value="">Seleccione un salón</option>
                        @foreach($salones as $salon)
                            <option value="{{ $salon->id }}">{{ $salon->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700">Fecha de Inicio</label>
                        <input type="date" name="fecha_inicio" class="w-full border-gray-300 rounded mt-1" required>
                    </div>

                    <div>
                        <label class="block text-gray-700">Fecha de Fin</label>
                        <input type="date" name="fecha_fin" class="w-full border-gray-300 rounded mt-1" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700">Hora de Inicio</label>
                        <input type="time" name="hora_inicio" class="w-full border-gray-300 rounded mt-1">
                    </div>

                    <div>
                        <label class="block text-gray-700">Hora de Fin</label>
                        <input type="time" name="hora_fin" class="w-full border-gray-300 rounded mt-1">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Tipo de Mantenimiento</label>
                    <input type="text" name="tipo_mantenimiento" maxlength="100" class="w-full border-gray-300 rounded mt-1" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Descripción</label>
                    <textarea name="descripcion" class="w-full border-gray-300 rounded mt-1" rows="3"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Proveedor</label>
                    <input type="text" name="proveedor" maxlength="150" class="w-full border-gray-300 rounded mt-1">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Costo (Q)</label>
                    <input type="number" name="costo" step="0.01" class="w-full border-gray-300 rounded mt-1">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Estado</label>
                    <select name="estado" class="w-full border-gray-300 rounded mt-1" required>
                        <option value="programado">Programado</option>
                        <option value="en_proceso">En proceso</option>
                        <option value="completado">Completado</option>
                        <option value="cancelado">Cancelado</option>
                    </select>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Guardar</button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
