@extends('layout')    
@section('content')
<div class="container">

    <h2>Pedido de: {{$pedido->cliente->Nombre}}</h2>

    <a href="{{ route('pedidosdetalles.create', $pedido->PedidoID) }}" class="btn btn-primary"><i class="bi bi-file-plus-fill" style="margin-right: 10px"></i>Agregar</a>
    
    <table class="table" border="1">
        <thead>
            <tr>
                <th>PedidoID</th>
                <th>ProductoID</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>PrecioUnitario</th>
                <th>Precio</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidosDetalles as $detalle)
            <tr>
                <td>{{ $detalle->PedidoID }}</td>
                <td>{{ $detalle->ProductoID }}</td>
                <td>{{ $detalle->producto->Nombre }}</td>
                <td>{{ $detalle->Cantidad }}</td>
                <td>{{ $detalle->PrecioUnitario }}</td>
                <td>{{ number_format($detalle->PrecioUnitario * $detalle->Cantidad,2) }}</td>
                <td>
                    
                    <a href="{{route('pedidosdetalles.edit', [$pedido->PedidoID,$detalle->DetalleID])}}" 
                        class="btn btn-warning">Editar</a>
                    
                    <form onsubmit='window.confirmaEliminarPedido(event)' action="{{ route('pedidosdetalles.destroy', [$detalle->DetalleID]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                    
                    {{--
                    
                        <a href="{{route('pedidosdetalles.index', [$pedido->PedidoID])}}" 
                        class="btn btn-primary">Detalle</a>
                    
                    <a href="{{route('alumnos.show', [$pedido->id])}}" 
                        class="btn btn-primary">Ver</a>
                    
                    
                    
                    --}}
                </td>
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Total</b></td>
                @if(count($pedidosDetalles) > 0)
                    <td>{{ $pedidosDetalles[0]->pedido->Total }}</td>
                @else
                    <td>0.00</td>
                @endif
            </tr>
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

<script>
    function confirmaEliminarPedido(event){
        event.preventDefault();
        let form=event.target;
        
        Swal.fire({
            //title: "?",
            text: "¿Estás seguro de que deseas eliminar este elemento?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si",
            cancelButtonText: "No"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });

    }
</script>

@endsection