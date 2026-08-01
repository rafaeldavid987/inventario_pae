@extends('adminlte::page')

@section('title', 'Nuevo Colegio')

@section('content_header')
    <h1>Registrar Colegio</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <form action="{{ route('colegios.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control">
            </div>

            <div class="mb-3">
                <label>DANE</label>
                <input type="text" name="dane" class="form-control">
            </div>

            <div class="mb-3">
                <label>Municipio</label>

                <select name="municipio_id" class="form-control">

                    <option value="">Seleccione...</option>

                    @foreach($municipios as $municipio)

                        <option value="{{ $municipio->id }}">
                            {{ $municipio->nombre }}
                        </option>

                    @endforeach

                </select>

            </div>

            <button class="btn btn-primary">
                Guardar
            </button>

        </form>

    </div>

</div>

@stop