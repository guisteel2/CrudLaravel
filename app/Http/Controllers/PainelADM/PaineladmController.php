<?php

namespace App\Http\Controllers\PainelADM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaineladmController extends Controller
{
    public function index(){

        return view('/paineladm/index');
    }
}
