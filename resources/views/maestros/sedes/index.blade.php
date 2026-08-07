@extends('adminlte::page')

@section('title', 'Sedes')

@section('content_header')
    <h1>Sedes</h1>
@stop

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif



<div class="card">

    <div class="card-header">

    <div class="d-flex justify-content-between align-items-center">

        <a href="{{ route('sedes.create')}}" class="btn btn-primary">
            Nueva Sede
        </a>

        <form action="{{ route('sedes.index') }}" method="GET" class="d-flex">

            <input
                type="text"
                name="buscar"
                class="form-control me-2"
                placeholder="Buscar por nombre o código..."
                value="{{ $buscar }}">

            <button class="btn btn-secondary">
                Buscar
            </button>

        </form>

    </div>

</div>

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Colegio</th>
                    <th>Teléfono</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                </thead>

            <tbody>

            @forelse($sedes as $sede)

                    <td>{{ $sede->id }}</td>
                        <td>{{ $sede->codigo }}</td>
                        <td>{{ $sede->nombre }}</td>
                        <td>{{ $sede->colegio->nombre }}</td>
                        <td>{{ $sede->telefono }}</td>
                        <td>{{ $sede->estado ? 'Activo' : 'Inactivo' }}

                    </td>

                    <a href="{{ route('sedes.edit', $sede) }}"
                        class="btn btn-warning btn-sm">
                        Editar
                    </a>

                    <form action="{{ route('sedes.destroy', $sede) }}"
                        method="POST"
                        style="display:inline;">

                        @csrf
                        @method('DELETE')

                        @if($sede->estado)

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Desea desactivar esta sede?')">

                                Desactivar

                            </button>

                        @else

                            <button
                                type="submit"
                                class="btn btn-success btn-sm"
                                onclick="return confirm('¿Desea activar esta sede?')">

                                Activar

                            </button>

                        @endif

                    </form>

                </td>
                </tr>

            @empty

                <tr>
                    <td colspan="6" class="text-center">
                        No hay sedes registradas.
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

        <div class="mt-3">
            {{ $sedes->links() }}
        </div>

    </div>

</div>

@stop