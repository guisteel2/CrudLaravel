<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\cliente;
use App\Models\User;

use Auth;

class UsuariosController extends Controller
{
    public function index(Request $req){ 

        if(!empty($_POST)){
            die('s');
        }else{
            return view('usuario.index');
        }
        

    }

    public function editar(Request $req){

        if(empty($_POST)){
            $cliente = cliente::find(intval($req->id));

            return view('usuario.editar',compact('cliente'));
            
        }else{
        
            $dados =  $_POST;
            $this->store($req ,true);

            if(Auth::user()->email != $dados['email']){
                User::find(Auth::user()->id)->update($dados);
            }

            if(cliente::find(Auth::user()->cliente_id)->update($dados)){
                session()->flash('success', 'perfil atualizado.');
                return view('paineladm.index');
            }else{
                dd('erro ao atualizar cliente depois vejo');
            }
        }
        

        
    }

    public function editarsenha(Request $req){
        $dados = $req->all();
        //dd($dados['password']);
        
    
            if(Auth::attempt(['email'=>Auth::user()->email , 'password'=>$dados['password']])){
                if(!empty($dados['novsenha'])){
                     
                     $user = User::find(Auth::user()->id);
                     $user->password = bcrypt($dados['novsenha']);
    
                     if($user->save()){
                        Auth::logout();
                        session()->flash('success', 'Senha atualizado');
                        return redirect()->route('logar.user');
                     }else{
                         dd('erro ao atualizar senha de cliente');
                     }
                     
                }else{
                    $this->validatesenha($req,true);
                }
            }else{
                $this->validatesenha($req);
            }

        //return redirect()->route('logar.user');
        // $url = $req->headers->get('referer');
        // return redirect($url);
    }

    public function cadastrar(Request $req){ 


        if(!empty($_POST)){

            $this->store($req);
            
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
                $user->password = bcrypt($dados['password']);
                $user->cliente_id = $clientes->id;
                
                if($user->save()){
                    return view('usuario.index');
                }else{
                    dd('erro de salvar usuario de cliente por favor entrar em contato com o suport ');
                }
            }else{
                dd('erro ao salvar cliente por favor entrar em contato com o suport ');
            }
                
        }else{
            return view('usuario.cadastrar');
        }
        
    }

    public function entrar(Request $req)
    {
        $this->log($req);
        
        $dados = $req->all();
       
        if(Auth::attempt(['email'=>$dados['email'] , 'password'=>$dados['password']])){
            return redirect()->route('home.index');
        }else{
            $this->log($req,true);
            
            // return redirect()->route('logar');
        }

       
    }

    public function store(Request $request,$edit=false)
    {
        if($edit){

            $dados = $request->all();
            $user = cliente::find(Auth::user()->cliente_id);
            //dd($user);
            if($dados['email'] == Auth::user()->email){
                if($dados['cpf'] == $user['cpf']){

                    $validatedData = $request->validate([
                        'nome'     => 'required',
                        'sobrenome'=> 'required',
                        'cep'      => 'required',
                        'bairro'   => 'required',
                        'endNun'   => 'required',
                    ], [
                        'required'    => 'campo obrigatorio',
                    ]);

                }else{
                    $validatedData = $request->validate([
                        'cpf'      => 'required|unique:clientes',
                        'nome'     => 'required',
                        'sobrenome'=> 'required',
                        'cep'      => 'required',
                        'bairro'   => 'required',
                        'endNun'   => 'required',
                    ], [
                        'cpf.unique'     => 'CPF ja cadastrado',
                        'required'    => 'campo obrigatorio',
                    ]);
                }
            }elseif($dados['cpf'] == $user['cpf']){

                $validatedData = $request->validate([
                    'email'    => 'required|unique:users',
                    'nome'     => 'required',
                    'sobrenome'=> 'required',
                    'cep'      => 'required',
                    'bairro'   => 'required',
                    'endNun'   => 'required',
                ], [
                    'email.unique'   => 'email já cadastrado',
                    'required'    => 'campo obrigatorio',
                ]);

            }

        }else{
            $validatedData = $request->validate([
                'email'    => 'required|email|unique:users',
                'password' => 'required',
                'cpf'      => 'required|unique:clientes',
                'nome'     => 'required',
                'sobrenome'=> 'required',
                'cep'      => 'required',
                'bairro'   => 'required',
                'endNun'   => 'required',
            ], [
                'cpf.unique'     => 'CPF ja cadastrado',
                'email.unique'   => 'email já cadastrado',
                'email.required'   => 'email e obrigatorio',
                'required'    => 'campo obrigatorio',
                'password.required'=> 'Password e obrigatorio',
            ]);
        }
       



        //$validatedData['password'] = bcrypt($validatedData['password']);
        //$user = User::create($validatedData);
        // return back()->with('success', 'User created successfully.');
    }

    
    public function log(Request $request,$err=null)
    {
        $validatedData = $request->validate([
            'email'    => 'required',
            'password' => 'required',
        ], [
            'email.required'   => 'email e obrigatorio',
            'password.required'=> 'Password e obrigatorio',
        ]);

        
        if($err){
            $validatedData = $request->validate([
                'password' => 'confirmed:user->password',
            ], [
                'password.confirmed'=> 'erro na senha',
            ]);
        }
        
    }

    public function validatesenha($request ,$edit = null){

        if($edit){
            $validatedData = $request->validate([
                'novsenha' => 'required',
            ], [
                'novsenha.required'   => 'digite novamente a senha',
            ]);
        }else{
            $vai= $request->password;
            $value= 1 + strlen($vai);
           
            $validatedData = $request->validate([
                'novsenha' => 'required|min:100',
                'password' => 'required|min:'.$value,
            ], [
                'min'        => 'Erro na senha atuar',
                'required'   => 'senha incorreta',
                'novsenha.required'   => 'digite novamente a senha',
            ]);
        }
            

    
        
    }



}