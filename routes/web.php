<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoDetalleController;

//CRUD PEDIDOS
Route::get('/', [PedidoController::class, 'index'])->name("pedidos.index");
Route::get('/pedidos', [PedidoController::class, 'index'])->name("pedidos.index");
Route::get('/pedidos/buscar', [PedidoController::class, 'buscar'])->name('pedidos.buscar');

//CRUD PEDIDOS DETALLES
Route::get('/pedidosdetalles/{PedidoID}', [PedidoDetalleController::class, 'index'])->name("pedidosdetalles.index");
Route::get('/pedidosdetalles/{PedidoID}/create', [PedidoDetalleController::class, 'create'])->name("pedidosdetalles.create");
Route::post('/pedidosdetalles/{PedidoID}/create/{ProductoID}', [PedidoDetalleController::class, 'store'])->name("pedidosdetalles.store");
Route::get('/pedidosdetalles/{PedidoID}/edit/{DetalleID}', [PedidoDetalleController::class, 'edit'])->name("pedidosdetalles.edit");
Route::put('/pedidosdetalles/{PedidoID}/update/{DetalleID}', [PedidoDetalleController::class, 'update'])->name("pedidosdetalles.update");
Route::delete('/pedidosdetalles/{PedidoID}', [PedidoDetalleController::class, 'destroy'])->name("pedidosdetalles.destroy");
