@extends('adminlte::page')

@section('title', 'Colegios')

@section('content_header')
    <h1>Colegios</h1>
@stop

@section('content')

<div class="card">

    <div class="card-header">
        <a href="{{ route('colegios.create') }}" class="btn btn-primary">
            Nuevo Colegio
        </a>
    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>DANE</th>
                    <th>Estado</th>
                </tr>
            </thead>

            <tbody>

            @forelse($colegios as $colegio)

                <tr>
                    <td>{{ $colegio->id }}</td>
                    <td>{{ $colegio->nombre }}</td>
                    <td>{{ $colegio->dane }}</td>
                    <td>
                        {{ $colegio->estado ? 'Activo' : 'Inactivo' }}
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="4" class="text-center">
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