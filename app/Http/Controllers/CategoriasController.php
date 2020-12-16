<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\categoria;
use Auth;

class CategoriasController extends Controller
{
    public function indexcategoria(Request $req){
        $categoria = categoria::all();

        return view('categoria.index',compact('categoria'));
    }
    
    public function editarcategoria($id, Request $req){
        $categoria = categoria::find($id);

        $validatedData = $req->validate([
            'categoriamod'      => 'required',
            ], [
                'required'   => 'campo de categoria obrigatorio',
            ]);

        $dados = $req->all();
        $categoria->descricao = $dados['categoria'];

        $categoria->save();

        session()->flash('success', 'categoria atuliza :'.$categoria->descricao);

        $categoria = categoria::all();
        return view('categoria.index',compact('categoria'));

    }

    public function deletarcategoria($id){
        $categoria = categoria::find($id);
    
        session()->flash('success', 'Categoria Deletado :'.$categoria->descricao);

        $categoria->delete();
        
        $categoria = categoria::all();

        return view('categoria.index',compact('categoria'));
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
