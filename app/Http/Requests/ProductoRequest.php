<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $producto = $this->route('producto');

        return [

            'codigo' => [
                'required',
                'max:30',
                Rule::unique('productos', 'codigo')->ignore($producto),
            ],

            'nombre' => 'required|max:200',

            'categoria_id' => 'required|exists:categorias,id',

            'unidad_medida' => 'required|max:50',

            'marca' => 'nullable|max:100',

            'presentacion' => 'nullable|max:100',

            'stock_minimo' => 'required|integer|min:0',

            'estado' => 'required|boolean',

        ];
    }
}