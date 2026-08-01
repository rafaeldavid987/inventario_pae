@extends('adminlte::page')

@section('title', 'Editar Colegio')

@section('content_header')
    <h1>Editar Colegio</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <form action="{{ route('colegios.update', $colegio) }}" method="POST">

            @csrf
            @method('PUT')

 <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $colegio->nombre) }}">
            </div>

            <div class="mb-3">
                <label>NIT</label>
                <input type="text" name="nit" class="form-control" value="{{ old('nit', $colegio->nit) }}">
            </div>

            <div class="mb-3">
                <label>DANE</label>
                <input type="text" name="dane" class="form-control" value="{{ old('dane', $colegio->dane) }}">
            </div>

            <div class="mb-3">
                <label>Dirección</label>
                <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $colegio->direccion) }}">
            </div>

            <div class="mb-3">
                <label>Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $colegio->telefono) }}">
            </div>

            <div class="mb-3">
                <label>Correo electrónico</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $colegio->email) }}">
            </div>

            <div class="mb-3">
                <label>Rector</label>
                <input type="text" name="rector" class="form-control" value="{{ old('rector', $colegio->rector) }}">
            </div>

            <div class="mb-3">
                <label>Municipio</label>

                <select name="municipio_id" class="form-control">

                    <option value="">Seleccione...</option>

                    @foreach($municipios as $municipio)

                       <option value="{{ $municipio->id }}"
                             {{ old('municipio_id', $colegio->municipio_id) == $municipio->id ? 'selected' : '' }}>
                            {{ $municipio->nombre }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">
                    <label>Estado</label>

                    <select name="estado" class="form-control">

                    <option value="1" {{ old('estado', $colegio->estado) == 1 ? 'selected' : '' }}>
                        Activo
                    </option>

                    <option value="0" {{ old('estado', $colegio->estado) == 0 ? 'selected' : '' }}>
                        Inactivo
                    </option>

                    </select>

                    </div>

            <button type="submit" class="btn btn-primary">
                Guardar
            </button>

            <a href="{{ route('colegios.index') }}" class="btn btn-secondary">
                Cancelar
            </a>



        </form>

    </div>

</div>

@stop