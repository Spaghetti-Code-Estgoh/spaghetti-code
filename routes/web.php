<?php

use App\Mail\ResetMail;
use App\Mail\WelcomeMail;
use App\Mail\WelcomeMailAdm;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controller\RegistoController;
use Acaronlex\LaravelCalendar\Calendar;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/home', function () {
    return view('home');
});

Route::view('/', 'welcome');


//Route::get('/post/{id}/{welcome?}', [PostController::class, 'show']);

Route::get('/post/', [PostController::class, 'index'])->name('post.index')->middleware('auth');

Route::get('/post/create', [PostController::class, 'create'])->name('post.create');

Route::post('/post', [PostController::class, 'store'])->name('post.store');

Route::get('/post/{id}/', [PostController::class, 'show'])->name('post.show');

Route::delete('post/{id}', [PostController::class, 'destroy'])->name('post.destroy');

Auth::routes([
    //'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/loginWorker', 'auth.loginWorker');

//Route para testes
Route::view('/testView', 'auth\passwords\reset');

//testar mail
Route::get('/email', function () {
    //Mail::to('binogamer12@gmail.com')->send(new WelcomeMailAdm());
    return new WelcomeMailAdm();
});
//Routes do Registo
Route::resource('/registo', 'App\Http\Controllers\RegistoController')->only('store', 'create');
Route::resource('/registofuncionario', 'App\Http\Controllers\RegistoWController')->only('store', 'create');

//Rota teste para dashboard utente
//Author: Guilherme Jafar
Route::view('/dashboardutente', 'utentes.dashboard');
Route::view('/novaconsulta', 'utentes.marcarconsulta');
Route::view('/historicoconsulta', 'utentes.historicoconsultas');
Route::view('/desmarcarconsulta', 'utentes.desmarcarconsulta');

//Rota teste para dashboard admin
Route::view('/inserirfuncionario', 'admin.dashboard');
Route::view('/gerirfuncionarios', 'admin.gerirfuncionarios');
Route::view('/editarfuncionario', 'admin.editarfuncionario');
Route::view('/eliminarfuncionario', 'admin.eliminarfuncionario');

//Rota teste para dashboard funcionário
Route::view('/dashboardfuncionario', 'funcionarios.dashboard');

Route::get('/agendamedica', function (){
    $events = [];

    $events[] = \Acaronlex\LaravelCalendar\Calendar::event(
        'Consulta de clinica geral', //event title
        false, //full day event?
        '2021-01-11T08:30:00', //start time (you can also use Carbon instead of DateTime)
        '2021-01-11T09:30:00', //end time (you can also use Carbon instead of DateTime)
        0 //optionally, you can specify an event ID
    );

    $events[] = \Acaronlex\LaravelCalendar\Calendar::event(
        "Valentine's Day", //event title
        false, //full day event?
        new \DateTime('2021-01-10T14:30:00'), //start time (you can also use Carbon instead of DateTime)
        new \DateTime('2021-01-10T16:30:00'), //end time (you can also use Carbon instead of DateTime)
        'stringEventId' //optionally, you can specify an event ID
    );

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
});

Route::view('/aprovarconsulta', 'funcionarios.aprovarconsulta');
Route::view('/inserirutente', 'funcionarios.inserirutente');
Route::view('/desmarcarconsulta', 'funcionarios.desmarcarconsulta');

//Rota teste para dashboard médico
Route::view('/consultas', 'medicos.dashboard');
//Route::view('/agenda', 'medicos.agenda');


Route::get('/agenda', function (){
    $events = [];

    $events[] = \Acaronlex\LaravelCalendar\Calendar::event(
        'Consulta de clinica geral', //event title
        false, //full day event?
        '2021-01-11T08:30:00', //start time (you can also use Carbon instead of DateTime)
        '2021-01-11T09:30:00', //end time (you can also use Carbon instead of DateTime)
        0 //optionally, you can specify an event ID
    );

    $events[] = \Acaronlex\LaravelCalendar\Calendar::event(
        "Valentine's Day", //event title
        false, //full day event?
        new \DateTime('2021-01-10T14:30:00'), //start time (you can also use Carbon instead of DateTime)
        new \DateTime('2021-01-10T16:30:00'), //end time (you can also use Carbon instead of DateTime)
        'stringEventId' //optionally, you can specify an event ID
    );

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
});

Route::get('confirmaRegisto/{token}',  [App\Http\Controllers\RegistoController::class, 'confirm']);
Route::view('/erroRegisto', 'errors.registerFail');
//Route::get('cyberpunk',  [App\Http\Controllers\RegistoController::class, 'test']);

//Route Login
//Autor:Afonso Vitório
Route::post('/checkLogin', [App\Http\Controllers\RegistoController::class, 'checkLogin'])->name('checkLogin');




Route::post('/GetConsulta',[App\Http\Controllers\GereConsultaProfissional::class,'GetConsultaAgendada']);
Route::post('/ChgConsulta',[App\Http\Controllers\GereConsultaProfissional::class,'ChgangeConsulta']);

//Route::view('/loading', 'loading');
