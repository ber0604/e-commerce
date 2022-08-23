<?php

namespace App\Http\Controllers;


use App\Models\Genero;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request){
        $data = [];


        $listafilmes = Produto::all();
        $data["lista"] = $listafilmes;

        return view("home", $data);
    }

    public function genero(Request $request, $idgenero = 0){
        $data = [];

        $listaGeneros = Genero::all();

        $queryProdutos = Produto::limit(4);

        if($idgenero != 0){
            $queryProdutos->where("genero_id" , $idgenero);
        }

        $listaProdutos = $queryProdutos->get();

        $data ["lista"] = $listaProdutos;
        $data ["listaGenero"] = $listaGeneros;

        return view("genero", $data);
    }
}
