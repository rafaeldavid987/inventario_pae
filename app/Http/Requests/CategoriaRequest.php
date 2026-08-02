<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoriaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $categoria = $this->route('categoria');

        return [

            'nombre' => [
                'required',
                'max:100',
                Rule::unique('categorias', 'nombre')->ignore($categoria),
            ],

            'descripcion' => 'nullable|max:255',

            'estado' => 'required|boolean',

        ];
    }
}