<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Colegio extends Model
{
    protected $table = 'colegios';

    protected $fillable = [
        'nombre',
        'nit',
        'dane',
        'direccion',
        'telefono',
        'email',
        'rector',
        'municipio_id',
        'estado',
    ];

    public function municipio(): BelongsTo
    {
        return $this->belongsTo(Municipio::class);
    }
}