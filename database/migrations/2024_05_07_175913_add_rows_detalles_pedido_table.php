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
        DB::table('detalles_pedido')->insert([
            'PedidoID'=>1,
            'ProductoID' => 1,
            'Cantidad' => 2,
            'PrecioUnitario' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('detalles_pedido')->insert([
            'PedidoID'=>1,
            'ProductoID' => 2,
            'Cantidad' => 5,
            'PrecioUnitario' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('pedidos')->where('PedidoID', 1)->update([
            'Total' => 4+50,  
            'updated_at' => now()
        ]);
        ///////////////////////////////////////////
        DB::table('detalles_pedido')->insert([
            'PedidoID'=>2,
            'ProductoID' => 2,
            'Cantidad' => 2,
            'PrecioUnitario' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('pedidos')->where('PedidoID', 2)->update([
            'Total' => 4,  
            'updated_at' => now()
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
