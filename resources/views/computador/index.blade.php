@extends('layouts.base')

@section('titulo', 'Lista de Computadores')

@section('contenido')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Computadores Registrados</h2>

        <div class="d-flex gap-2">
            <!-- Formulario de búsqueda -->
            <form action="{{ route('computador.buscar') }}" method="GET" class="d-flex">
                <input type="text" name="id" class="form-control me-2" placeholder="Buscar por ID" required>
                <button type="submit" class="btn btn-outline-secondary">
                    <i class="fa fa-search"></i>
                </button>
            </form>

            <a href="{{ route('computador.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Nuevo Computador
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($computadores->isEmpty())
        <div class="alert alert-info">No hay computadores registrados.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Precio (USD)</th>
                        <th>Fecha de Compra</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($computadores as $pc)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pc->marca }}</td>
                            <td>{{ $pc->modelo }}</td>
                            <td>${{ number_format($pc->precio, 2) }}</td>
                            <td>{{ \Carbon\Carbon::parse($pc->fecha_compra)->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('computador.edit', $pc) }}" class="btn btn-sm btn-warning" title="Editar">
                                    <i class="fa fa-pen"></i>
                                </a>

                                <form action="{{ route('computador.destroy', $pc) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('¿Seguro quieres eliminar este computador?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" title="Eliminar" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
