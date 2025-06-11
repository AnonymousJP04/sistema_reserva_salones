<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle de la Reserva') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6 space-y-4">
                <div>
                    <h3 class="text-lg font-medium text-gray-900">Información General</h3>
                    <p><strong>ID:</strong> {{ $reserva->id }}</p>
                    <p><strong>Usuario:</strong> {{ $reserva->usuario->name ?? 'N/A' }}</p>
                    <p><strong>Correo:</strong> {{ $reserva->usuario->email ?? 'N/A' }}</p>
                    <p><strong>Salón:</strong> {{ $reserva->salon->nombre ?? 'N/A' }}</p>
                </div>

                <div>
                    <h3 class="text-lg font-medium text-gray-900">Detalles de la Reserva</h3>
                    <p><strong>Fecha:</strong> {{ $reserva->fecha }}</p>
                    <p><strong>Hora de Inicio:</strong> {{ $reserva->hora_inicio }}</p>
                    <p><strong>Hora de Fin:</strong> {{ $reserva->hora_fin }}</p>
                    <p><strong>Estado:</strong>
                        <span class="inline-flex px-2 text-sm font-semibold rounded-full
                            {{ $reserva->estado === 'aprobada' ? 'bg-green-100 text-green-800' : 
                               ($reserva->estado === 'rechazada' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                            {{ ucfirst($reserva->estado) }}
                        </span>
                    </p>
                </div>

                @if ($reserva->observaciones)
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Observaciones</h3>
                        <p>{{ $reserva->observaciones }}</p>
                    </div>
                @endif

                <div class="mt-6">
                    <a href="{{ route('reservas.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-sm text-gray-800 font-medium rounded-md">
                        ← Volver al listado
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
