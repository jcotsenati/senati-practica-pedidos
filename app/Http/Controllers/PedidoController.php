<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index(Request $request)
    {
        $pedidos = Pedido::all();
        
        return view('pedidos.index', compact('pedidos'));
    }
    public function buscar(Request $request)
    {
        $tipoBusqueda = $request->input('tipo_busqueda');
        $query = $request->input('buscar');

        if ($tipoBusqueda === 'nombre') {
            $subquery = Cliente::select('ClienteID')->where('Nombre','like','%'.$query.'%');
            $pedidos = Pedido::whereIn('ClienteID', $subquery)->get();
        }
        else{
            $pedidos = Pedido::all();
        }
        
        return view('pedidos.index', compact('pedidos'));
    }
}
