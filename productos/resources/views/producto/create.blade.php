@extends('layouts.miPlantilla') <!-- se extiende la plantilla base -->

@section('titulo','Crear Producto') <!-- se define el titulo de la pagina -->

@section('contenido') <!-- inicio de la seccion de contenido -->

<h2>Registrar Producto</h2> <!-- encabezado principal -->

@if ($errors->any())
<div class="alert alert-danger"> <!-- se muestran los errores de validacion si existen -->
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li> <!-- se lista cada error -->
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('producto.store') }}"> <!-- formulario para registrar un nuevo producto -->
    @csrf <!-- token de proteccion csrf -->

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input name="nombre" type="text" class="form-control" value="{{ old('nombre') }}" required minlength="3"> <!-- campo de texto para el nombre del producto -->
    </div>

    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea name="descripcion" class="form-control">{{ old('descripcion') }}</textarea> <!-- campo de texto para la descripcion del producto -->
    </div>

    <div class="mb-3">
        <label class="form-label">Precio Unitario</label>
        <input name="precio_unitario" type="number" step="0.01" min="0.01" class="form-control" value="{{ old('precio_unitario') }}" required> <!-- campo numerico para el precio -->
    </div>

    <div class="mb-3">
        <label class="form-label">Cantidad</label>
        <input name="cantidad" type="number" min="0" class="form-control" value="{{ old('cantidad') }}" required> <!-- campo numerico para la cantidad -->
    </div>

    <div class="mb-3">
        <label class="form-label">Categoría</label>
        <input name="categoria" type="text" class="form-control" value="{{ old('categoria') }}" required> <!-- campo de texto para la categoria -->
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button> <!-- boton para enviar -->
    <a href="{{ route('producto.index') }}" class="btn btn-secondary">Cancelar</a> <!-- boton para regresar al listado -->
</form>

@endsection <!-- fin de la seccion -->
