<x-layouts.app>
<div class="container mt-4">
    <h1>Detalles del Salón: {{ $salon->nombre }}</h1>

    <a href="{{ route('salones.index') }}" class="btn btn-secondary mb-3">Regresar</a>

    <div class="row">
        <div class="col-md-6">
            <h4>Imagen Principal</h4>
            @if($salon->imagen_principal)
                <img src="{{ asset('storage/' . $salon->imagen_principal) }}" alt="{{ $salon->nombre }}" class="img-fluid mb-3">
            @else
                <p>No hay imagen principal.</p>
            @endif

            <h4>Galería de Imágenes</h4>
            @if($salon->galeria_imagenes && count($salon->galeria_imagenes) > 0)
                <div class="d-flex flex-wrap gap-2">
                    @foreach($salon->galeria_imagenes as $imagen)
                        <img src="{{ asset('storage/' . $imagen) }}" alt="Galería" width="150" height="100" class="border rounded">
                    @endforeach
                </div>
            @else
                <p>No hay imágenes en la galería.</p>
            @endif
        </div>

        <div class="col-md-6">
            <h4>Información</h4>
            <p><strong>Descripción:</strong> {{ $salon->descripcion ?? 'Sin descripción' }}</p>
            <p><strong>Capacidad Mínima:</strong> {{ $salon->capacidad_minima }}</p>
            <p><strong>Capacidad Máxima:</strong> {{ $salon->capacidad_maxima }}</p>
            <p><strong>Precio Base:</strong> ${{ number_format($salon->precio_base, 2) }}</p>
            <p><strong>Área (m²):</strong> {{ $salon->area_metros ?? 'No especificado' }}</p>
            <p><strong>Aire acondicionado:</strong> {{ $salon->tiene_aire_acondicionado ? 'Sí' : 'No' }}</p>
            <p><strong>Proyector:</strong> {{ $salon->tiene_proyector ? 'Sí' : 'No' }}</p>
            <p><strong>Sonido:</strong> {{ $salon->tiene_sonido ? 'Sí' : 'No' }}</p>
            <p><strong>Cocina:</strong> {{ $salon->tiene_cocina ? 'Sí' : 'No' }}</p>
            <p><strong>Estado:</strong> {{ ucfirst($salon->estado) }}</p>
        </div>
    </div>
</div>
</x-layouts.app>
