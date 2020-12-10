<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class homeController extends Controller
{
    public function index(Request $req){ 

        if(!empty($_POST)){
            dd('passou aq indec home via post');
        }else{
            return view('home.index');
        }
        
    }

    public function sair(Request $req)
    {
        Auth::logout();
        return view('home.index');

    }
}
