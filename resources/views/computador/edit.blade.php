@extends('layouts.base')

@section('titulo', 'Editar Computador')

@section('contenido')
<div class="container">
    <h2 class="mb-4">Editar Computador</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hay algunos errores:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('computador.update', $computador->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" name="marca" class="form-control" value="{{ old('marca', $computador->marca) }}" required>
        </div>

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" name="modelo" class="form-control" value="{{ old('modelo', $computador->modelo) }}" required>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio (USD)</label>
            <input type="number" name="precio" step="0.01" class="form-control" value="{{ old('precio', $computador->precio) }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha_compra" class="form-label">Fecha de Compra</label>
            <input type="date" name="fecha_compra" class="form-control" value="{{ old('fecha_compra', $computador->fecha_compra) }}" required>
        </div>

        <div class="mb-3">
            <label for="en_uso" class="form-label">¿Está en uso?</label>
            <select name="en_uso" class="form-select" required>
                <option value="1" {{ $computador->en_uso ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ !$computador->en_uso ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar cambios</button>
        <a href="{{ route('computador.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
