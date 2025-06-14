<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Tarifa;
use App\Models\Mantenimiento;
use App\Models\Reserva;

class Salon extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'admin_salones';

    protected $fillable = [
        'nombre',
        'descripcion',
        'capacidad_maxima',
        'capacidad_minima',
        'precio_base',
        'tiene_aire_acondicionado',
        'tiene_proyector',
        'tiene_sonido',
        'tiene_cocina',
        'area_metros',
        'imagen_principal',
        'galeria_imagenes',
        'estado',
        'slug'
    ];

    protected $casts = [
        'galeria_imagenes' => 'array',
        'tiene_aire_acondicionado' => 'boolean',
        'tiene_proyector' => 'boolean',
        'tiene_sonido' => 'boolean',
        'tiene_cocina' => 'boolean'
    ];

    public function tarifas()
    {
        return $this->hasMany(Tarifa::class, 'salon_id');
    }

    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class, 'salon_id');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'salon_id');
    }

    // Buscar por slug en las rutas
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Accesor para asegurar que galeria_imagenes siempre sea array
    public function getGaleriaImagenesAttribute($value)
    {
        return $value ? json_decode($value, true) : [];
    }

}
