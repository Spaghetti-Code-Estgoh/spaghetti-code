<?php

namespace App\Http\Controllers;

use App\Mail\AprovedMail;
use App\Mail\ConcludedMail;
use App\Models\consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Acaronlex\LaravelCalendar\Calendar;
use Illuminate\Support\Facades\Mail;

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
            ->where('estado', '=', 'agendada')
            ->get();

        $iniciadas = DB::table('consulta')
            ->join('utentes', 'consulta.utente_id', '=', 'utentes.id' )
            ->join('medicos','medicos.id','=','consulta.medico_id')
            ->select('consulta.id', 'medicos.especialidae', 'utentes.nome', 'consulta.DataHora' )
            ->where('medico_id','=',$id_med)
            ->where('estado', '=', 'Comecar')
            ->get();


        return view('medicos/dashboard', ['consulta'=> $consultas, 'iniciadas'=> $iniciadas]);

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
            ->get();

        return view('medicos/terminarconsulta', ['cons'=> $cons]);
    }


    /**
     *  autor: Alexandre Lopes
     * Fabian Nunes
     */
    function terminarConsulta(Request $request, $id){

        $consulta = consulta::find($id);
        $consulta->estado = 'Terminada';
        $consulta->observacoesmedicas = $request->input('observacoes');
        $consulta->preco = $request->input('preco');
        $consulta->save();
        $pdf = (new PDFController)->printPDFEmail($id);

        $ut=session('id');
        $con=DB::table('utentes')
            ->join('consulta','consulta.utente_id','=','utentes.id')
            ->where('estado','=','terminada')
            ->where('medico_id','=',$ut)
            ->where('consulta.id', '=', $id)
            ->get();
        foreach ($con as $c) {
            Mail::to($c->email)->send(new ConcludedMail($pdf));
        }
        return redirect('/');
    }
    function remarcar(){

        try {
            $func=session('id');
            $id=\request('id');
            $obs=\request('obs');
            $time=\request('time');
            $date = strtotime($time) + 3600;

            $consulta = DB::table('consulta')
                ->where('id','=',$id)
                ->get();

            if ($consulta) {
                $consulta2= DB::table('consulta')
                    ->where('id', $id)
                    ->update(['estado' =>'agendada','observacoesadmin'=>$obs,'funcionario_id'=>$func,'DataHora'=>$time,"DataHoraFim"=>date("Y-m-d H:i:s", $date)]);
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
            if ($estado == 'agendada') {
                $pdf = (new PDFController)->printPDFPCEmail($id);
                $con=DB::table('utentes')
                    ->join('consulta','consulta.utente_id','=','utentes.id')
                    ->where('consulta.id', '=', $id)
                    ->get();

                foreach ($con as $c) {
                    Mail::to($c->email)->send(new AprovedMail($pdf));
                }
            }
        }
        return redirect('/GetConsulta');
    }

    function agendaMedicaEmpty(){
        $events = [];
        $calendar = new Calendar();
        $calendar->addEvents($events)
            ->setOptions([
                'locale' => 'pt',
                'firstDay' => 0,
                'displayEventTime' => true,
                'selectable' => true,
                'initialView' => 'timeGridWeek',
                'headerToolbar' => [
                    'end' => 'today prev,next dayGridMonth timeGridWeek timeGridDay'
                ],
                'startTime'=> '08:00', // 8am
                'endTime'=> '18:00', // 6pm
            ]);
        $calendar->setId('1');
        $calendar->setCallbacks([
            'select' => 'function(selectionInfo){}',
            'eventClick' => 'function(event){}'
        ]);

        return view('funcionarios.agendamedica',  ['calendar'=>$calendar]);

    }



    function agendaMedicaFunc(){
        $id=\request('nome');
        $consultas=DB::table('consulta')
            ->join('medicos','medicos.id','=','consulta.medico_id')
            ->select('consulta.id', 'medicos.especialidae', 'medicos.nome', 'consulta.DataHora','consulta.DataHoraFim' )
            ->where('estado', '=', 'Agendada')
            ->where('medicos.nome','like','%'.$id.'%')
            ->get();
        $events = [];
        foreach ($consultas as $c){
            $events[] = \Acaronlex\LaravelCalendar\Calendar::event(
                $c->nome."-".$c->especialidae, //event title
                false, //full day event?
                new \DateTime($c->DataHora), //start time (you can also use Carbon instead of DateTime)
                new \DateTime($c->DataHoraFim), //end time (you can also use Carbon instead of DateTime)
                'stringEventId' //optionally, you can specify an event ID
            );


        }


        $calendar = new Calendar();
        $calendar->addEvents($events)
            ->setOptions([
                'locale' => 'pt',
                'firstDay' => 0,
                'displayEventTime' => true,
                'selectable' => true,
                'initialView' => 'timeGridWeek',
                'headerToolbar' => [
                    'end' => 'today prev,next dayGridMonth timeGridWeek timeGridDay'
                ],
                'startTime'=> '08:00', // 8am
                'endTime'=> '18:00', // 6pm
            ]);
        $calendar->setId('1');
        $calendar->setCallbacks([
            'select' => 'function(selectionInfo){}',
            'eventClick' => 'function(event){}'
        ]);

        return view('funcionarios.agendamedica',  ['calendar'=>$calendar]);

    }

    function agendaMedica(){
        $id=session('id');
        $consultas=DB::table('consulta')
            ->join('medicos','medicos.id','=','consulta.medico_id')
            ->select('consulta.id', 'medicos.especialidae', 'medicos.nome', 'consulta.DataHora','consulta.DataHoraFim' )
            ->where('estado', '=', 'agendada')
            ->where('medicos.id','=',$id)
            ->get();
        $events = [];
        foreach ($consultas as $c){
            $events[] = \Acaronlex\LaravelCalendar\Calendar::event(
                $c->nome."-".$c->especialidae, //event title
                false, //full day event?
                new \DateTime($c->DataHora), //start time (you can also use Carbon instead of DateTime)
                new \DateTime($c->DataHoraFim), //end time (you can also use Carbon instead of DateTime)
                'stringEventId' //optionally, you can specify an event ID
            );


        }


        $calendar = new Calendar();
        $calendar->addEvents($events)
            ->setOptions([
                'locale' => 'pt',
                'firstDay' => 0,
                'displayEventTime' => true,
                'selectable' => true,
                'initialView' => 'timeGridWeek',
                'headerToolbar' => [
                    'end' => 'today prev,next dayGridMonth timeGridWeek timeGridDay'
                ],
                'startTime'=> '08:00', // 8am
                'endTime'=> '18:00', // 6pm
            ]);
        $calendar->setId('1');
        $calendar->setCallbacks([
            'select' => 'function(selectionInfo){}',
            'eventClick' => 'function(event){}'
        ]);

        return view('medicos.agenda',  ['calendar'=>$calendar]);

    }
}
