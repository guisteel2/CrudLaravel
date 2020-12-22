<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




// Route::get('/', function () {
//     return view('index');
// });
// Route::get('/', function () {
//     return view('index');
// });
//so para testa
Route::get('/',['as' => 'home.index', 'uses' => 'App\Http\Controllers\homeController@index']);
Route::get('/usuarios/{id?}',   ['as' => 'logar',      'uses' =>'App\Http\Controllers\UsuariosController@index']);
Route::post('/usuarios/entrar', ['as' => 'logar.user', 'uses' =>'App\Http\Controllers\UsuariosController@entrar']);
Route::get('/home/sair',    ['as' => 'sair.user',  'uses' =>'App\Http\Controllers\homeController@sair']);


Route::get('/cadastrar/usuario', 'App\Http\Controllers\UsuariosController@cadastrar');
Route::post('/cadastrar/usuario',['as' => 'cadastro.cliente', 'uses' => 'App\Http\Controllers\UsuariosController@cadastrar']);


//grupo de para autenticação
Route::group(['middleware' => 'auth'], function(){
    Route::get('/painel/index',      ['as' => 'painel.index',       'uses' => 'App\Http\Controllers\PainelADM\PaineladmController@index']);
    
    Route::match(['get', 'post'],'/categoria/getcategoria/{id?}',['as' => 'getcategoria', 'uses' => 'App\Http\Controllers\CategoriasController@getcategoria']);

    Route::get('/produtos/adicionar',['as' => 'produtos.adicionar', 'uses' => 'App\Http\Controllers\ProdutosController@adicionar']);
    Route::post('/produtos/adicionar',['as' => 'produtos.adicionar', 'uses' => 'App\Http\Controllers\ProdutosController@adicionar']);
    
    Route::post('/categoria/adicionar/',['as' => 'categoria.adicionar', 'uses' => 'App\Http\Controllers\CategoriasController@categoriaadicionar']);
    Route::get('/categoria/index/',['as' => 'categoria.index', 'uses' => 'App\Http\Controllers\CategoriasController@indexcategoria']);
    Route::post('/categoria/editar/{id}',['as' => 'categoria.editar', 'uses' => 'App\Http\Controllers\CategoriasController@editarcategoria']);
    Route::get('/categoria/deleta/{id}',['as' => 'categoria.deleta', 'uses' => 'App\Http\Controllers\CategoriasController@deletarcategoria']);

    Route::get('/tipo/tipo/',['as' => 'tipo.index', 'uses' => 'App\Http\Controllers\TiposController@indextipo']);
    Route::post('/tipo/adicionar/',['as' => 'tipo.adicionar', 'uses' => 'App\Http\Controllers\TiposController@tipoadicionar']);
    Route::get('/tipo/editar/{id}',['as' => 'tipo.editar', 'uses' => 'App\Http\Controllers\TiposController@editartipo']);
    Route::get('/tipo/deleta/{id}',['as' => 'tipo.deleta', 'uses' => 'App\Http\Controllers\TiposController@deletartipo']);
    

    Route::get('/produtos/lista',['as' => 'produtos.lista', 'uses' => 'App\Http\Controllers\ProdutosController@lista']);
    Route::post('/produtos/salvar',  ['as' => 'produtos.salva',     'uses' => 'App\Http\Controllers\PainelADM\PaineladmController@salvar']);
    Route::get('/produtos/editar/{id}', ['as' => 'produtos.editar', 'uses' => 'App\Http\Controllers\ProdutosController@editar']);
    Route::post('/produtos/editar/{id}', ['as' => 'produtos.editar','uses' => 'App\Http\Controllers\ProdutosController@editar']);
    Route::get('/produtos/deletar/{id}',  ['as' => 'produtos.delete',   'uses' => 'App\Http\Controllers\ProdutosController@deletar']);

    

    Route::get('/editar/usuario/{id}',  ['as' => 'editar.cliente'   , 'uses' => 'App\Http\Controllers\UsuariosController@editar']);
    Route::post('/editar/usuario/{id?}',['as' => 'att.cliente'      , 'uses' => 'App\Http\Controllers\UsuariosController@editar']);
    Route::get('painel/senha/usuario/{id?}' ,['as' => 'att.cliente.senha', 'uses' => 'App\Http\Controllers\UsuariosController@editarsenha']);
});


