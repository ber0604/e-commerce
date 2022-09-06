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
            //session()->forget('carrinho');

            $credCard = new \PagSeguro\Domains\Requests\DirectPayment\CreditCard();
            $credCard->setReference("PED_". $result["idpedido"]);
            $credCard->setCurrency("BRL");

            foreach($produtos as $p){
                $credCard->addItems()->withParameters(
                    $p->id,
                    $p->nome,
                    1,
                    number_format($p->valor, 2, ".", "")
                );
            }

            $user = Auth::user();

            $credCard->setSender()->setName($user->name);
            $credCard->setSender()->setEmail($user->email . "@sandbox.pagseguro.com.br");
            $credCard->setSender()->setHash($request->input("hashseller"));
            $credCard->setSender()->setPhone($user->phone);
            $credCard->setSender()->setDocument()->withParameters("CPF", $user->cpf);

            // $credCard->setShipping()->setAddress()->withParameters(
            //     'Av. A',
            //     'Av. A',
            //     'Av. A',
            //     'Av. A',
            // );
            // $credCard->setBilling()->setAddress()->withParameters(
            //     'Av. A',
            //     'Av. A',
            //     'Av. A',
            //     'Av. A',
            // );
            $credCard->setToken($request->input("cardtoken"));

            $nparcela = $request->input("nparcela");

            $totalpagar = $request->input("totalpagar");

            $totalparcela = $request->input("totalparcela");

            $credCard->setInstallment()->withParameters($nparcela, number_format($totalparcela, 2, " . " , ""));

            $credCard->setHolder()->setName($user->name . " " . $user->name);
            $credCard->setHolder()->setDocument()->withParameters("CPF" , $user->email);
            $credCard->setHolder()->setBirthDate("01/01/1980");
            $credCard->setHolder()->setPhone($user->phone);

            $credCard->setMode("DEFAULT");
            $result = $credCard->register($this->getCredentials());

            echo "Compra realizada com sucesso.";

        }else{
            echo "Compra não realizada!";
        }

     session()->flash($result["status"], $result["message"]);

        return redirect()->route("verCarrinho");
    }

}
