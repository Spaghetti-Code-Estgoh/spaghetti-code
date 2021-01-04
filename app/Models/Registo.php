<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Define a classe registo
 * Autor: Afonso Vitório
 */
class Registo extends Model
{
    use HasFactory;
    protected $table = 'utentes_n_aprovados'; // Nome da Base de Dados

    protected $fillable = ['nome', 'email', 'password', 'nif', 'nss', 'genero', 'morada', 'dataNascimento', 'imagePath', 'contacto', 'tokenConfirm'];
}
