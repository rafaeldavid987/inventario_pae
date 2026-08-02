@extends('adminlte::page')

@section('title', 'Categorías')

@section('content_header')
    <h1>Categorías</h1>
@stop

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">

    <div class="card-header">

        <a href="{{ route('categorias.create') }}" class="btn btn-primary">
            Nueva Categoría
        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

            @forelse($categorias as $categoria)

                <tr>

                    <td>{{ $categoria->id }}</td>

                    <td>{{ $categoria->nombre }}</td>

                    <td>{{ $categoria->descripcion }}</td>

                    <td>
                        {{ $categoria->estado ? 'Activo' : 'Inactivo' }}
                    </td>

                    <td>

    <a href="{{ route('categorias.edit', $categoria) }}"
       class="btn btn-warning btn-sm">
        Editar
    </a>

    <form action="{{ route('categorias.destroy', $categoria) }}"
          method="POST"
          style="display:inline;">

        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="btn btn-danger btn-sm"
            onclick="return confirm('¿Desea desactivar esta categoría?')">

            Desactivar

        </button>

    </form>

</td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center">
                        No hay categorías registradas.
                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        <div class="mt-3">
            {{ $categorias->links() }}
        </div>

    </div>

</div>

@stop