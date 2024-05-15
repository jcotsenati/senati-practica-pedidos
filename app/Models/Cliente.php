<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes'; // Nombre de la tabla en la base de datos
    protected $fillable = ['Nombre','Direccion','Telefono'];
    protected $primaryKey = 'ClienteID';

    public function pedidos()
    {
        return $this->hasMany(Pedido::class,'ClienteID');
    }

}
