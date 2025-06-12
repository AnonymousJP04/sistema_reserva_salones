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
        'estado',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'hora_inicio' => 'string',
        'hora_fin' => 'string',
        'costo' => 'float',
    ];

    public function salon(): BelongsTo
    {
    return $this->belongsTo(Salon::class, 'salon_slug', 'slug');
    }


    public function creador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creado_por');
    }
}
