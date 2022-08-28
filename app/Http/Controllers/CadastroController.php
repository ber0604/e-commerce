<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Servicos\ClienteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CadastroController extends Controller
{

    public function index(Request $request)
    {
        $data = [];

        return view("cadastro", $data);
    }
    public function cadastro(Request $form)
    {

        $values = $form->all();
        $usuario = new Usuario();

        $usuario->fill($values);
        $usuario->username = $form->input("username", "");

        $senha = $form->input("password", "");
        $usuario->password = Hash::make($senha);

        $clienteServico = new ClienteService();
        $result = $clienteServico->salvarUsuario($usuario);

        $message = $result["message"];
        $status = $result["status"];

        $form->session()->flash($status, $message);

        return redirect()->route('index');
    }

    // public function editarCadastro(){

    // }
}
