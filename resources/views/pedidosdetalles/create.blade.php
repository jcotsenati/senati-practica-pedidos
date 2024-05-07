@extends('layout')    
@section('content')
<div class="container">
    <h2>Lista de Productos</h2>
    <table class="table" border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->ProductoID }}</td>
                <td>{{ $producto->Nombre }}</td>
                <td>{{ $producto->Descripcion }}</td>
                <td>{{ $producto->Precio }}</td>
                <td>
                    
                    <form action="{{ route('pedidosdetalles.store', [$pedidoID,$producto->ProductoID]) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-primary">Seleccionar</button>
                    </form>

                    {{--
                    
                        <a href="{{route('pedidosdetalles.index', [$pedido->PedidoID])}}" 
                        class="btn btn-primary">Detalle</a>
                    
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
    <a href="{{ route('pedidosdetalles.create', $pedidoID) }}" class="btn btn-success"><i class="bi bi-file-plus-fill" style="margin-right: 10px"></i>Agregar</a>
    --}}    

</div>
@endsection