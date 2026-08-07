<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $fillable = [
        'codigo',
        'nombre',
        'colegio_id',
        'direccion',
        'telefono',
        'responsable',
        'estado',
    ];

    public function colegio()
    {
        return $this->belongsTo(Colegio::class);
    }
}