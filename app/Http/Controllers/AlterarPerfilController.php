<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use App\Requests\AlteraUtenteRequest;
use App\Requests\AlteraFuncionarioRequest;
use App\Requests\AlteraMedicoRequest;
use App\Requests\AlteraAdminRequest;
use Illuminate\Support\Facades\DB;
use Exception;

class AlterarPerfilController extends Controller
{

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    //TODO: Fazer upload de imagem do utente
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
        try {
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

            $informacao = "Informação alterada com sucesso!";

        } catch(Exception $e) {
            $informacao = "Informação não alterada...";
        }

        //Alteração das variavéis de sessão
        session(['nome' => $validatedData['nome'], 'email' => $validatedData['email'], 'nif' => $validatedData['nif'], 'nss' => $validatedData['nss'], 'contacto' => $validatedData['contacto']]);
            
        //Envio de informação para o frontend
        $request->session()->flash($informacao);

        return view('utentes.dashboard');
    }

    /**
     * Função para alterar dados do Admin
     *  Autor: Afonso Vitório
     */
    protected function alterarAdmin(AlteraAdminRequest $request)
    {
        $validatedData = $request->validated();

        //Hash da password
        $validatedData['password'] = Hash::make($validatedData['password']);

        //Alteração dos dados na base de dados
        try {
            DB::update('update admins set nome = ?,
                email = ?,
                password = ?
                where email = ?', [
                $validatedData['nome'],
                $validatedData['email'],
                $validatedData['password'],
                session('email')]
            );

            $informacao = "Informação alterada com sucesso!";

        } catch(Exception $e) {
            $informacao = "Informação não alterada...";
        }

        //Alteração das variavéis de sessão
        session(['nome' => $validatedData['nome'], 'email' => $validatedData['email']]);
            
        //Envio de informação para o frontend
        $request->session()->flash($informacao);

        return view('admin.dashboard');
    }

    /**
     * Função para alterar dados do Medico
     *  Autor: Afonso Vitório
     */
    protected function alterarMedico(AlteraMedicoRequest $request)
    {
        $validatedData = $request->validated();

        //Hash da password
        $validatedData['password'] = Hash::make($validatedData['password']);

        //Image Upload
        if(array_key_exists('fotografia', $validatedData))
        {
            $validatedData['imagePath'] = Hash::make(time() . $validatedData['email']).'.'.$request->fotografia->extension();
            $request->fotografia->move(public_path('images'), $validatedData['imagePath']);
            unset($validatedData['fotografia']);
        }

        //Alteração dos dados na base de dados
        try {
            DB::update('update medicos set nome = ?,
                email = ?,
                password = ?,
                nif = ?,
                especialidae = ?,
                numeroCeluta = ?,
                fotoPerfil = ?
                where email = ?', [
                $validatedData['nome'],
                $validatedData['email'],
                $validatedData['password'],
                $validatedData['nif'],
                $validatedData['esp'],
                $validatedData['ced'],
                $validatedData['imagePath'],
                session('email')]
            );
            $informacao = "Informação alterada com sucesso!";

        } catch(Exception $e) {
            $informacao = "Informação não alterada...";
        }
        

        //Alteração das variavéis de sessão
        session(['nome' => $validatedData['nome'],
                'especialidade' => $validatedData['esp'],
                'imagePath' => $validatedData['imagePath']]);
            
        //Envio de informação para o frontend
        $request->session()->flash($informacao);

        return view('medicos.perfil');
    }


    /**
     * Função para alterar dados do Funcionario
     *  Autor: Afonso Vitório
     */
    protected function alterarFuncionario(AlteraFuncionarioRequest $request)
    {
        $validatedData = $request->validated();

        //Hash da password
        $validatedData['password'] = Hash::make($validatedData['password']);

        //Image Upload
        if(array_key_exists('fotografia', $validatedData))
        {
            $validatedData['imagePath'] = Hash::make(time() . $validatedData['email']).'.'.$request->fotografia->extension();
            $request->fotografia->move(public_path('images'), $validatedData['imagePath']);
            unset($validatedData['fotografia']);
        }

        //Alteração dos dados na base de dados
        try {
            DB::update('update funcionario set nome = ?,
                email = ?,
                password = ?,
                nif = ?,
                contacto = ?,
                fotoPerfil = ?
                where email = ?', [
                $validatedData['nome'],
                $validatedData['email'],
                $validatedData['password'],
                $validatedData['nif'],
                $validatedData['contacto'],
                $validatedData['imagePath'],
                session('email')]
            );

            $informacao = "Informação alterada com sucesso!";

        } catch(Exception $e) {
            $informacao = "Informação não alterada...";
        }

        //Alteração das variavéis de sessão
        session(['nome' => $validatedData['nome'],
            'email' => $validatedData['email'],
            'nif' => $validatedData['nif'],
            'contacto' => $validatedData['contacto'],
            'imagePath' => $validatedData['imagePath']]);
            
        //Envio de informação para o frontend
        $request->session()->flash($informacao);

        return view('funcionarios.dashboard');
    }


}
