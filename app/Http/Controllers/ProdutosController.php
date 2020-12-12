<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\categoria;
use App\Models\tipo;

class ProdutosController extends Controller
{   
    public function indexcategoria(Request $req){
        $categoria = categoria::all();

        return view('categoria.index',compact('categoria'));
    }

    public function indextipo(Request $req){
        $tipos = tipo::all();

        return view('tipo.index',compact('tipos'));
    }

    public function adicionar(Request $req){
        if(!empty($_POST)){
            die('s');
        }else{
            $tipos = tipo::all();
            $categorias = categoria::all();
            return view('produtos.adicionar', compact('tipos','categorias'));
        }
    }

    public function categoriaadicionar(Request $req){
        $this->validar($req);

        $dados = $req->all();
        
        if(!empty($dados['categoria'])){
            $categoria = new categoria;
            $categoria->descricao = $dados['categoria'];
    
            if($categoria->save()){
                session()->flash('success', 'Categoria de produto criado:'.$categoria->descricao);
            }else{
                $this->validar($req);
            }
        }

         $url = $req->headers->get('referer');
         return redirect($url);
    }

    public function tipoadicionar(Request $req){
        $this->validar($req,true);

        $dados = $req->all();
        
        if(!empty($dados['tipo'])){
            $tipo = new tipo;
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

    public function validar($request, $ax = null){

        if($ax){
            $validatedData = $request->validate([
            'tipo'      => 'required|unique:tipos,descricao',
            ], [
                'required'   => 'campo de tipo obrigatorio',
                'tipo.unique'   => 'tipo ja existe',
            ]);

        }else{
            $validatedData = $request->validate([
                'categoria' => 'required|unique:categorias,descricao',
            ], [
                'required'   => 'campo de categoria obrigatorio',
                'categoria.unique'   => 'Categoria ja existe',
            ]);
        }
              
    }

}
