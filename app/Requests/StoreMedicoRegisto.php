<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Define a classe que tem as regras de guardar um registo de um funcionário
 * Autor: Afonso Vitório
 */
class StoreMedicoRegisto extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fotografia' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'nif' => 'required|size:9',
            'esp' => 'required|string|max:255',
            'ced' => 'required',
            'contacto' => 'required',
        ];
    }
}
