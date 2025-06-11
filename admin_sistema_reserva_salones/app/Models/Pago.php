<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pago extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'admin_pagos';

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'reserva_id',
        'comprobante_id',
        'monto',
        'fecha_pago',
        'metodo_pago',
        'referencia_bancaria',
        'estado',
        'verificado_por',
        'fecha_verificacion',
        'observaciones'
    ];

    // Casts para atributos especiales
    protected $casts = [
        'fecha_pago' => 'date',
        'fecha_verificacion' => 'datetime',
        'monto' => 'float',
    ];

    // Relación: Un pago pertenece a una reserva pública
    public function reserva(): BelongsTo
    {
        return $this->belongsTo(Reserva::class, 'reserva_id');
    }

    // Relación: Un pago puede ser verificado por un usuario administrador
    public function verificador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verificado_por');
    }
}
