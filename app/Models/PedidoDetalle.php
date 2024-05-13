<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoDetalle extends Model
{
    use HasFactory;
    protected $table = 'detalles_pedido'; // Nombre de la tabla en la base de datos
    protected $fillable = ['DetalleID','PedidoID','ProductoID','Cantidad','PrecioUnitario'];
    protected $primaryKey = 'DetalleID';

    public function producto()
    {
        return $this->belongsTo(Producto::class,'ProductoID');
    }
    public function pedido()
    {
        return $this->belongsTo(Pedido::class,'PedidoID');
    }
}
