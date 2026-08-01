@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sistema de Inventario PAE</h1>
@stop

@section('content')

<div class="row">

    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>0</h3>
                <p>Colegios</p>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>0</h3>
                <p>Sedes</p>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>0</h3>
                <p>Productos</p>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>0</h3>
                <p>Despachos</p>
            </div>
        </div>
    </div>

</div>

@stop