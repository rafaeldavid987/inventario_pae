@extends('adminlte::page')

@section('title', 'Nueva Categoría')

@section('content_header')
    <h1>Registrar Categoría</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <form action="{{ route('categorias.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Nombre</label>
                <input
                    type="text"
                    name="nombre"
                    class="form-control"
                    value="{{ old('nombre') }}">
            </div>

            <div class="mb-3">
                <label>Descripción</label>

                <textarea
                    name="descripcion"
                    class="form-control"
                    rows="3">{{ old('descripcion') }}</textarea>

            </div>

            <div class="mb-3">

                <label>Estado</label>

                <select name="estado" class="form-control">

                    <option value="1"
                        {{ old('estado',1)==1 ? 'selected':'' }}>
                        Activo
                    </option>

                    <option value="0"
                        {{ old('estado')==0 ? 'selected':'' }}>
                        Inactivo
                    </option>

                </select>

            </div>

            <button
                type="submit"
                class="btn btn-primary">

                Guardar

            </button>

            <a
                href="{{ route('categorias.index') }}"
                class="btn btn-secondary">

                Cancelar

            </a>

        </form>

    </div>

</div>

@stop