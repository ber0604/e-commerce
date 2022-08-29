<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Servicos\VendaService;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    public function adicionarCarrinho($idproduto= 0, Request $request){
        $produto = Produto::find($idproduto);

        if($produto){

            $carrinho = session('carrinho' , []);

            array_push($carrinho, $produto);
            session(['carrinho' => $carrinho]);
        }

        return redirect()->route("home");
    }

    public function verCarrinho(Request $request){

        $carrinho = session('carrinho' , []);
        $data = ['carrinho' => $carrinho];
        return view("carrinho" , $data);
    }

    public function deletarCarrinho($id, Request $request){
        $carrinho = session('carrinho' , []);

        if(isset($carrinho[$id])){
             unset($carrinho[$id]);
        }
        session(["carrinho" => $carrinho]);
        return redirect()->route("verCarrinho");
    }

    public function finalizarCarrinho(Request $request){

        $produtos = session('carrinho' , []);
        $vendaService = new VendaService();
        $result = $vendaService->finalizarVenda($produtos, Auth::user());

        if($result["status"] == "ok"){
            $request()->session()->forget('carrinho');
        }

        $request->session()->flash($result["status"], $result["message"]);

        return redirect()->route("verCarrinho");
    }
}
