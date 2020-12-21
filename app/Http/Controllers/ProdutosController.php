<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


use App\Models\User;
use App\Models\produto;
use App\Models\foto;
use App\Models\categoria;
use App\Models\tipo;
use Auth;

class ProdutosController extends Controller
{    
    public function adicionar(Request $req){

        $tipos = tipo::all();
        $categorias = categoria::all();

       
        if(!empty($_POST)){

            $dados = $req->all();

            $validatedData = $req->validate([
                'descricao' => 'required:produto,descricao',
                'valor' => 'required:produto,valor',
                'categoria_id' => 'required:produto,categoria_id',
                'tipo_id' => 'required:produto,tipo_id',
            ], [
                'required'   => 'campo obrigatorio',
            ]);
            
            if($req->hasFile('image')){
                $img = $req->file('image');
                $extesion = $img->guessClientExtension();
                $n = rand(0,100000);
                $dir = "img/produtos_fotos";
                $nomedaimg = $n.".".$extesion;
                $img->move($dir,$nomedaimg);
                $imagem['nome'] = $nomedaimg;
                $imagem['url'] = $dir;
            }else{
                $validatedData = $req->validate([
                    'image' => 'required',
                ], [
                    'required'   => 'img obrigatoria',
                ]);
            }

            
            
            $produto = new produto();
            $produto->descricao = $dados['descricao'];
            $produto->valor= $dados['valor'];
            $produto->categoria_id = $dados['categoria_id'];
            $produto->foto_id = 1;
            $produto->tipo_id= $dados['tipo_id'];
            $produto->user_id= Auth::user()->id;

            if($produto->save()){
                $foto = new foto();
                $foto->nome = $imagem['nome'];
                $foto->url  = $imagem['url'];
                $foto->referencia = $produto->id;

                if($foto->save()){
                    $produto->foto_id = $foto->id;
                    $produto->save();
                    session()->flash('success', 'produto criado:'.$produto->descricao);
                    return redirect()->route('produtos.lista');

                }else{
                    dd('erro ao salvar a foto');
                }
                
            }else{
                dd('erro ao salvar produto');
            }
            

        }else{
            
            return view('produtos.adicionar', compact('tipos','categorias'));
        }
    }

    public function editar($id , Request $req){
        $produto = produto::find($id);
        $foto = DB::table('fotos')->where('referencia','=',$produto->id)->get();
        
        $tipos = tipo::all();
        $categorias = categoria::all();

        

        if(!empty($_POST)){
            $dados = $req->all();

            $validatedData = $req->validate([
                'descricao' => 'required:produto,descricao',
                'valor' => 'required:produto,valor',
                'categoria_id' => 'required:produto,categoria_id',
                'tipo_id' => 'required:produto,tipo_id',
            ], [
                'required'   => 'campo obrigatorio',
            ]);
            
            if($req->hasFile('image')){
                $img = $req->file('image');
                $extesion = $img->guessClientExtension();
                $n = rand(0,100000);
                $dir = "img/produtos_fotos";
                $nomedaimg = $n.".".$extesion;
                $img->move($dir,$nomedaimg);
                $imagem['nome'] = $nomedaimg;
                $imagem['url'] = $dir;
            }

            $produto->descricao = $dados['descricao'];
            $produto->valor= $dados['valor'];
            $produto->categoria_id = $dados['categoria_id'];
            $produto->foto_id = $produto->foto_id;
            $produto->tipo_id= $dados['tipo_id'];
            $produto->user_id= Auth::user()->id;

            if($produto->save()){
                if(isset($img)){

                    $foto = foto::find($produto->foto_id);
                    $foto->nome = $imagem['nome'];
                    $foto->url  = $imagem['url'];
                    $foto->referencia = $produto->id;

                    if($foto->save()){
                        $produto->foto_id = $foto->id;
                        $produto->save();
                    }else{
                        dd('erro ao salvar a foto');
                    }
                }
            session()->flash('success', 'produto editado:'.$produto->descricao);
            return redirect()->route('produtos.lista');
            }else{
                dd('erro ao salvar produto');
            }
            

        }else{
            
            $produto->foto_id = "/".$foto[0]->url."/".$foto[0]->nome;
            return view('produtos.editar', compact('produto','tipos','categorias'));

        }
    }

    public function deletar($id , Request $req){
        $produto = produto::find($id);
        $foto = foto::find($produto->foto_id);

        session()->flash('success', 'produto Deletado :'.$produto->descricao);
            
        $foto->delete();
        $produto->delete();
        
        return redirect()->route('produtos.lista');

    }

    public function lista(Request $req){
        $user_id =  Auth::user()->id;   

        $produtos = Auth::user()->addcprodutos()->get();

        foreach($produtos as $key => $produtos){

            $foto       =  $produtos->foto()->get();
            $tipo       =  $produtos->tipo()->get();
            $categoria  =  $produtos->categoria()->get();
            
            $prod[$key] = $produtos;
            $prod[$key]->foto_id = "/".$foto[0]->url."/".$foto[0]->nome;
            $prod[$key]->tipo_id = $tipo[0]->descricao;
            $prod[$key]->categoria_id = $categoria[0]->descricao;
            
        }
      
  
        return view('produtos.lista',compact('prod'));
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

    public function ValidaFormProduto(Request $request){
       
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'descricao' => 'required',
            'valor' => 'required',
            'categoria_id' => 'required',
            'tipo_id' => 'required',
            'user_id' => 'required',
        ], [
            'required'   => 'campo obrigatorio',
        ]);
        
    }

}
