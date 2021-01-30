<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Define a classe que tem as regras de guardar um registo
 * Autor: Afonso Vitório
 */
class AlteraMedicoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'contacto' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'esp' => 'required|string',
            'ced' => 'required',
            'nif' => 'required|size:9',
            'fotografia' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
}
