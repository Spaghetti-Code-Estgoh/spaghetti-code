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
use App\Requests\StoreRegisto;
use App\Models\Registo;
use App\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

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
        $confLink = bin2hex(random_bytes(20));
        $validatedData['tokenConfirm'] = $confLink;

        // Encriptação da password
        $validatedData['password'] = Hash::make($validatedData['password']);

        //Image Upload
        if(array_key_exists('fotografia', $validatedData))
        {
            $validatedData['imagePath'] = Hash::make(time() . $validatedData['email']).'.'.$request->fotografia->extension();
            $request->fotografia->move(public_path('images'), $validatedData['imagePath']);
            unset($validatedData['fotografia']);
        }
        else
        {
            $validatedData['imagePath'] = "default.png";
        }

        try {

            $registo = Registo::create($validatedData);

        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return redirect()->back()->withInput()->withErrors(['Registo já existente...']);
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
        try {

            $registo = Registo::createW($validatedData);

        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return redirect()->back()->withInput()->withErrors(['Registo já existente...']);
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
            $found_user = DB::table('utentes')
                ->where('tokenConfirm',$token[1])
                ->get();
             if(count($found_user)){
                 DB::table('utentes')
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
        // Valida os dados
        $validatedData = $request->validated();

        $remember = array_key_exists('remember', $validatedData);

        $tipoConta = $this->getAccountType($validatedData['email'], $validatedData['password']);

        //Faz o remember me
        if($remember){
            $this->createRememberMe($tipoConta, $validatedData['email']);
        }
    
        if ($tipoConta == 1) {
            if($this->isAccountConfirmed($validatedData['email'])){
                if($this->addToSessionVariable(1, $validatedData['email'])){
                    return view('loading');
                }else{
                    return redirect()->back()->withInput()->withErrors(['Houve um erro, interno, pedimos desculpa...']);
                }
            }else{
                return redirect()->back()->withInput()->withErrors(['Email ainda não confirmado!']);
            }
        } elseif ($tipoConta == 2) {
            if($this->addToSessionVariable(2, $validatedData['email'])){
                return view('loading');
            }else{
                return redirect()->back()->withInput()->withErrors(['Houve um erro, interno, pedimos desculpa...']);
            }

        } elseif($tipoConta == 3) {
             if($this->addToSessionVariable(3, $validatedData['email'])){
                    return view('loading');
                }else{
                    return redirect()->back()->withInput()->withErrors(['Houve um erro, interno, pedimos desculpa...']);
                }

        } elseif($tipoConta == 4){
            if($this->addToSessionVariable(4, $validatedData['email'])){
                return view('loading');
            }else{
                return redirect()->back()->withInput()->withErrors(['Houve um erro, interno, pedimos desculpa...']);
            }

        } elseif($tipoConta == 0){
            return redirect()->back()->withInput()->withErrors(['Email ou Password incorretos!']);
        }

    }

    //Função que retorna o tipo de conta
    //Autor Afonso Vitório
    private function getAccountType($email, $password)
    {
        // Uitlizador
        $target_password = DB::table('utentes')->select('password')->where('email', '=', $email)->first();
        if ($target_password != null){
            if(Hash::check($password, $target_password->password)){
                return 1;
            }
        }

        // Admin
        $target_password = DB::table('admins')->select('password')->where('email', '=', $email)->first();
        if ($target_password != null){
            if(Hash::check($password, $target_password->password)){
                return 2;
            }
        }

        // Medico
        $target_password = DB::table('medicos')->select('password')->where('email', '=', $email)->first();
        if ($target_password != null){
            if(Hash::check($password, $target_password->password)){
                return 3;
            }
        }

        // Funcionario
        $target_password = DB::table('funcionario')->select('password')->where('email', '=', $email)->first();
        if ($target_password != null){
            if(Hash::check($password, $target_password->password)){
                return 4;
            }
        }

        return 0;
        

    }

    //Função para meter variveis na sessão
    //Autor Afonso Vitório
    private function addToSessionVariable($tipoConta, $email)
    {
        if (FALSE === is_int($tipoConta)) {
            return 0;
        }

        // Utilizador
        if($tipoConta == 1){
            $campos = ['id', 'nome', 'imagePath'];

            $resultados = DB::table('utentes')->select($campos)->where('email', '=', $email)->first();
            session(['id' => $resultados->id, 'nome' => $resultados->nome, 'imagePath' => $resultados->imagePath]);
            
        //Admin
        }else if($tipoConta == 2){
            $campos = ['id', 'nome'];

            $resultados = DB::table('admins')->select($campos)->where('email', '=', $email)->first();
             session(['id' => $resultados->id, 'nome' => $resultados->nome,'imagePath' => 'default.png']);

        //Medico
        }else if($tipoConta == 3){
            $campos = ['id', 'nome', 'especialidae', 'fotoPerfil'];

            $resultados = DB::table('medicos')->select($campos)->where('email', '=', $email)->first();
            session(['id' => $resultados->id, 'nome' => $resultados->nome, 'especialidade' => $resultados->especialidae, 'imagePath' => $resultados->fotoPerfil]);

        //Funcionario
        }else if($tipoConta == 4){
            $campos = ['id', 'nome', 'fotoPerfil'];

            $resultados = DB::table('funcionario')->select($campos)->where('email', '=', $email)->first();
            session(['id' => $resultados->id, 'nome' => $resultados->nome, 'imagePath' => $resultados->fotoPerfil]);

        }

        session(['tipo_conta' => $tipoConta]);   
        
        return 1;
    }

    //Função que verifica se a conta está confirmada
    //Autor: Afonso Vitório
    private function isAccountConfirmed($email)
    {
        $confirmed = DB::table('utentes')->select('confirmed')->where('email', '=', $email)->first();
        $confirmed = $confirmed->confirmed;

        return $confirmed;
    }

    //Função que adiciona um token de remember me às cookies e à base de dados
    //Autor: Afonso Vitório
    private function createRememberMe($tipoConta, $email)
    {
        $token = Hash::make($tipoConta . $email . time());

        if($tipoConta == 1)
        {
            DB::update('update utentes set remember_token = ? where email = ?', [$token, $email]);
        }   
        else if($tipoConta == 2)
        {
            DB::update('update admins set remember_token = ? where email = ?', [$token, $email]);
        }  
        else if($tipoConta == 3)
        {
            DB::update('update medicos set remember_token = ? where email = ?', [$token, $email]);
        }  
        else if($tipoConta == 4)
        {
            DB::update('update funcionario set remember_token = ? where email = ?', [$token, $email]);
        }  

        Cookie::queue('rememberMe', $token, 60);

    }

}
