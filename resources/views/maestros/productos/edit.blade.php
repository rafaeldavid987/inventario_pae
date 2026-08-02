@extends('adminlte::page')

@section('title', 'Editar Producto')

@section('content_header')
    <h1>Editar Producto</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <form action="{{ route('productos.update', $producto) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Código</label>
                <input type="text"
                       name="codigo"
                       class="form-control"
                       value="{{ old('codigo', $producto->codigo) }}">
            </div>

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text"
                       name="nombre"
                       class="form-control"
                       value="{{ old('nombre', $producto->nombre) }}">
            </div>

            <div class="mb-3">
                <label>Categoría</label>

                <select name="categoria_id" class="form-control">

                    @foreach($categorias as $categoria)

                        <option value="{{ $categoria->id }}"
                            {{ old('categoria_id', $producto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">
                <label>Unidad de medida</label>
                <input type="text"
                       name="unidad_medida"
                       class="form-control"
                       value="{{ old('unidad_medida', $producto->unidad_medida) }}">
            </div>

            <div class="mb-3">
                <label>Marca</label>
                <input type="text"
                       name="marca"
                       class="form-control"
                       value="{{ old('marca', $producto->marca) }}">
            </div>

            <div class="mb-3">
                <label>Presentación</label>
                <input type="text"
                       name="presentacion"
                       class="form-control"
                       value="{{ old('presentacion', $producto->presentacion) }}">
            </div>

            <div class="mb-3">
                <label>Stock mínimo</label>
                <input type="number"
                       name="stock_minimo"
                       class="form-control"
                       value="{{ old('stock_minimo', $producto->stock_minimo) }}">
            </div>

            <div class="mb-3">
                <label>Estado</label>

                <select name="estado" class="form-control">

                    <option value="1"
                        {{ old('estado', $producto->estado) == 1 ? 'selected' : '' }}>
                        Activo
                    </option>

                    <option value="0"
                        {{ old('estado', $producto->estado) == 0 ? 'selected' : '' }}>
                        Inactivo
                    </option>

                </select>

            </div>

            <button type="submit" class="btn btn-primary">
                Guardar cambios
            </button>

            <a href="{{ route('productos.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>

</div>

@stop