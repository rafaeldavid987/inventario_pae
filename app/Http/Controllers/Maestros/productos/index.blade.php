@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Productos</h1>

        <a href="{{ route('productos.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nuevo producto
        </a>
    </div>
@stop

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Listado de productos</h3>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered table-hover">

                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Producto</th>
                        <th>Categoría</th>
                        <th>Unidad</th>
                        <th>Marca</th>
                        <th>Presentación</th>
                        <th>Stock mínimo</th>
                        <th>Estado</th>
                        <th width="150">Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($productos as $producto)

                        <tr>
                            <td>{{ $producto->codigo }}</td>

                            <td>{{ $producto->nombre }}</td>

                            <td>
                                {{ $producto->categoria->nombre ?? 'Sin categoría' }}
                            </td>

                            <td>{{ $producto->unidad_medida }}</td>

                            <td>{{ $producto->marca ?? '—' }}</td>

                            <td>{{ $producto->presentacion ?? '—' }}</td>

                            <td>{{ $producto->stock_minimo }}</td>

                            <td>
                                @if($producto->estado)
                                    <span class="badge badge-success">
                                        Activo
                                    </span>
                                @else
                                    <span class="badge badge-danger">
                                        Inactivo
                                    </span>
                                @endif
                            </td>

                            <td>

                                <a href="{{ route('productos.edit', $producto->id) }}"
                                   class="btn btn-sm btn-warning"
                                   title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('productos.destroy', $producto->id) }}"
                                      method="POST"
                                      style="display:inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            title="Activar / Desactivar"
                                            onclick="return confirm('¿Desea cambiar el estado de este producto?')">

                                        @if($producto->estado)
                                            <i class="fas fa-toggle-off"></i>
                                        @else
                                            <i class="fas fa-toggle-on"></i>
                                        @endif

                                    </button>

                                </form>

                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="9" class="text-center">
                                No hay productos registrados.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>
        </div>

        <div class="mt-3">
            {{ $productos->links() }}
        </div>

    </div>
</div>

@stop