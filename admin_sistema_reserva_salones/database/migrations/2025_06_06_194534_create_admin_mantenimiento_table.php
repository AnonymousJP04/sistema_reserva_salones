<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admin_mantenimiento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('salon_id')->constrained('admin_salones')->cascadeOnDelete();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->time('hora_inicio')->nullable();
            $table->time('hora_fin')->nullable();
            $table->string('tipo_mantenimiento', 100);
            $table->text('descripcion')->nullable();
            $table->string('proveedor', 150)->nullable();
            $table->decimal('costo', 10, 2)->nullable();
            $table->foreignId('creado_por')->constrained('admin_usuarios')->nullOnDelete();
            $table->enum('estado', ['programado', 'en_proceso', 'completado', 'cancelado'])->default('programado');
            $table->timestamps();
            
            $table->index(['salon_id', 'fecha_inicio', 'fecha_fin']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admin_mantenimiento');
    }
};