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

Route::get('/logout', function () {
    return view('logout');
});


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
    Mail::to('binogamer12@gmail.com')->send(new WelcomeMailAdm());
    return new WelcomeMailAdm();
});

//Routes do Registo
Route::resource('/registo', 'App\Http\Controllers\RegistoController')->only('store', 'create');
Route::resource('/registofuncionario', 'App\Http\Controllers\RegistoWController')->only('store', 'create');

//Routes de alterar definições de conta
Route::post('/alterarPerfilUtente', [App\Http\Controllers\AlterarPerfilController::class, 'alterarUtente'])->name('alterarUtente');
Route::post('/alterarPerfilAdmin', [App\Http\Controllers\AlterarPerfilController::class, 'alterarAdmin'])->name('alterarAdmin');
Route::post('/alterarPerfilMedico', [App\Http\Controllers\AlterarPerfilController::class, 'alterarMedico'])->name('alterarMedico');
Route::post('/alterarPerfilFuncionario', [App\Http\Controllers\AlterarPerfilController::class, 'alterarFuncionario'])->name('alterarFuncionario');


//Rota teste para dashboard utente
//Author: Guilherme Jafar
Route::view('/dashboardutente', 'utentes.dashboard');
Route::view('/novaconsulta', 'utentes.marcarconsulta');
Route::view('/historicoconsulta', 'utentes.historicoconsultas');
Route::view('/desmarcarConsultaUtente', 'utentes.desmarcarConsultaUtente');
Route::view('/perfil', 'utentes.perfil');

Route::post('/novaconsulta', [App\Http\Controllers\GereConsultaUtente::class, 'marcarConsulta']);

Route::get('novaconsulta/', [App\Http\Controllers\GereConsultaUtente::class, 'index']);
Route::get('/novaconsulta/{id}', [App\Http\Controllers\GereConsultaUtente::class, 'getMedicos']);

Route::get('/dashboardutente',[App\Http\Controllers\GereConsultaUtente::class,'GetConsultaProximaUtente']);

Route::get('/historicoconsulta',[App\Http\Controllers\GereConsultaUtente::class,'GetConsultaHistoricoUtente']);

//Rota teste para dashboard admin
Route::view('/inserirfuncionario', 'admin.dashboard');
Route::view('/inserirmedico', 'admin.inserirmedico');
Route::view('/gerirfuncionarios', 'admin.gerirfuncionarios');
Route::view('/editarfuncionario', 'admin.editarfuncionario');
Route::view('/eliminarfuncionario', 'admin.eliminarfuncionario');

//Rota teste para dashboard funcionário
Route::view('/dashboardfuncionario', 'funcionarios.dashboard');

Route::view('/agendamedica','medicos.agenda');
Route::view('/agendamedicaFunc','funcionarios.agendamedica');


Route::view('/aprovarconsulta', 'funcionarios.aprovarconsulta');
Route::view('/inserirutente', 'funcionarios.inserirutente');
Route::view('/desmarcarconsulta', 'funcionarios.desmarcarconsulta');

//Rota teste para dashboard médico
Route::view('/consultas', 'medicos.dashboard');
Route::view('/terminarconsulta', 'medicos.terminarconsulta');
//Route::view('/agenda', 'medicos.agenda');




Route::get('confirmaRegisto/{token}',  [App\Http\Controllers\RegistoController::class, 'confirm']);
Route::view('/erroRegisto', 'errors.registerFail');
//Route::get('cyberpunk',  [App\Http\Controllers\RegistoController::class, 'test']);

//Route Login
//Autor:Afonso Vitório
Route::post('/checkLogin', [App\Http\Controllers\RegistoController::class, 'checkLogin'])->name('checkLogin');

//route:utente
//route:Diogo Pinto
Route::post('/GetConsultaCancelarUtente',[App\Http\Controllers\GereConsultaUtente::class,'GetConsultaCancelarUtente']);
Route::post('/cancelarConsultaUtente',[App\Http\Controllers\GereConsultaUtente::class,'CancelarConsulta']);



//route:funcionario
//route: Diogo Pinto
Route::post('/GetConsulta',[App\Http\Controllers\GereConsultaProfissional::class,'GetConsultaAgendada']);
Route::post('/ChgConsulta',[App\Http\Controllers\GereConsultaProfissional::class,'ChgangeConsulta']);
Route::post('/GetConsultaCancelar',[App\Http\Controllers\GereConsultaProfissional::class,'GetConsultaCancelar']);
Route::post('/cancelarConsulta',[App\Http\Controllers\GereConsultaProfissional::class,'CancelarConsulta']);
Route::get('/agendamedicaFunc',[\App\Http\Controllers\GereConsultaProfissional::class,'agendaMedicaEmpty']);
Route::get('/agendamedicaFuncionario',[\App\Http\Controllers\GereConsultaProfissional::class,'agendaMedicaFunc']);
//Route::view('/loading', 'loading');


//Route: medico
//Autor: Alexandre Lopes
Route::get('/consultas', "App\Http\Controllers\GereConsultaProfissional@listarConsultasMedicos");
Route::get('/terminarconsulta/{id}', "App\Http\Controllers\GereConsultaProfissional@comecarConsulta");
Route::get('/consultas/{id}', "App\Http\Controllers\GereConsultaProfissional@terminarConsulta");
//Route: medico
//Autor: DiogoPinto
Route::get('/agenda',[\App\Http\Controllers\GereConsultaProfissional::class,'agendaMedica']);


//Test PDF
Route::get('/recibo/printpdf/{id}', [App\Http\Controllers\PDFController::class, 'printPDF']);
Route::get('/pc/printpdf/{id}', [App\Http\Controllers\PDFController::class, 'printPDFPC']);
