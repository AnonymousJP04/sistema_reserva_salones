<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admin_pagos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reserva_id');
            $table->unsignedBigInteger('comprobante_id')->nullable();
            $table->decimal('monto', 10, 2);
            $table->date('fecha_pago');
            $table->string('metodo_pago', 50);
            $table->string('referencia_bancaria', 100)->nullable();
            $table->enum('estado', ['pendiente', 'verificado', 'rechazado', 'reembolsado'])->default('pendiente');
            $table->foreignId('verificado_por')->nullable()->constrained('admin_usuarios')->nullOnDelete();
            $table->timestamp('fecha_verificacion')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();

            // Claves foráneas manuales para tablas públicas
            $table->foreign('reserva_id')->references('id')->on('pub_reservas')->cascadeOnDelete();
            $table->foreign('comprobante_id')->references('id')->on('pub_comprobantes_pago')->nullOnDelete();
            
            $table->index(['reserva_id', 'estado']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admin_pagos');
    }
};
