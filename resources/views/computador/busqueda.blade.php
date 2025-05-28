@extends('layouts.base')

@section('titulo', 'Buscar y Editar Computador')

@section('contenido')
    <h2 class="mb-4">Buscar Computador por ID</h2>

    {{-- Mensajes de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Mensajes de error --}}
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulario para buscar computador --}}
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

        <form action="{{ route('computador.actualizar', $computador->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" id="marca" name="marca" class="form-control" value="{{ old('marca', $computador->marca) }}" required>
            </div>

            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" id="modelo" name="modelo" class="form-control" value="{{ old('modelo', $computador->modelo) }}" required>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" step="0.01" id="precio" name="precio" class="form-control" value="{{ old('precio', $computador->precio) }}" required>
            </div>

            <div class="mb-3">
                <label for="fecha_compra" class="form-label">Fecha de Compra</label>
                <input type="date" id="fecha_compra" name="fecha_compra" class="form-control" value="{{ old('fecha_compra', $computador->fecha_compra->format('Y-m-d')) }}" required>
            </div>

            <div class="mb-3">
                <label for="en_uso" class="form-label">En Uso</label>
                <select id="en_uso" name="en_uso" class="form-select" required>
                    <option value="1" {{ old('en_uso', $computador->en_uso) == 1 ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ old('en_uso', $computador->en_uso) == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fa fa-save"></i> Actualizar
            </button>
        </form>
    @endif
@endsection
