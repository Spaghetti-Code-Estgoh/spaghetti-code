<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\consulta;
use App\Models\medico;
use Illuminate\Support\Facades\DB;

class GereConsultaUtente extends Controller
{

    function marcarConsulta(Request $req){

        $idUser = $req->session()->get('id');

        try {

     $consulta = new consulta;
        $consulta->estado = "marcar";
        $consulta->DataHora = null;
        $consulta->DataHoraFim = null;
        $consulta->observacoesmedicas = null;
        $consulta->observacoesadmin = null;
        $consulta->medico_id = $req->medicoSelect;
        $consulta->funcionario_id = null;
        $consulta->utente_id = $idUser;
        $consulta->save();
        return redirect('/dashboardutente');

    }catch (Exception $e){
        echo '<script>console.log('.$e->getMessage().')</script>';
        return redirect('/ERROR_PAGE');
    }
    }

    public function index(){

        // Carrega a especialidade
        $especialidadeData['data'] = medico::orderby("especialidae","asc")
        			   ->select('especialidae')->distinct()
        			   ->get();

    	return view('/utentes/marcarconsulta')->with("especialidadeData",$especialidadeData);
    }

    // ir buscar os medicos de uma especialidade
    public function getMedicos($especialidade=""){

        $medicoData['data'] = medico::orderby("nome","asc")
        			->select('id','nome')
        			->where('especialidae',$especialidade)
        			->get();

        return response()->json($medicoData);

    }

    /*
             *author Diogo Pinto
             */
    function CancelarConsulta(){

        try {

            $id=\request('id');

            $consulta = DB::table('consulta')
                ->where('id','=',$id)
                ->get();

            if ($consulta) {
                $consulta2= DB::table('consulta')
                    ->where('id', $id)
                    ->update(['estado' =>'cancelada']);
            }
            //return view('/testet');

        }catch (Exception $e){
            echo '<script>console.log('.$e->getMessage().')</script>';
            return redirect('/ERROR_PAGE');
        }
    }

    /*
          *author Diogo Pinto
          */
    function GetConsultaCancelarUtente(){

        $ut=session('id');
        $consulta=DB::table('medicos')
            ->join('consulta','consulta.medico_id','=','medicos.id')
            ->where('estado','=','agendada')
            ->where('utente_id','=',$ut)
            ->get();

        echo json_encode($consulta);
        exit;
    }


}
