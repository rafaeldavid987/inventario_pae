<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ColegioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre'        => 'required|max:200',
            'nit'           => 'nullable|max:30',
            'dane' => [
            'required',
            'max:20',
            Rule::unique('colegios', 'dane')->ignore($this->route('colegio')),
            ],
            'direccion'     => 'required|max:255',
            'telefono'      => 'nullable|max:30',
            'email'         => 'nullable|email|max:150',
            'rector'        => 'nullable|max:150',
            'municipio_id'  => 'required|exists:municipios,id',
            'estado'        => 'required|boolean',
        ];
    }
}