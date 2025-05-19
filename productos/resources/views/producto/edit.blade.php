@extends('layouts.miPlantilla') <!-- se extiende la plantilla base -->

@section('titulo','Editar Producto') <!-- se define el titulo de la pagina -->

@section('contenido') <!-- inicio de la seccion de contenido -->

<h2>Editar Producto</h2> <!-- encabezado principal -->

@if ($errors->any())
<div class="alert alert-danger"> <!-- se muestran los errores de validacion si existen -->
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li> <!-- se lista cada error -->
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('producto.update', $producto->id) }}"> <!-- formulario para actualizar un producto existente -->
    @csrf <!-- token de proteccion csrf -->
    @method('PUT') <!-- se especifica el metodo put para la actualizacion -->

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input name="nombre" type="text" class="form-control" value="{{ old('nombre', $producto->nombre) }}" required minlength="3"> <!-- campo para editar el nombre -->
    </div>

    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea name="descripcion" class="form-control">{{ old('descripcion', $producto->descripcion) }}</textarea> <!-- campo para editar la descripcion -->
    </div>

    <div class="mb-3">
        <label class="form-label">Precio Unitario</label>
        <input name="precio_unitario" type="number" step="0.01" min="0.01" class="form-control" value="{{ old('precio_unitario', $producto->precio_unitario) }}" required> <!-- campo para editar el precio -->
    </div>

    <div class="mb-3">
        <label class="form-label">Cantidad</label>
        <input name="cantidad" type="number" min="0" class="form-control" value="{{ old('cantidad', $producto->cantidad) }}" required> <!-- campo para editar la cantidad -->
    </div>

    <div class="mb-3">
        <label class="form-label">Categoría</label>
        <input name="categoria" type="text" class="form-control" value="{{ old('categoria', $producto->categoria) }}" required> <!-- campo para editar la categoria -->
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button> <!-- boton para enviar los cambios -->
    <a href="{{ route('producto.index') }}" class="btn btn-secondary">Cancelar</a> <!-- boton para regresar sin guardar -->
</form>

@endsection <!-- fin de la seccion -->
