@extends('layouts.base')

@section('titulo', 'Nuevo Computador')

@section('contenido')
<div class="container">
    <h2 class="mb-4">Registrar Nuevo Computador</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hay errores en el formulario:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('computador.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Código de Tienda</label>
            <input type="text" name="codigo_tienda" class="form-control" value="{{ old('codigo_tienda') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Marca</label>
            <input type="text" name="marca" class="form-control" value="{{ old('marca') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Modelo</label>
            <input type="text" name="modelo" class="form-control" value="{{ old('modelo') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Almacenamiento</label>
            <input type="text" name="almacenamiento" class="form-control" value="{{ old('almacenamiento') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">RAM</label>
            <input type="text" name="ram" class="form-control" value="{{ old('ram') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tarjeta Gráfica</label>
            <input type="text" name="tarjeta_grafica" class="form-control" value="{{ old('tarjeta_grafica') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Procesador</label>
            <input type="text" name="procesador" class="form-control" value="{{ old('procesador') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Precio (USD)</label>
            <input type="number" step="0.01" name="precio" class="form-control" value="{{ old('precio') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha de Compra</label>
            <input type="date" name="fecha_compra" class="form-control" value="{{ old('fecha_compra') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">¿Está en uso?</label>
            <select name="en_uso" class="form-select" required>
                <option value="" disabled {{ old('en_uso') === null ? 'selected' : '' }}>Selecciona una opción</option>
                <option value="1" {{ old('en_uso') == '1' ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ old('en_uso') == '0' ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="3">{{ old('descripcion') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Imagen</label>
            <input type="text" name="imagen" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i> Guardar
        </button>
        <a href="{{ route('computador.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
