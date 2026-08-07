@extends('adminlte::page')

@section('title', 'Editar Sede')

@section('content_header')
    <h1>Editar Sede</h1>
@stop

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">

    <div class="card-body">

        <form action="{{ route('sedes.update', $sede) }}" method="POST">

    @csrf
    @method('PUT')

            <div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <label>Código</label>
            <input
                type="text"
                name="codigo"
                class="form-control"
                value="{{ old('codigo', $sede->codigo) }}"
                required>
        </div>
    </div>

    <div class="col-md-8">
        <div class="form-group">
            <label>Nombre</label>
            <input
                type="text"
                name="nombre"
                class="form-control"
                value="{{ old('nombre', $sede->nombre) }}"
                required>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-12">
        <div class="form-group">
            <label>Colegio</label>

            <select
                name="colegio_id"
                class="form-control"
                required>

                <option value="">Seleccione...</option>

                @foreach($colegios as $colegio)

                    <option
                        value="{{ $colegio->id }}"
                        {{ old('colegio_id') == $colegio->id ? 'selected' : '' }}>

                        {{ $colegio->nombre }}

                    </option>

                @endforeach

            </select>

        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Dirección</label>
            <input
                type="text"
                name="direccion"
                class="form-control"
                value="{{ old('direccion', $sede->direccion) }}"
                required>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>Teléfono</label>
            <input
                type="text"
                name="telefono"
                class="form-control"
                value="{{ old('telefono', $sede->telefono) }}">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>Responsable</label>
            <input
                type="text"
                name="responsable"
                class="form-control"
               value="{{ old('responsable', $sede->responsable) }}">
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-3">
        <div class="form-group">
            <label>Estado</label>

            <select name="estado" class="form-control">

                <option value="1" selected>Activo</option>
                <option value="0">Inactivo</option>

            </select>

        </div>
    </div>

</div>

<div class="mt-3">

    <button type="submit" class="btn btn-primary">
        Guardar
    </button>

    <a href="{{ route('sedes.index') }}" class="btn btn-secondary">
        Cancelar
    </a>

</div>

        </form>

    </div>

</div>

@stop