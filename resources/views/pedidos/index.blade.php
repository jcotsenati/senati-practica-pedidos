
@extends('layout')    
@section('content')
<div class="container">
    <h2>Listado de Pedidos</h2>
    <table class="table" border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Total</th>
                <th>Detalle</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->PedidoID }}</td>
                <td>{{ $pedido->cliente->Nombre }}</td>
                <td>{{ $pedido->Total }}</td>
                <td>
                    <a href="{{route('pedidosdetalles.index', [$pedido->PedidoID])}}" 
                        class="btn btn-primary">Detalle</a>
                    
                    {{--
                    <a href="{{route('alumnos.show', [$pedido->id])}}" 
                        class="btn btn-primary">Ver</a>
                    
                    <a href="{{route('alumnos.edit', [$pedido->id])}}" 
                        class="btn btn-warning">Editar</a>

                    <form action="{{ route('alumnos.destroy', [$alumno->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                    --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {{--
    <a href="{{ route('alumnos.create') }}" class="btn btn-success"><i class="bi bi-file-plus-fill" style="margin-right: 10px"></i>Agregar</a>
    --}}
</div>
@endsection