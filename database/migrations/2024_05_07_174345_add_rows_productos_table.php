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
        DB::table('productos')->insert([
            'Nombre'=>'Atun',
            'Descripcion' => 'Conserva de Atun',
            'Precio' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('productos')->insert([
            'Nombre'=>'Aceite',
            'Descripcion' => 'Aceite Vegetal',
            'Precio' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('productos')->insert([
            'Nombre'=>'Arroz',
            'Descripcion' => 'Arroz Costeño',
            'Precio' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('productos')->insert([
            'Nombre'=>'Azucar',
            'Descripcion' => 'Azucar Blanca',
            'Precio' => 3,
            'created_at' => now(),
            'updated_at' => now(),
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
