<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Define a classe que tem as regras para validar um login
 * Autor: Afonso Vitório
 */
class LoginRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|string|max:255',
            'password' => 'required|string',
            'remember' => ''
        ];
    }
}