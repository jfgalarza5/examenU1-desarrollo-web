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

    <form action="{{ route('computador.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" name="marca" class="form-control" value="{{ old('marca') }}" required>
        </div>

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" name="modelo" class="form-control" value="{{ old('modelo') }}" required>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio (USD)</label>
            <input type="number" step="0.01" name="precio" class="form-control" value="{{ old('precio') }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha_compra" class="form-label">Fecha de Compra</label>
            <input type="date" name="fecha_compra" class="form-control" value="{{ old('fecha_compra') }}" required>
        </div>

        <div class="mb-3">
            <label for="en_uso" class="form-label">¿Está en uso?</label>
            <select name="en_uso" class="form-select" required>
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="1" {{ old('en_uso') == '1' ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ old('en_uso') == '0' ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i> Guardar
        </button>
        <a href="{{ route('computador.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
