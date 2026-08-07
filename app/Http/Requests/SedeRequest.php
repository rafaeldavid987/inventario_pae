<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SedeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [

            'codigo' => [
                'required',
                'max:20',
                Rule::unique('sedes')->ignore($this->route('sede')),
            ],

            'nombre' => 'required|max:150',

            'colegio_id' => 'required|exists:colegios,id',

            'direccion' => 'required|max:200',

            'telefono' => 'nullable|max:30',

            'responsable' => 'nullable|max:150',

            'estado' => 'required|boolean',

        ];
    }
}