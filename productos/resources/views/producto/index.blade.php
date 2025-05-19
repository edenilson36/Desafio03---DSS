@extends('layouts.miPlantilla') <!-- se utiliza la plantilla base -->

@section('titulo','Listado de Productos') <!-- se define el titulo de la pagina -->

@section('contenido') <!-- seccion de contenido principal -->

@if(session('success'))
<div class="alert alert-success"> <!-- muestra un mensaje de exito si existe -->
    {{ session('success') }}
</div>
@endif

<h2 class="mb-4">Lista de Productos</h2>
<a href="{{ route('producto.create') }}" class="btn btn-success mb-3">Nuevo Producto</a> <!-- boton para crear un nuevo producto -->

<table class="table table-striped"> 
    <thead class="table-dark"> 
        <tr>
            <th>ID</th><th>Nombre</th><th>Descripción</th>
            <th>Precio</th><th>Cantidad</th><th>Categoría</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($productos as $producto) <!-- recorre la lista de productos -->
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->descripcion }}</td>
            <td>${{ $producto->precio_unitario }}</td>
            <td>{{ $producto->cantidad }}</td>
            <td>{{ $producto->categoria }}</td>
            <td>
                <a href="{{ route('producto.edit', $producto->id) }}" class="btn btn-warning btn-sm">Editar</a> <!-- boton para editar -->
                <form action="{{ route('producto.destroy', $producto->id) }}" method="POST" style="display:inline;"> <!-- formulario para eliminar -->
                    @csrf @method('DELETE') <!-- protege el formulario con csrf y usa metodo delete -->
                    <button type="submit" class="btn btn-danger btn-sm"
                    onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button> <!-- boton para eliminar con confirmacion -->
                </form>
            </td>
        </tr>
        @empty <!-- se muestra si no hay productos -->
        <tr><td colspan="7" class="text-center">No hay productos registrados.</td></tr>
        @endforelse
    </tbody>
</table>

@endsection <!-- fin de la seccion -->
