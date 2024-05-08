@extends('layout')    
@section('content')
<div class="container">
    <h2>Pedido Detalles</h2>
    
    <a href="{{ route('pedidosdetalles.create', $pedidoID) }}" class="btn btn-primary"><i class="bi bi-file-plus-fill" style="margin-right: 10px"></i>Agregar</a>
    
    <table class="table" border="1">
        <thead>
            <tr>
                <th>ProductoID</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>PrecioUnitario</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidosDetalles as $detalle)
            <tr>
                <td>{{ $detalle->ProductoID }}</td>
                <td>{{ $detalle->producto->Nombre }}</td>
                <td>{{ $detalle->Cantidad }}</td>
                <td>{{ $detalle->PrecioUnitario }}</td>
                <td>{{ $detalle->PrecioUnitario * $detalle->Cantidad }}</td>
                <td>
                    
                    <a href="{{route('pedidosdetalles.edit', [$pedidoID,$detalle->DetalleID])}}" 
                        class="btn btn-warning">Editar</a>
                    {{--
                    
                        <a href="{{route('pedidosdetalles.index', [$pedido->PedidoID])}}" 
                        class="btn btn-primary">Detalle</a>
                    
                    <a href="{{route('alumnos.show', [$pedido->id])}}" 
                        class="btn btn-primary">Ver</a>
                    
                    
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
    
    
    
    <a href="{{ route('pedidos.index') }}" class="btn btn-success"><i class="bi bi-file-plus-fill" style="margin-right: 10px"></i>Lista Pedidos</a>    

    @if(session('msn_error'))
        <script>
            let mensaje="{{ session('msn_error') }}";
            Swal.fire({
                icon:"error",
                html: `<span style="font-size: 16px;">${mensaje}</span>`,
            });
        </script>
    @endif
    @if(session('msn_success'))
        <script>
            let mensaje="{{ session('msn_success') }}";
            Swal.fire({
                icon:"success",
                html: `<span style="font-size: 16px;">${mensaje}</span>`,
            });
        </script>
    @endif

</div>


@endsection