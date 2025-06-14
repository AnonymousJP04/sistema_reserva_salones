<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mantenimiento extends Model
{
    use HasFactory;

    protected $table = 'admin_mantenimiento';

    protected $fillable = [
        'salon_id',          // ← Campo correcto según tu migración
        'fecha_inicio',
        'fecha_fin',
        'hora_inicio',
        'hora_fin',
        'tipo_mantenimiento',
        'descripcion',
        'proveedor',
        'costo',
        'creado_por',
        'estado',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'hora_inicio' => 'string',
        'hora_fin' => 'string',
        'costo' => 'decimal:2',  // ← Mejor para decimales
    ];

    // ✅ Relación corregida - debe usar salon_id, no salon_slug
    public function salon(): BelongsTo
    {
        return $this->belongsTo(Salon::class, 'salon_id', 'id');
    }

    public function creador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creado_por');
    }
}