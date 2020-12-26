<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\medico;
use Illuminate\Support\Facades\DB;

class ContaProfissionaisController extends Controller
{
    //
    function listMedicos()
    {
      $medicos = medico::all();
      return view('medicMenu', ['medico'=>$medicos]); //ALTERAR VIEW!!|
    }

}
