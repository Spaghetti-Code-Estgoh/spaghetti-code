<?php

namespace App\Http\Controllers;

use App\Models\consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GereConsultaProfissional extends Controller
{


    /*
     * autor:Diogo pinto
     * Descricao:
     * metodo usado para terminar consulta
     * Parametros de entrada:
     * id: consiste no id da consulta
     * observações :variavel que contem as observacoes do medico
     * retorno:
     * rederecionamento de pagina
     */
    function terminarConsulta(){

        try {

            $id=\request('id');
            $observacoesMedicas=\request('observaçoes');
            $consulta = consulta::find($id);

            if ($consulta) {
                $consulta->estado = 'terminar';
                $consulta->observacoesMedicas= $observacoesMedicas;
                $consulta->save();
            }
            return view('/teste');

        }catch (Exception $e){
            echo '<script>console.log('.$e->getMessage().')</script>';
            return redirect('/ERROR_PAGE');
        }
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

            $id=\request('idC');
            $observacoesAdmin=\request('observaçoesAdmin');
            $consulta = consulta::find($id);

            if ($consulta) {
                $consulta->estado = 'cancelado';
                $consulta->observacoesAdmin= $observacoesAdmin;
                $consulta->save();
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

            $consulta = DB::table('medicos')
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
