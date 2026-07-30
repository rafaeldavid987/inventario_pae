<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colegio extends Model
{
    protected $fillable = [
        'codigo',
        'dane',
        'nombre',
        'municipio',
        'direccion',
        'responsable',
        'telefono',
        'numero_estudiantes',
        'estado',
    ];
}