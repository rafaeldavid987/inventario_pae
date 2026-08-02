@extends('adminlte::page')

@section('title', 'Nuevo Producto')

@section('content_header')
    <h1>Nuevo Producto</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <form action="{{ route('productos.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Código</label>
                <input type="text" name="codigo" class="form-control" value="{{ old('codigo') }}">
            </div>

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
            </div>

            <div class="mb-3">
                <label>Categoría</label>

                <select name="categoria_id" class="form-control">

                    <option value="">Seleccione...</option>

                    @foreach($categorias as $categoria)

                        <option value="{{ $categoria->id }}"
                            {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">
                <label>Unidad de medida</label>
                <input type="text" name="unidad_medida" class="form-control" value="{{ old('unidad_medida') }}">
            </div>

            <div class="mb-3">
                <label>Marca</label>
                <input type="text" name="marca" class="form-control" value="{{ old('marca') }}">
            </div>

            <div class="mb-3">
                <label>Presentación</label>
                <input type="text" name="presentacion" class="form-control" value="{{ old('presentacion') }}">
            </div>

            <div class="mb-3">
                <label>Stock mínimo</label>
                <input type="number" name="stock_minimo" class="form-control" value="{{ old('stock_minimo', 0) }}">
            </div>

            <div class="mb-3">

                <label>Estado</label>

                <select name="estado" class="form-control">

                    <option value="1" {{ old('estado', 1) == 1 ? 'selected' : '' }}>
                        Activo
                    </option>

                    <option value="0" {{ old('estado') == 0 ? 'selected' : '' }}>
                        Inactivo
                    </option>

                </select>

            </div>

            <button type="submit" class="btn btn-primary">
                Guardar
            </button>

            <a href="{{ route('productos.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>

</div>

@stop