<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'pub_reservas';

    protected $fillable = [
        'usuario_id',
        'salon_id',
        'fecha_reserva',
        'hora_inicio',
        'hora_fin',
        'numero_personas',
        'tipo_evento',
        'observaciones',
        'estado',
        'total',
        'codigo_reserva'
    ];

    protected $casts = [
        'fecha_reserva' => 'date',
        'hora_inicio' => 'datetime:H:i',
        'hora_fin' => 'datetime:H:i'
    ];

    public function salon()
    {
        return $this->belongsTo(Salon::class, 'salon_id');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'reserva_id');
    }

    public function scopePendientes($query)
    {
        return $query->where('estado', 'pendiente');
    }

    public function scopeAprobadas($query)
    {
        return $query->where('estado', 'aprobada');
    }
}
