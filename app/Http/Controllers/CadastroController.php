<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CadastroController extends Controller
{
    public function index(){
        return view('cadastro');
    }

    public function create(Request $form){

        $usuario = new Usuario();

        $usuario->name = $form->name;
        $usuario->username = $form->username;
        $usuario->email = $form->email;
        $usuario->cpf = $form->cpf;
        $usuario->telephone = $form->telephone;
        $usuario->password = Hash::make($form->password);

        $usuario->save();

        return redirect('login');

    }

}
