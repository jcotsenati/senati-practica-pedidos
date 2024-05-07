<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalles_pedido', function (Blueprint $table) {
            $table->id('DetalleID');
            $table->unsignedBigInteger('PedidoID');
            $table->unsignedBigInteger('ProductoID');
            $table->integer('Cantidad');
            $table->decimal('PrecioUnitario', 10, 2);
            $table->foreign('PedidoID')->references('PedidoID')->on('pedidos');
            $table->foreign('ProductoID')->references('ProductoID')->on('productos');
            $table->unique(['PedidoID', 'ProductoID']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_pedido');
    }
};
