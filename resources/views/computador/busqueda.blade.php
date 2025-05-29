@extends('layouts.base')

@section('titulo', 'Buscar y Editar Computador')

@section('contenido')
    <h2 class="mb-4">Buscar Computador por ID</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('computador.buscar') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="number" name="id" class="form-control" placeholder="Ingrese ID del computador" value="{{ request('id') }}" required>
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-search"></i> Buscar
            </button>
        </div>
    </form>

    @if (isset($computador))
        <h3 class="mb-3">Editar Computador ID: {{ $computador->id }}</h3>

        <form action="{{ route('computador.actualizar', $computador->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($computador->imagen)
                <small>Imagen actual:</small><br>
                <img src="{{ asset( $computador->imagen) }}" alt="Imagen Computador" style="max-width: 150px; margin-top: 10px;">
            @endif
            <div class="mb-3">
                <label for="codigo_tienda" class="form-label">Código de Tienda</label>
                <input type="text" id="codigo_tienda" name="codigo_tienda" class="form-control" value="{{ old('codigo_tienda', $computador->codigo_tienda) }}" required>
            </div>

            <div class="mb-3">
                <label for="almacenamiento" class="form-label">Almacenamiento</label>
                <input type="text" id="almacenamiento" name="almacenamiento" class="form-control" value="{{ old('almacenamiento', $computador->almacenamiento) }}" required>
            </div>

            <div class="mb-3">
                <label for="ram" class="form-label">RAM</label>
                <input type="text" id="ram" name="ram" class="form-control" value="{{ old('ram', $computador->ram) }}" required>
            </div>

            <div class="mb-3">
                <label for="tarjeta_grafica" class="form-label">Tarjeta Gráfica</label>
                <input type="text" id="tarjeta_grafica" name="tarjeta_grafica" class="form-control" value="{{ old('tarjeta_grafica', $computador->tarjeta_grafica) }}" required>
            </div>

            <div class="mb-3">
                <label for="procesador" class="form-label">Procesador</label>
                <input type="text" id="procesador" name="procesador" class="form-control" value="{{ old('procesador', $computador->procesador) }}" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="form-control" rows="3">{{ old('descripcion', $computador->descripcion) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio (USD)</label>
                <input type="number" step="0.01" id="precio" name="precio" class="form-control" value="{{ old('precio', $computador->precio) }}" required>
            </div>

            <div class="mb-3">
                <label for="fecha_compra" class="form-label">Fecha de Compra</label>
                <input type="date" id="fecha_compra" name="fecha_compra" class="form-control" value="{{ old('fecha_compra', $computador->fecha_compra) }}" required>
            </div>

            <div class="mb-3">
                <label for="en_uso" class="form-label">¿Está en uso?</label>
                <select id="en_uso" name="en_uso" class="form-select" required>
                    <option value="1" {{ old('en_uso', $computador->en_uso) == 1 ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ old('en_uso', $computador->en_uso) == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen (Opcional)</label>
                <input type="text" id="imagen" name="imagen" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fa fa-save"></i> Actualizar
            </button>
        </form>
    @endif
@endsection
