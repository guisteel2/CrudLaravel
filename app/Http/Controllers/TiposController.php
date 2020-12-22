<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\categoria;
use App\Models\tipo;
use Auth;

class TiposController extends Controller
{
    public function indextipo(Request $req){
        $tipos = tipo::find();

        return view('tipo.index',compact('tipos','categoria'));
    } 

    public function tipoadicionar(Request $req){
        $this->validar($req,true);

        $dados = $req->all();

        if(!empty($dados['tipo'])){
            $tipo = new tipo;
            $tipo->categoria_id = $dados['categoria_id'];
            $tipo->descricao = $dados['tipo'];
    
            if($tipo->save()){
                session()->flash('success', 'Tipo de produto criado:'.$tipo->descricao);
            }else{
                $this->validar($req,true);
            }
         }
         $url = $req->headers->get('referer');
         return redirect($url);
        
    }

    public function editartipo(Request $req){
    }

    public function deletartipo(Request $req){
    }

    

    public function validar($request, $ax = null){

        if($ax){
            $validatedData = $request->validate([
            'categoria_id' => 'required',
            'tipo'      => 'required|unique:tipos,descricao',
            ], [
                'required'   => 'campo de tipo obrigatorio',
                'tipo.unique'   => 'tipo ja existe',
            ]);

        }else{
            $validatedData = $request->validate([
                'categoria_id' => 'required',
                'tipo' => 'required',
            ], [
                'required'   => 'campo de categoria obrigatorio',
                'categoria_id.unique'   => 'Categoria ja existe',
            ]);
        }
              
    }
}
