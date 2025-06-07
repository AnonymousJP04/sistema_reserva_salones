<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tarifa extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'admin_tarifas';

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'salon_id',
        'nombre',
        'tipo_evento',
        'precio_por_hora',
        'precio_medio_dia',
        'precio_dia_completo',
        'vigente_desde',
        'vigente_hasta',
        'horas_minimas',
        'aplica_fines_semana',
        'recargo_fin_semana',
        'activa'
    ];

    // Casts para atributos especiales
    protected $casts = [
        'precio_por_hora' => 'float',
        'precio_medio_dia' => 'float',
        'precio_dia_completo' => 'float',
        'vigente_desde' => 'date',
        'vigente_hasta' => 'date',
        'horas_minimas' => 'integer',
        'aplica_fines_semana' => 'boolean',
        'recargo_fin_semana' => 'float',
        'activa' => 'boolean',
    ];

    // Relación: Una tarifa pertenece a un salón
    public function salon(): BelongsTo
    {
        return $this->belongsTo(Salon::class, 'salon_id');
    }
}
