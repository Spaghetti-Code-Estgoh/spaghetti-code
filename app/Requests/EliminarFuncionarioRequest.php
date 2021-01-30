<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Define a classe que tem as regras para validar os campos de eliminar um funcionário
 * Autor: Afonso Vitório
 */
class EliminarFuncionarioRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|string|max:255',
            'worker' => 'required',
            'gridCheck' => 'required'
        ];
    }
}