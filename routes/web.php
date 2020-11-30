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




Route::get('/', function () {
    return view('index');
});
//so para testa
Route::get('/teste', function () {
    return 'testes';
});

Route::get('/usuarios/{id?}', 'App\Http\Controllers\UsuariosController@index');
Route::post('/usuarios/log', 'App\Http\Controllers\UsuariosController@log');

Route::get('/cadastrar/usuario', 'App\Http\Controllers\UsuariosController@cadastrar');
