@extends('adminlte::page')

@section('title', 'Colegios')

@section('content_header')
    <h1>Colegios</h1>
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

        <a href="{{ route('colegios.create') }}" class="btn btn-primary">
            Nuevo Colegio
        </a>

        <form action="{{ route('colegios.index') }}" method="GET" class="d-flex">

            <input
                type="text"
                name="buscar"
                class="form-control me-2"
                placeholder="Buscar por nombre o DANE..."
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
                    <th>Nombre</th>
                    <th>Municipio</th>
                    <th>DANE</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

            @forelse($colegios as $colegio)

                <tr>
                    <td>{{ $colegio->id }}</td>
                    <td>{{ $colegio->nombre }}</td>
                    <td>{{ $colegio->municipio->nombre }}</td>
                    <td>{{ $colegio->dane }}</td>
                    <td>
                        {{ $colegio->estado ? 'Activo' : 'Inactivo' }}
                    </td>
                    <td>

                    <a href="{{ route('colegios.edit', $colegio) }}"
                        class="btn btn-warning btn-sm">
                        Editar
                    </a>

                    <form action="{{ route('colegios.destroy', $colegio) }}"
                        method="POST"
                        style="display:inline;">

                        @csrf
                        @method('DELETE')

                        @if($colegio->estado)

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Desea desactivar este colegio?')">

                                Desactivar

                            </button>

                        @else

                            <button
                                type="submit"
                                class="btn btn-success btn-sm"
                                onclick="return confirm('¿Desea activar este colegio?')">

                                Activar

                            </button>

                        @endif

                    </form>

                </td>
                </tr>

            @empty

                <tr>
                    <td colspan="6" class="text-center">
                        No hay colegios registrados.
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

        <div class="mt-3">
            {{ $colegios->links() }}
        </div>

    </div>

</div>

@stop