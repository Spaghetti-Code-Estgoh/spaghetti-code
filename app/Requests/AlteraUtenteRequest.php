<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Define a classe que tem as regras de guardar um registo
 * Autor: Afonso Vitório
 */
class AlteraUtenteRequest extends FormRequest
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
            'password' => 'required|string|min:8|confirmed',
            'nif' => 'required|size:9',
            'nss' => 'required|size:9',
            'dataNascimento' => 'required',
            'contacto' => 'required',
        ];
    }
}
