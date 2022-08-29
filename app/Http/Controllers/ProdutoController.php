<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Produto;
use App\Servicos\VendaService;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

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

        $listafilmes = $queryProdutos->get();

        $data ["lista"] = $listafilmes;
        $data ["listaGenero"] = $listaGeneros;
        $data ["idgenero"] = $idgenero;

        return view("genero", $data);
    }

}
