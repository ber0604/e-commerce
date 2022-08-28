<?php

namespace App\Servicos;

use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClienteService
{
   public function salvarUsuario(Usuario $user){
    try{
        $dbUsuario = Usuario::where("username", $user->username)->first();
        if($dbUsuario){
            return['status' => 'err' , 'message'=> 'Perfil já cadastrado.'];
        }
        DB::beginTransaction();
        $user->save();
        DB::commit();

        return['status' => 'ok' , 'message'=> 'Perfil criado com sucesso.'];
    }catch(\Exception $e){
        Log::error("ERRO",['file' => 'ClienteService.salvarUsuario' , 'message'=> $e->getMessage() ]);

        DB::rollback();
        return['status' => 'ok' , 'message'=> 'Não foi possível cadastrar o Perfil.'];
    }

    }
   }

