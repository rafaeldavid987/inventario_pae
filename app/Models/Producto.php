<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'codigo',
        'nombre',
        'categoria_id',
        'unidad_medida',
        'marca',
        'presentacion',
        'stock_minimo',
        'estado',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}