<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Models\utentes_n_aprovados;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Requests\StoreRegisto;
use App\Models\Registo;

/**
 * Controlador responsável pelo registo de novos utilizadores
 * Autor: Afonso Vitório
 */
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

    protected function store(StoreRegisto $request)
    {
        // Validação dos dados do registo
        $validatedData = $request->validated();

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
        Mail::to($validatedData['email'])->send(new WelcomeMail());
        return redirect()->route('confirmation.register');
    }

}
