<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;
use App\Models\User;

class UsuariosController extends Controller
{
    public function index(Request $req){ 

        if(!empty($_POST)){
            die('s');
        }else{
            return view('usuario.index');
        }
        

    }

    public function cadastrar(Request $req){ 
        
        if(!empty($_POST)){
            $dados = $req->all();

            $clientes = new cliente;


            //create clientte
            $clientes->nome = $dados['nome'];
            $clientes->sobrenome = $dados['sobrenome'];    
            $clientes->cpf = $dados['cpf'];
            $clientes->cep = $dados['cep'];
            $clientes->endereco= $dados['endereco'];
            $clientes->bairro = $dados['bairro'];
            $clientes->endNun = $dados['endNun'];
            
            if($clientes->save()){
                $user = new User;
                $user->email = $dados['email'];
                $user->password = \bcrypt($dados['password']);
                $user->cliente_id = $clientes->id;

                if($user->save()){
                    dd('s');
                }else{
                    dd('nao');
                }
            }else{
                dd('wwee');
            }
            

            
        }else{
            return view('usuario.cadastrar');
        }
        
    }



    public function log(Request $request)
    {
        
        $validatedData = $request->validate([
                'email' => 'required|email|unique:users',
                'password' => 'required|min:5'
            ], [
                'email.required'   => 'email e obrigatorio',
                'password.required' => 'Password e obrigatorio'
            ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::create($validatedData);
        // return back()->with('success', 'User created successfully.');
    }


}