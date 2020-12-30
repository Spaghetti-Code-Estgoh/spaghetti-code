<?php

use App\Mail\WelcomeMail;
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
Route::view('/testView', 'errors.registerFail');

//testar mail
Route::get('/email', function () {
    //Mail::to('binogamer12@gmail.com')->send(new WelcomeMail());
    return new WelcomeMail('127.0.0.1:8000/confirmaRegisto/testToken');
});
//Routes do Registo #Autor: Afonso Vitório
Route::resource('/registo', 'App\Http\Controllers\RegistoController')->only('store', 'create');

//Rota teste para dashboard utente
//Author: Guilherme Jafar
Route::view('/dashboardutente', 'utentes.dashboard');
Route::view('/novaconsulta', 'utentes.marcarconsulta');
Route::view('/historicoconsulta', 'utentes.historicoconsultas');
Route::view('/desmarcarconsulta', 'utentes.desmarcarconsulta');

Route::get('confirmaRegisto/{token}',  [App\Http\Controllers\RegistoController::class, 'confirm']);
//Route::get('cyberpunk',  [App\Http\Controllers\RegistoController::class, 'test']);
