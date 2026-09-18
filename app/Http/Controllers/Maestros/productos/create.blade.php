@extends('adminlte::page')

@section('title', 'Registrar Producto')

@section('content_header')
    <h1>Registrar Producto</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Nuevo producto</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('productos.store') }}" method="POST">
            @csrf

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Código</label>
                        <input type="text"
                               name="codigo"
                               class="form-control"
                               value="{{ old('codigo') }}"
                               maxlength="30"
                               required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nombre del producto</label>
                        <input type="text"
                               name="nombre"
                               class="form-control"
                               value="{{ old('nombre') }}"
                               maxlength="200"
                               required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Categoría</label>
                        <select name="categoria_id" class="form-control" required>
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
                        <label>Unidad de medida</label>
                        <input type="text"
                               name="unidad_medida"
                               class="form-control"
                               value="{{ old('unidad_medida') }}"
                               maxlength="50"
                               placeholder="Ej: Kilogramo, Litro, Unidad"
                               required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Marca</label>
                        <input type="text"
                               name="marca"
                               class="form-control"
                               value="{{ old('marca') }}"
                               maxlength="100">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Presentación</label>
                        <input type="text"
                               name="presentacion"
                               class="form-control"
                               value="{{ old('presentacion') }}"
                               maxlength="100"
                               placeholder="Ej: Bolsa 500 g">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Stock mínimo</label>
                        <input type="number"
                               name="stock_minimo"
                               class="form-control"
                               value="{{ old('stock_minimo', 0) }}"
                               min="0"
                               required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Estado</label>
                        <select name="estado" class="form-control" required>
                            <option value="1" {{ old('estado', '1') == '1' ? 'selected' : '' }}>
                                Activo
                            </option>
                            <option value="0" {{ old('estado') === '0' ? 'selected' : '' }}>
                                Inactivo
                            </option>
                        </select>
                    </div>
                </div>

            </div>

            <hr>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                Guardar producto
            </button>

            <a href="{{ route('productos.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i>
                Cancelar
            </a>

        </form>

    </div>
</div>

@stop