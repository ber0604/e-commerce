<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Produto;
use App\Servicos\VendaService;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

use PagSeguro\Configuration\Configure;

class ProdutoController extends Controller
{
    private $_configs;

    public function __construct(){
        $this->_configs = new Configure();
        $this->_configs->setCharset("UTF-8");
        $this->_configs->setAccountCredentials(env('PAGSEGURO_EMAIL') , env('PAGSEGURO_TOKEN'));
        $this->_configs->setEnvironment(env("PAGSEGURO_AMBIENTE"));
        $this->_configs->setLog(true, storage_path('logs/pagseguro_' . date('Ymd') . '.log'));

    }

    public function getCredential(){
        return $this->_configs->getAccountCredentials();
    }

    public function pagar(Request $request){
        $data = [];

        $carrinho = session('carrinho' , []);
        $data['carrinho'] =  $carrinho;

        $sessionCode = \PagSeguro\Services\Session::create(
            $this->getCredential()
        );

        $IDSession = $sessionCode->getResult();
        $data["sessionID"] = $IDSession;

        return view ("pagamento", $data);
 
    }

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
