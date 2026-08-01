<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColegioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reglas de validación.
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:200',
            'nit' => 'nullable|string|max:30',
            'dane' => 'required|string|max:20|unique:colegios,dane',
            'direccion' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:150',
            'rector' => 'nullable|string|max:150',
            'municipio_id' => 'required|exists:municipios,id',
            'estado' => 'required|boolean',
        ];
    }
}