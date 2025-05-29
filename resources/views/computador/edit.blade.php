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

    <form action="{{ route('computador.update', $computador->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Código de Tienda</label>
            <input type="text" name="codigo_tienda" class="form-control" value="{{ old('codigo_tienda', $computador->codigo_tienda) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Almacenamiento</label>
            <input type="text" name="almacenamiento" class="form-control" value="{{ old('almacenamiento', $computador->almacenamiento) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">RAM</label>
            <input type="text" name="ram" class="form-control" value="{{ old('ram', $computador->ram) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tarjeta Gráfica</label>
            <input type="text" name="tarjeta_grafica" class="form-control" value="{{ old('tarjeta_grafica', $computador->tarjeta_grafica) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Procesador</label>
            <input type="text" name="procesador" class="form-control" value="{{ old('procesador', $computador->procesador) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Precio (USD)</label>
            <input type="number" name="precio" step="0.01" class="form-control" value="{{ old('precio', $computador->precio) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="3">{{ old('descripcion', $computador->descripcion) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Imagen Actual</label><br>
            @if ($computador->imagen)
                <img src="{{ asset($computador->imagen) }}" alt="Imagen" width="100" class="mb-2"><br>
            @else
                <em>No hay imagen</em><br>
            @endif
            <label class="form-label mt-2">Cambiar Imagen</label>
            <input type="text" name="imagen" class="form-control">
        </div>

        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar cambios</button>
        <a href="{{ route('computador.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
