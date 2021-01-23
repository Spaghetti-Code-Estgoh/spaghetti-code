<?php

namespace App\Http\Controllers;

use App\Models\consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GereConsultaProfissional extends Controller
{

    /**
     * autor: Alexandre Lopes
     * metodo usado para apresentar a lista de consultas
     * de um determinado médico
     */
    function listarConsultasMedicos (){

        $id_med=session('id');

        $consultas=DB::table('consulta')
        ->join('utentes', 'consulta.utente_id', '=', 'utentes.id' )
        ->join('medicos','medicos.id','=','consulta.medico_id')
        ->select('consulta.id', 'medicos.especialidae', 'utentes.nome', 'consulta.DataHora' )
        ->where('medico_id','=',$id_med)
        ->where('DataHora', '>', now())
        ->where('estado', '=', 'Agendada')
        ->get();

        return view('medicos/dashboard', ['consulta'=> $consultas]);

    }

  /**
   *  autor: Alexandre Lopes
   */
    function comecarConsulta ($idConsulta){

        $id_med=session('id');

         DB::table('consulta')
        ->where('id', '=', $idConsulta)
        ->update(['estado' => 'Comecar']);

        $cons=DB::table('consulta')
        ->join('utentes', 'consulta.utente_id', '=', 'utentes.id' )
        ->join('medicos','medicos.id','=','consulta.medico_id')
        ->select('consulta.id', 'medicos.especialidae', 'utentes.nome', 'consulta.DataHora' )
        ->where('medico_id','=',$id_med)
            ->where('consulta.id', '=', $idConsulta)
        ->where('DataHora', '>', now())
        ->get();

        return view('medicos/terminarconsulta', ['cons'=> $cons]);
    }


    /**
     *  autor: Alexandre Lopes
     */
    function terminarConsulta(Request $request, $id){

        $consulta = consulta::find($id);
        $consulta->estado = 'Terminada';
        $consulta->observacoesmedicas = $request->input('observacoes');
        $consulta->preco = $request->input('preco');
        $consulta->save();
        return redirect('/');
    }



    /*
     *author Diogo Pinto
     */
function GetConsultaAgendada(){


        $consulta=DB::table('medicos')
            ->join('consulta','consulta.medico_id','=','medicos.id')
            ->where('estado','=','marcar')
            ->get();

echo json_encode($consulta);
exit;
}

    /*
       *author Diogo Pinto
       */
    function GetConsultaCancelar(){


        $consulta=DB::table('medicos')
            ->join('consulta','consulta.medico_id','=','medicos.id')
            ->where('estado','=','agendada')
            ->get();

        echo json_encode($consulta);
        exit;
    }
    /*
 * autor:Diogo pinto
 * Descricao:
 * metodo usado para cancelar consulta
 * Parametros de entrada:
 * id: consiste no id da consulta
 * observaçõesAdmin :variavel que contem as observacoes do funcionario que cancelou a consulta
 * retorno:
 * rederecionamento de pagina
 */
    function CancelarConsulta(){

        try {
            $func=session('id');
            $id=\request('id');
            $observacoesAdmin=\request('observacoesAdmin');
            $consulta = DB::table('consulta')
                ->where('id','=',$id)
                ->get();

            if ($consulta) {
                $consulta2= DB::table('consulta')
                    ->where('id', $id)
                    ->update(['estado' =>'cancelada','observacoesadmin'=>$observacoesAdmin,'funcionario_id'=>$func]);
            }
            //return view('/testet');

        }catch (Exception $e){
            echo '<script>console.log('.$e->getMessage().')</script>';
            return redirect('/ERROR_PAGE');
        }
    }


    /*
        * autor:Diogo pinto
        * Descricao:
        * metodo para aprovar a consulta
        * Parametros de entrada:
        * id: consiste no id da consulta
        * idFuncionario: consiste id do funcionario
        * retorno:
        * redereciomento de pagina
        */
    function ChgangeConsulta()
    {

            $id = \request('id');
            $estado=\request('estado');

            $consulta = DB::table('consulta')
                ->where('id','=',$id)
                ->get();
            if ($consulta) {
                $consulta2= DB::table('consulta')
                    ->where('id', $id)
                    ->update(['estado' =>$estado]);
            }
            return redirect('/GetConsulta');

    }
}
