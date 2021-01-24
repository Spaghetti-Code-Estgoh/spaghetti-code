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
                $valor = $con->preco;
                $valorI = $valor * 0.23;
                $valorSI = $valor - $valorI;

                $dataC = explode(" ", $con->DataHora);

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
                    'data' => $dataC[0],
                    'hora' => $dataC[1],
                    'obs' => $obs,
                    'valorT' => $valor.'$',
                    'valorI' => $valorI.'$',
                    'valorSI' => $valorSI.'$'
                ];
            }
        }
        $pdf = PDF::loadView('pdf.pdfView', $data);
        return $pdf->download('consulta.pdf');
    }

    public function printPDFPC($id)
    {
        $ut=session('id');
        $consultaHistorico=DB::table('medicos')
            ->join('consulta','consulta.medico_id','=','medicos.id')
            ->where('estado','=','agendada')
            ->where('utente_id','=',$ut)
            ->where('consulta.id', '=', $id)
            ->get();

        $utent = DB::table('utentes')->where('id', '=', $ut)->get(['nome', 'email', 'morada']);

        foreach ($consultaHistorico as $con) {
            foreach ($utent as $ut) {

                $dataC = explode(" ", $con->DataHora);


                // This  $data array will be passed to our PDF blade
                $data = [
                    'utente' => $ut->nome,
                    'email' => $ut->email,
                    'morada' => $ut->morada,
                    'tipoC' => $con->especialidae,
                    'medico' => $con->nome,
                    'data' => $dataC[0],
                    'hora' => $dataC[1],
                ];
            }
        }
        $pdf = PDF::loadView('pdf.pdfPCView', $data);
        return $pdf->download('consulta.pdf');
    }

    public function printPDFEmail($id)
    {
        $ut=session('id');
        $consultaHistorico=DB::table('utentes')
            ->join('consulta','consulta.utente_id','=','utentes.id')
            ->where('estado','=','terminada')
            ->where('medico_id','=',$ut)
            ->where('consulta.id', '=', $id)
            ->get();

        $utent = DB::table('medicos')->where('id', '=', $ut)->get(['nome', 'especialidae']);

        foreach ($consultaHistorico as $con) {
            foreach ($utent as $ut) {
                $valor = $con->preco;
                $valorI = $valor * 0.23;
                $valorSI = $valor - $valorI;

                $dataC = explode(" ", $con->DataHora);

                if ($con->observacoesmedicas == null) {
                    $obs = 'Nada a registar';
                } else {
                    $obs = $con->observacoesmedicas;
                }

                // This  $data array will be passed to our PDF blade
                $data = [
                    'utente' => $con->nome,
                    'email' => $con->email,
                    'morada' => $con->morada,
                    'tipoC' => $ut->especialidae,
                    'medico' => $ut->nome,
                    'data' => $dataC[0],
                    'hora' => $dataC[1],
                    'obs' => $obs,
                    'valorT' => $valor.'$',
                    'valorI' => $valorI.'$',
                    'valorSI' => $valorSI.'$'
                ];
            }
        }
        return PDF::loadView('pdf.pdfView', $data);
    }

    public function printPDFPCEmail($id)
    {
        $consultaHistorico=DB::table('utentes')
            ->join('consulta','consulta.utente_id','=','utentes.id')
            ->where('consulta.id', '=', $id)
            ->get();

        foreach ($consultaHistorico as $con) {

            $med = DB::table('medicos')->where('id', '=', $con->medico_id)->get(['nome', 'especialidae']);

                foreach ($med as $md) {
                    $dataC = explode(" ", $con->DataHora);

                    // This  $data array will be passed to our PDF blade
                    $data = [
                        'utente' => $con->nome,
                        'email' => $con->email,
                        'morada' => $con->morada,
                        'tipoC' => $md->especialidae,
                        'medico' => $md->nome,
                        'data' => $dataC[0],
                        'hora' => $dataC[1],
                    ];
            }
        }
        return PDF::loadView('pdf.pdfPCView', $data);
    }
}
