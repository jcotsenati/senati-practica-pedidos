@extends('layout')    
@section('content')
<div class="container">
    <h2>Editar Producto</h2>
    <form method="POST" action="{{ route('pedidosdetalles.update',[$pedidoID,$pedidoDetalle->DetalleID]) }}">
        @csrf
        @method('PUT') <!-- Utiliza PUT para la actualización -->
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" readonly  class="form-control" id="nombre" name="nombre" value="{{ $pedidoDetalle->producto->Nombre }}">
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="text" class="form-control" id="cantidad" name="cantidad" value="{{ $pedidoDetalle->Cantidad }}">
            
        </div>
        <div class="form-group">
            <label for="precio_unitario">Precio Unitario</label>
            <input type="text" class="form-control" id="precio_unitario" name="precio_unitario" value="{{ $pedidoDetalle->PrecioUnitario }}" >
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        
        <a href="{{ route('pedidosdetalles.index',[$pedidoID]) }}" class="btn btn-danger">Cancelar</a>
        
</div>
@endsection