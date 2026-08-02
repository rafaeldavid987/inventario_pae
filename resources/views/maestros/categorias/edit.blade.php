@extends('adminlte::page')

@section('title', 'Editar Categoría')

@section('content_header')
    <h1>Editar Categoría</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <form action="{{ route('categorias.update', $categoria) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text"
                       name="nombre"
                       class="form-control"
                       value="{{ old('nombre', $categoria->nombre) }}">
            </div>

            <div class="mb-3">
                <label>Descripción</label>

                <textarea
                    name="descripcion"
                    class="form-control"
                    rows="3">{{ old('descripcion', $categoria->descripcion) }}</textarea>

            </div>

            <div class="mb-3">

                <label>Estado</label>

                <select name="estado" class="form-control">

                    <option value="1"
                        {{ old('estado', $categoria->estado) == 1 ? 'selected' : '' }}>
                        Activo
                    </option>

                    <option value="0"
                        {{ old('estado', $categoria->estado) == 0 ? 'selected' : '' }}>
                        Inactivo
                    </option>

                </select>

            </div>

            <button type="submit" class="btn btn-primary">
                Guardar cambios
            </button>

            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>

</div>

@stop