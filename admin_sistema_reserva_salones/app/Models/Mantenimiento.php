<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mantenimiento extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'admin_mantenimiento';

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'salon_id',
        'fecha_inicio',
        'fecha_fin',
        'hora_inicio',
        'hora_fin',
        'tipo_mantenimiento',
        'descripcion',
        'proveedor',
        'costo',
        'creado_por',
        'estado'
    ];

    // Casts para atributos especiales
    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'hora_inicio' => 'string',
        'hora_fin' => 'string',
        'costo' => 'float',
    ];

    // Relación: Un mantenimiento pertenece a un salón
    public function salon(): BelongsTo
    {
        return $this->belongsTo(Salon::class, 'salon_id');
    }

    // Relación: Un mantenimiento fue creado por un usuario administrador
    public function creador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creado_por');
    }
}
