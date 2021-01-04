<?php

use App\Mail\ResetMail;
use App\Mail\WelcomeMail;
use App\Mail\WelcomeMailAdm;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controller\RegistoController;

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
//Routes do Registo #Autor: Afonso Vitório
Route::resource('/registo', 'App\Http\Controllers\RegistoController')->only('store', 'create');
Route::resource('/inserirfuncionario', 'App\Http\Controllers\RegistoController')->only('createAdm', '');

//Rota teste para dashboard utente
//Author: Guilherme Jafar
Route::view('/dashboardutente', 'utentes.dashboard');
Route::view('/novaconsulta', 'utentes.marcarconsulta');
Route::view('/historicoconsulta', 'utentes.historicoconsultas');
Route::view('/desmarcarconsulta', 'utentes.desmarcarconsulta');

//Rota teste para dashboard admin
//Route::view('/inserirfuncionario', 'admin.dashboard');
Route::view('/gerirfuncionarios', 'admin.gerirfuncionarios');
Route::view('/editarfuncionario', 'admin.editarfuncionario');
Route::view('/eliminarfuncionario', 'admin.eliminarfuncionario');

//Rota teste para dashboard funcionário
Route::view('/dashboardfuncionario', 'funcionarios.dashboard');
Route::view('/agendamedica', 'funcionarios.agendamedica');
Route::view('/aprovarconsulta', 'funcionarios.aprovarconsulta');
Route::view('/inserirutente', 'funcionarios.inserirutente');
Route::view('/desmarcarconsulta', 'funcionarios.desmarcarconsulta');

//Rota teste para dashboard médico
Route::view('/consultas', 'medicos.dashboard');
Route::view('/agenda', 'medicos.agenda');


Route::get('confirmaRegisto/{token}',  [App\Http\Controllers\RegistoController::class, 'confirm']);
Route::view('/erroRegisto', 'errors.registerFail');
//Route::get('cyberpunk',  [App\Http\Controllers\RegistoController::class, 'test']);

