@extends('adminlte::page')

@section('title', 'Registrar Producto')

@section('content_header')
    <h1>Registrar Producto</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('productos.store') }}" method="POST">
            @csrf

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="codigo">Código</label>
                        <input type="text"
                               name="codigo"
                               id="codigo"
                               class="form-control"
                               value="{{ old('codigo') }}"
                               maxlength="30"
                               required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">Nombre del producto</label>
                        <input type="text"
                               name="nombre"
                               id="nombre"
                               class="form-control"
                               value="{{ old('nombre') }}"
                               maxlength="200"
                               required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="categoria_id">Categoría</label>
                        <select name="categoria_id"
                                id="categoria_id"
                                class="form-control"
                                required>
                            <option value="">Seleccione una categoría</option>

                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}"
                                    {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="unidad_medida">Unidad de medida</label>
                        <input type="text"
                               name="unidad_medida"
                               id="unidad_medida"
                               class="form-control"
                               value="{{ old('unidad_medida') }}"
                               maxlength="50"
                               placeholder="Ej: Kilogramo, Litro, Unidad"
                               required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="marca">Marca</label>
                        <input type="text"
                               name="marca"
                               id="marca"
                               class="form-control"
                               value="{{ old('marca') }}"
                               maxlength="100">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="presentacion">Presentación</label>
                        <input type="text"
                               name="presentacion"
                               id="presentacion"
                               class="form-control"
                               value="{{ old('presentacion') }}"
                               maxlength="100"
                               placeholder="Ej: Bolsa 500 g">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="stock_minimo">Stock mínimo</label>
                        <input type="number"
                               name="stock_minimo"
                               id="stock_minimo"
                               class="form-control"
                               value="{{ old('stock_minimo', 0) }}"
                               min="0"
                               required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado" class="form-control">
                            <option value="1" {{ old('estado', '1') == '1' ? 'selected' : '' }}>
                                Activo
                            </option>
                            <option value="0" {{ old('estado') == '0' ? 'selected' : '' }}>
                                Inactivo
                            </option>
                        </select>
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Guardar Producto
            </button>

            <a href="{{ route('productos.index') }}" class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>
</div>

@stop