<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consulta extends Model
{
    use HasFactory;

    protected $table = 'consulta'; // Nome da Base de Dados
    public $timestamps = false;

}
