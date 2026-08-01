<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Municipio extends Model
{
    protected $table = 'municipios';

    protected $fillable = [
        'departamento_id',
        'nombre',
    ];

    public function colegios(): HasMany
    {
        return $this->hasMany(Colegio::class);
    }
}