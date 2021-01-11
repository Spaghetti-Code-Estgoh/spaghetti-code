<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Mail\WelcomeMailAdm;
use App\Models\utentes_n_aprovados;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Requests\StoreRegisto;
use App\Models\Registo;
use App\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class RegistoController extends Controller
{

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function create()
    {
        return view('auth.register');
    }

    protected function createAdm()
    {
        return view('admin.dashboard');
    }

    /**
     * Função para guardar registo
     *  Autor: Afonso Vitório
     */
    protected function store(StoreRegisto $request)
    {
        // Validação dos dados do registo
        $validatedData = $request->validated();

        //token criada, 20 carater alfanumericos
        $confLink = bin2hex(random_bytes(20));;
        $validatedData['tokenConfirm'] = $confLink;

        // Encriptação da password
        $validatedData['password'] = Hash::make($validatedData['password']);

        //Image Upload
        if(array_key_exists('imagePath', $validatedData))
        {
            //TODO: Adicionar um hash ao nome da imagem
            $validatedData['imagePath'] = Hash::make(time() . $validatedData['email']).'.'.$request->fotografia->extension();
            $request->fotografia->move(public_path('images'), $validatedData['imagePath']);
            $validatedData['imagePath'] = "default.jpg";
        }
        else
        {
            $validatedData['imagePath'] = "default.jpg";
        }

        // Try catch responsável por validar se um campo do registo é único da base de dados
        // TODO: Caso haja o erro da base de dados não dar dd (dump and die)
        try {

            $registo = Registo::create($validatedData);

        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                dd('Duplicate Entry');
            }
        }

        $request->session()->flash("Registo criado com sucesso!");



        Mail::to($validatedData['email'])->send(new WelcomeMail($confLink));

        return view('confirmation.register');
    }

    protected function storeAdm(StoreRegisto $request)
    {
        // Validação dos dados do registo
        $validatedData = $request->validated();

        // Encriptação da password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Try catch responsável por validar se um campo do registo é único da base de dados
        // TODO: Caso haja o erro da base de dados não dar dd (dump and die)
        try {

            $registo = Registo::createW($validatedData);

        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                dd('Duplicate Entry');
            }
        }

        $request->session()->flash("Registo criado com sucesso!");



        Mail::to($validatedData['email'])->send(new WelcomeMailAdm());

        return view('admin.dashboard');
    }

    //Função para ler o token do mail
    protected function confirm(Request $request) {
        $token = explode('/',$request->path());
        //print($token[1]);
        try {
            $found_user = DB::table('utentes_n_aprovados')
                ->where('tokenConfirm',$token[1])
                ->get();
             if(count($found_user)){
                 DB::table('utentes_n_aprovados')
                     ->where('id',$found_user[0]->id)
                     ->update(['confirmed'=>1]);
             }else{
                 return redirect('/erroRegisto');
                 //erro! O user n existe com esse codigo
             }
        }catch (Exception $e){
            echo '<script>console.log('.$e->getMessage().')</script>';
            return redirect('/erroRegisto');
        }
        //ver na bd o token e se tiver la confirmar conta e fazer return suc, caso contrario dar return para uma página de erro
        return view('confirmation.registerSucc', ['urlC' => $token]);
    }

    /*
    * Função que faz o login de um user
    * Autor: Afonso Vitório
    */
    protected function checkLogin(LoginRequest $request)
    {

        $validatedData = $request->validated();

        $utente_password = DB::table('utentes_n_aprovados')->select('password')->where('email', '=', $validatedData['email'])->first();
        $admin_password = DB::table('admins')->select('password')->where('email', '=', $validatedData['email'])->first();
        $medico_password = DB::table('medicos')->select('password')->where('email', '=', $validatedData['email'])->first();
        $funcionario_password = DB::table('funcionario')->select('password')->where('email', '=', $validatedData['email'])->first();

        //Login dos utentes
        if ($utente_password != null)
        {

            if (Hash::check($validatedData['password'], $utente_password->password)) {

                $confirmed = DB::table('utentes_n_aprovados')->select('confirmed')->where('email', '=', $validatedData['email'])->first();
                $confirmed = $confirmed->confirmed;

                if($confirmed){
                    session(['tipo_conta' => 1]);
                    return view('loading');
                }else{
                    return redirect()->back()->withInput()->withErrors(['Email ainda não confirmado!']);
                }


            }else{
                return redirect()->back()->withInput()->withErrors(['Email ou Password incorretos!']);

            }

        }
        //Login dos Admins
        else if($admin_password != null)
        {
            if (Hash::check($validatedData['password'], $admin_password->password)) {
                session(['tipo_conta' => 2]);
                return view('loading');
            }
        }
        //Login dos Medicos
        else if($medico_password != null)
        {
            if (Hash::check($validatedData['password'], $medico_password->password)) {
                session(['tipo_conta' => 3]);
                return view('loading');
            }
        }
        //Login dos Funcionarios
        else if($funcionario_password != null)
        {
            if (Hash::check($validatedData['password'], $funcionario_password->password)) {
                session(['tipo_conta' => 4]);
                return view('loading');
            }
        }
        // Caso nenhum login funcione
        return redirect()->back()->withInput()->withErrors(['Email ou Password incorretos!']);

    }


}
