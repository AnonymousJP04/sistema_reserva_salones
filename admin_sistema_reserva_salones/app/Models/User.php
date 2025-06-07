<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    // Especifica la tabla de usuarios administrativos
    protected $table = 'admin_usuarios';

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
        'activo',
        'ultimo_login_ip',
    ];

    // Atributos ocultos para arrays/JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casts para atributos especiales
    protected $casts = [
        'email_verified_at' => 'datetime',
        'activo' => 'boolean',
        'password' => 'hashed',
    ];
}
