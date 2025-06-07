<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admin_salones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 150);
            $table->string('slug')->unique();
            $table->text('descripcion')->nullable();
            $table->integer('capacidad_maxima');
            $table->integer('capacidad_minima')->default(1);
            $table->decimal('precio_base', 10, 2);
            $table->boolean('tiene_aire_acondicionado')->default(false);
            $table->boolean('tiene_proyector')->default(false);
            $table->boolean('tiene_sonido')->default(false);
            $table->boolean('tiene_cocina')->default(false);
            $table->decimal('area_metros', 8, 2)->nullable();
            $table->string('imagen_principal', 500)->nullable();
            $table->json('galeria_imagenes')->nullable();
            $table->enum('estado', ['activo', 'inactivo', 'mantenimiento'])->default('activo');
            $table->timestamps();
            $table->softDeletes();
            
            $table->index('estado');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admin_salones');
    }
};