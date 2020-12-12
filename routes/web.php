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
    Route::get('/produtos/adicionar',['as' => 'produtos.adicionar', 'uses' => 'App\Http\Controllers\ProdutosController@adicionar']);

    Route::post('/produtos/adicionar/categoria',['as' => 'categoria.adicionar', 'uses' => 'App\Http\Controllers\ProdutosController@categoriaadicionar']);
    Route::get('/produtos/index/categoria',['as' => 'categoria.index', 'uses' => 'App\Http\Controllers\ProdutosController@indexcategoria']);

    Route::post('/produtos/adicionar/tipo',['as' => 'tipo.adicionar', 'uses' => 'App\Http\Controllers\ProdutosController@tipoadicionar']);
    Route::get('/produtos/index/tipo',['as' => 'tipo.index', 'uses' => 'App\Http\Controllers\ProdutosController@indextipo']);

    Route::post('/produtos/salvar',  ['as' => 'produtos.salva',     'uses' => 'App\Http\Controllers\PainelADM\PaineladmController@salvar']);
    Route::put('/produtos/editar',   ['as' => 'produtos.editar',    'uses' => 'App\Http\Controllers\PainelADM\PaineladmController@editar']);
    Route::get('/produtos/deletar',  ['as' => 'produtos.cliente',   'uses' => 'App\Http\Controllers\PainelADM\PaineladmController@deletar']);

    

    Route::get('/editar/usuario/{id}',  ['as' => 'editar.cliente'   , 'uses' => 'App\Http\Controllers\UsuariosController@editar']);
    Route::post('/editar/usuario/{id?}',['as' => 'att.cliente'      , 'uses' => 'App\Http\Controllers\UsuariosController@editar']);
    Route::get('painel/senha/usuario/{id?}' ,['as' => 'att.cliente.senha', 'uses' => 'App\Http\Controllers\UsuariosController@editarsenha']);
});


