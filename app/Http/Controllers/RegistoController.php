<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ResetMail;
use App\Mail\WelcomeMail;
use App\Mail\WelcomeMailAdm;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Requests\StoreRegisto;
use App\Models\Registo;
use App\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use App\Requests\StoreFuncionarioRegisto;
use App\Requests\StoreMedicoRegisto;
use App\Requests\EliminarFuncionarioRequest;
use App\Requests\EmailPasswordResetRequest;
use App\Requests\ResetPassword;
use Exception;

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

    /*
    * Função que guarda um registo do tipo Funcionario
    * Autor: Afonso Vitório
    */
    protected function storeFuncionario(StoreFuncionarioRegisto $request)
    {
        $validatedData = $request->validated();

        //Encriptação da password
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

            DB::table('funcionario')->insert([
                'nome' => $validatedData['nome'],
                'email' => $validatedData['email'],
                'password' => $validatedData['password'],
                'nif' => $validatedData['nif'],
                'genero' => $validatedData['genero'],
                'morada' => $validatedData['morada'],
                'contacto' => $validatedData['contacto'],
                'fotoPerfil' => $validatedData['imagePath']
            ]);

        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return redirect()->back()->withInput()->withErrors(['Registo já existente...']);
            }
        }

        $request->session()->flash("Registo criado com sucesso!");

        return view('home');
    }

    /*
    * Função que guarda um registo do tipo Medico
    * Autor: Afonso Vitório
    */
    protected function storeMedico(StoreMedicoRegisto $request)
    {
        $validatedData = $request->validated();

        //Encriptação da password
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

            DB::table('medicos')->insert([
                'nome' => $validatedData['nome'],
                'email' => $validatedData['email'],
                'password' => $validatedData['password'],
                'nif' => $validatedData['nif'],
                'especialidae' => $validatedData['esp'],
                'numeroCeluta' => $validatedData['ced'],
                'fotoPerfil' => $validatedData['imagePath']
            ]);

        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return redirect()->back()->withInput()->withErrors(['Registo já existente...']);
            }
        }

        $request->session()->flash("Registo criado com sucesso!");

        return view('home');
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
        if(array_key_exists('worker', $validatedData)){
            // 1 na variavel tipo conta corresponde ao utilizador, 2 - admin, 3 - medico, 4 - funcionário
            // 1 na variável worker do array validated data corresponde ao admin, 2 - medico, 3 - funcionário
            $tipoConta = 1 + $validatedData['worker'];

        }else{
            $tipoConta = 1;
        }

        if (!$this->checkPassword($validatedData['email'], $validatedData['password'], $tipoConta)) {
            //Tipo de conta com o valor 0 corresponde à password incorreta para o conta especificada, do tipo especificado
            $tipoConta = 0;
        }


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
                return redirect()->back()->withInput()->withErrors(['Houve um erro interno, pedimos desculpa...']);
            }

        } elseif($tipoConta == 0){
            return redirect()->back()->withInput()->withErrors(['Email ou Password incorretos!']);
        }

    }

    //Função que retorna o tipo de conta com base no email
    //Autor Afonso Vitório
    private function checkPassword($email, $password, $tipoConta)
    {
        // Uitlizador
        if($tipoConta == 1){
            $target_password = DB::table('utentes')->select('password')->where('email', '=', $email)->first();
            if ($target_password != null){
                if(Hash::check($password, $target_password->password)){
                    return true;
                }
            }
        }
        // Admin
        elseif ($tipoConta == 2) {
            $target_password = DB::table('admins')->select('password')->where('email', '=', $email)->first();
            if ($target_password != null){
                if(Hash::check($password, $target_password->password)){
                    return true;
                }
            }
        }
        // Medico
        elseif ($tipoConta == 3) {
            $target_password = DB::table('medicos')->select('password')->where('email', '=', $email)->first();
            if ($target_password != null){
                if(Hash::check($password, $target_password->password)){
                    return true;
                }
            }
        }
        // Funcionario
        elseif ($tipoConta == 4) {
            $target_password = DB::table('funcionario')->select('password')->where('email', '=', $email)->first();
            if ($target_password != null){
                if(Hash::check($password, $target_password->password)){
                    return true;
                }
            }
        }

        return false;
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
            $campos = ['id', 'nome', 'imagePath', 'email', 'contacto', 'nif', 'nss'];

            $resultados = DB::table('utentes')->select($campos)->where('email', '=', $email)->first();
            session(['id' => $resultados->id, 'nome' => $resultados->nome, 'imagePath' => $resultados->imagePath, 'email' => $resultados->email, 'contacto' => $resultados->contacto, 'nif' => $resultados->nif, 'nss' => $resultados->nss]);

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

    //Função que lista os médicos e funcionários
    //Autor: Alexandre Lopes
    function listarFuncionarios ()
    {

        $medicos = DB::table('medicos')->get();

        $funcionarios = DB::table('funcionario')->get();


        return view('admin/gerirfuncionarios', ['medicos'=> $medicos, 'funcionarios'=> $funcionarios]);

    }

    //Função que mostra a informção detalhada acerca de um funcionário
    //Autor: Alexandre Lopes
    function verInformaçãoFuncionarios ($id_funcionario)
    {

            $funcionarios=DB::table('funcionario')
            ->where('id','=',$id_funcionario)
            ->get();

        return view('admin/editarfuncionario', ['funcionarios'=> $funcionarios]);

    }

      //Função que mostra a informção detalhada acerca de um médico
      //Autor: Alexandre Lopes
       function verInformaçãoMedicos ($id_medico)
    {

            $medicos=DB::table('medicos')
            ->where('id','=',$id_medico)
            ->get();

        return view('admin/editarmedico', ['medicos'=> $medicos]);

    }
    

    //Função que permite eliminar um funcionário
    //Autor Afonso Vitório
    function eliminaFuncionario(EliminarFuncionarioRequest $request)
    {
        $validatedData = $request->validated();

        if ($validatedData['worker'] == 1) {
            try {
                DB::table('admins')->where('email', '=', $validatedData['email'])->delete();
                $informacao = "Conta eliminada com sucesso!";

            } catch(Exception $e) {
                $informacao = "Ocurreu um erro ao eliminar a conta...";
            }

        }elseif ($validatedData['worker'] == 2) {
            try {
                DB::table('medicos')->where('email', '=', $validatedData['email'])->delete();
                $informacao = "Conta eliminada com sucesso!";

            } catch(Exception $e) {
                $informacao = "Ocurreu um erro ao eliminar a conta...";
            }

        }elseif ($validatedData['worker'] == 3) {
            try {
                DB::table('funcionario')->where('email', '=', $validatedData['email'])->delete();
                $informacao = "Conta eliminada com sucesso!";

            } catch(Exception $e) {
                $informacao = "Ocurreu um erro ao eliminar a conta...";
            }

        }

        $request->session()->flash($informacao);

        return view('admin.eliminarfuncionario');

    }

    function criaTokenMandaEmailResetPassword(EmailPasswordResetRequest $request)
    {
        $validatedData = $request->validated();

        $token = bin2hex(random_bytes(20));

        $reset = '1/'.$token;

        if ($validatedData['worker'] == 1) {
            try {
                DB::table('utentes')->where('email', '=', $validatedData['email'])->update(['reset_token' => $token]);
                $informacao = "Email de recuperação de conta enviado com sucesso!";
                $reset = '1/'.$token;
            } catch(Exception $e) {
                $informacao = "Conta não existente...";
            }

        }elseif ($validatedData['worker'] == 2) {
            # code...
        }elseif ($validatedData['worker'] == 3) {
            # code...
        }elseif ($validatedData['worker'] == 4) {
            # code...
        }

        Mail::to($validatedData['email'])->send(new ResetMail($reset));

        $request->session()->flash($informacao);

        return view('home');

    }

    function resetPassword(ResetPassword $request)
    {
        //Verificar se o código de reset é válido
        //Na função que dá reset à pw remover o que estiver no campo reset_token

    }


}
