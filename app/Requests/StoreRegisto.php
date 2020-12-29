<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Define a classe que tem as regras de guardar um registo
 * Autor: Afonso Vitório
 */
class StoreRegisto extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    //TODO: Define more rules (?)
    //TODO: Fotografia can be nullable, or must be an image
    public function rules()
    {
        return [
            'fotografia' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'nif' => 'required|size:9',
            'nss' => 'required|size:9',
            'genero' => 'required|in:masculino,feminino,outro',
            'morada' => 'required',
            'dataNascimento' => 'required',
            'contacto' => 'required'
        ];
    }
}