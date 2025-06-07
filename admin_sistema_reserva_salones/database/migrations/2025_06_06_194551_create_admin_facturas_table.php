<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admin_facturas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reserva_id');
            $table->string('numero_factura', 50)->unique();
            $table->date('fecha_emision');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('impuestos', 10, 2)->default(0.00);
            $table->decimal('total', 10, 2);
            $table->string('nit', 20)->nullable();
            $table->string('nombre_factura', 200)->nullable();
            $table->string('direccion_factura', 250)->nullable();
            $table->enum('estado', ['emitida', 'pagada', 'anulada'])->default('emitida');
            $table->string('ruta_pdf', 500)->nullable();
            $table->foreignId('emitida_por')->constrained('admin_usuarios')->cascadeOnDelete();
            $table->timestamps();

            $table->foreign('reserva_id')->references('id')->on('pub_reservas')->cascadeOnDelete();
            
            $table->index(['reserva_id', 'numero_factura']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admin_facturas');
    }
};