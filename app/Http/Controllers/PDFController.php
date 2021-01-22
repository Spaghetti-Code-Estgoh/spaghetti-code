<?php

// Our Controller
namespace App\Http\Controllers;

use Illuminate\Http\Request;

// This is important to add here.
use Illuminate\Support\Facades\DB;
use PDF;

class PDFController extends Controller
{
    public function printPDF($id)
    {
        $ut=session('id');
        $consultaHistorico=DB::table('medicos')
            ->join('consulta','consulta.medico_id','=','medicos.id')
            ->where('estado','=','terminada')
            ->where('utente_id','=',$ut)
            ->where('consulta.id', '=', $id)
            ->get();

        $utent = DB::table('utentes')->where('id', '=', $ut)->get(['nome', 'email', 'morada']);

        foreach ($consultaHistorico as $con) {
            foreach ($utent as $ut) {
                $valor = 50;
                $valorI = $valor * 0.23;
                $valorSI = $valor - $valorI;

                $data = explode(" ", $con->DataHora);

                if ($con->observacoesmedicas == null) {
                    $obs = 'Nada a registar';
                } else {
                    $obs = $con->observacoesmedicas;
                }

                // This  $data array will be passed to our PDF blade
                $data = [
                    'utente' => $ut->nome,
                    'email' => $ut->email,
                    'morada' => $ut->morada,
                    'tipoC' => $con->especialidae,
                    'medico' => $con->nome,
                    'data' => $data[0],
                    'hora' => $data[1],
                    'obs' => $obs,
                    'valorT' => $valor.'$',
                    'valorI' => $valorI.'$',
                    'valorSI' => $valorSI.'$'
                ];
            }
        }
        $pdf = PDF::loadView('pdfView', $data);
        return $pdf->download('consulta.pdf');
    }
}
