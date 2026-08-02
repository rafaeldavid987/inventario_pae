@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Productos</h1>
@stop

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">

    <div class="card-header">

        <a href="{{ route('productos.create') }}" class="btn btn-primary">
            Nuevo Producto
        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>

            <tr>

                <th>Código</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Unidad</th>
                <th>Stock mínimo</th>
                <th>Estado</th>
                <th>Acciones</th>

            </tr>

            </thead>

            <tbody>

            @forelse($productos as $producto)

                <tr>

                    <td>{{ $producto->codigo }}</td>

                    <td>{{ $producto->nombre }}</td>

                    <td>{{ $producto->categoria->nombre }}</td>

                    <td>{{ $producto->unidad_medida }}</td>

                    <td>{{ $producto->stock_minimo }}</td>

                    <td>
                        {{ $producto->estado ? 'Activo' : 'Inactivo' }}
                    </td>

                    <td>

    <a href="{{ route('productos.edit', $producto) }}"
       class="btn btn-warning btn-sm">
        Editar
    </a>

    <form action="{{ route('productos.destroy', $producto) }}"
          method="POST"
          style="display:inline;">

        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="btn btn-danger btn-sm"
            onclick="return confirm('¿Desea desactivar este producto?')">

            Desactivar

        </button>

    </form>

</td>

                </tr>

            @empty

                <tr>

                    <td colspan="7" class="text-center">

                        No existen productos registrados.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        <div class="mt-3">

            {{ $productos->links() }}

        </div>

    </div>

</div>

@stop