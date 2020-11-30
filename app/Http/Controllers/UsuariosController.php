<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            die('s');
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