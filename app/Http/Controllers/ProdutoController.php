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
        $data ["idgenero"] = $idgenero;

        return view("genero", $data);
    }

    public function adicionarCarrinho($idproduto= 0, Request $request){
        $prod =Produto::find($idproduto);

        if($prod){
            $carrinho = session('carrinho' , []);

            array_push($carrinho, $prod);
            session(['carrinho' => $carrinho]);
        }

        return redirect()->route("home");
    }

    public function verCarrinho(Request $request){

        $carrinho = session('carrinho' , []);
        dd($carrinho);

    }
}
