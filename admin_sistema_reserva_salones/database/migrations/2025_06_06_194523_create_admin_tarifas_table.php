<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admin_tarifas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('salon_id')->constrained('admin_salones')->cascadeOnDelete();
            $table->string('nombre', 100);
            $table->string('tipo_evento', 100)->nullable();
            $table->decimal('precio_por_hora', 10, 2)->nullable();
            $table->decimal('precio_medio_dia', 10, 2)->nullable();
            $table->decimal('precio_dia_completo', 10, 2)->nullable();
            $table->date('vigente_desde');
            $table->date('vigente_hasta');
            $table->integer('horas_minimas')->default(1);
            $table->boolean('aplica_fines_semana')->default(true);
            $table->decimal('recargo_fin_semana', 5, 2)->default(0.00);
            $table->boolean('activa')->default(true);
            $table->timestamps();
            
            $table->index(['salon_id', 'activa']);
            $table->index(['vigente_desde', 'vigente_hasta']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admin_tarifas');
    }
};
