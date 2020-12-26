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
     * retorno:
     * rederecionamento de pagina
     */
    function terminarConsulta(){

        try {

            $id=\request('id');
            $observacoesMedicas=\request('observaçoes');
            inserirObservacaoConsulta($id,$observacoesMedicas);
            DB::table('consulta')
                ->where('id',$id)
                ->update(['estado'=>'terminar']);
            return redirect();

        }catch (Exception $e){
            echo '<script>console.log('.$e->getMessage().')</script>';
            return redirect('/ERROR_PAGE');
        }
    }


    /*
    * autor:Diogo pinto
    * Descricao:
    * metodo para enserir observações
    * Parametros de entrada:
    * id: consiste no id da consulta
    *obs: observações da consulta
    * retorno:
    * metodo terminarConsulta
    */
    function inserirObservacaoConsulta($id,$obs){
        try {


            DB::table('consulta')
                ->where('id', $id)
                ->update(['observacoesMedicas' => $obs]);

        }catch (Exception $e){
            echo '<script>console.log('.$e->getMessage().')</script>';
            return redirect('/ERROR_PAGE');
        }
    }


    /*
 * autor:Diogo pinto
 * Descricao:
 * metodo usado para terminar consulta
 * Parametros de entrada:
 * id: consiste no id da consulta
 * retorno:
 * rederecionamento de pagina
 */
    function CancelarConsulta(){

        try {

            $id=\request('id');
           $observacoesMedicas=\request('observaçoes');
            inserirObservacaoAdmin($id,$observacoesMedicas);
            DB::table('consulta')
                ->where('id',$id)
                ->update(['estado'=>'cancelada']);
            return redirect();

        }catch (Exception $e){
            echo '<script>console.log('.$e->getMessage().')</script>';
            return redirect('/ERROR_PAGE');
        }
    }


    /*
    * autor:Diogo pinto
    * Descricao:
    * metodo para enserir observações administrativas
    * Parametros de entrada:
    * id: consiste no id da consulta
    *obs: observações da consulta
    * retorno:
    * metodo CancelarConsulta
    */
    function inserirObservacaoAdmin($id,$obs){
        try {


            DB::table('consulta')
                ->where('id', $id)
                ->update(['ObservacaoAdmin' => $obs]);

        }catch (Exception $e){
            echo '<script>console.log('.$e->getMessage().')</script>';
            return redirect('/ERROR_PAGE');
        }
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
function AprovarConsulta(){
    try{
    $id=\request('id');
    $idFuncinario=\request('idFuncionario');

    $update=[['funcionario_id'=>$idFuncinario],['estado'=>'agendada']];

        DB::table('consulta')
            ->where('id',$id)
            ->update($update);

        return redirect();
}catch (Exception $e){
    echo '<script>console.log('.$e->getMessage().')</script>';
    return redirect('/ERROR_PAGE');
}
}
