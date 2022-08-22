<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request){
        $data = [];


        $listafilmes = \App\Models\Produto::all();
        $data["lista"] = $listafilmes;

        return view("home", $data);
    }

    // public function genero(Request $request){
    //     $data = [];

    //     return view("genero", $data);
    // }
}
