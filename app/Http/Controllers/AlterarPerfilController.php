<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Mail\WelcomeMailAdm;
use App\Models\utentes;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Requests\AlteraUtenteRequest;
use App\Models\Registo;
use App\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AlterarPerfilController extends Controller
{

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Função para alterar dados do Utente
     *  Autor: Afonso Vitório
     */
    protected function alterarUtente(AlteraUtenteRequest $request)
    {
        $validatedData = $request->validated();

        //Hash da password
        $validatedData['password'] = Hash::make($validatedData['password']);

        //Alteração dos dados na base de dados
        DB::update('update utentes set nome = ?,
            email = ?,
            password = ?,
            nif = ?,
            nss = ?,
            dataNascimento = ?,
            contacto = ?
            where email = ?', [
            $validatedData['nome'],
            $validatedData['email'],
            $validatedData['password'],
            $validatedData['nif'],
            $validatedData['nss'],
            $validatedData['dataNascimento'],
            $validatedData['contacto'],
            session('email')]
        );

        //Alteração das variavéis de sessão
        session(['nome' => $validatedData['nome'], 'email' => $validatedData['email'], 'nif' => $validatedData['nif'], 'nss' => $validatedData['nss'], 'contacto' => $validatedData['contacto']]);
            
        //Envio de informação para o frontend
        $request->session()->flash("Informação alterada com sucesso!");

        return view('home');
    }



}
