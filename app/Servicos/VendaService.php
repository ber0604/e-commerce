<?php

namespace App\Servicos;

use App\Models\ItemPedido;
use App\Models\Pedido;
use App\Models\Usuario;
use DateTime;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log as FacadesLog;
use Log;

class VendaService
{

    public function finalizarVenda($produtos = [], Usuario $user)
    {

        try {
            DB::beginTransaction();

            $dtHoje = new DateTime();
            $pedido = new Pedido();

            $pedido->dt_pedido = $dtHoje->format("Y-m-d H:i:s");
            $pedido->status = "PEN";
            $pedido->usuario_id = $user->id;

            $pedido->save();

            foreach ($produtos as $p) {
                $itens = new ItemPedido();

                $itens->quantidade = 1;
                $itens->valor  = $p->valor;
                $itens->dt_item  = $dtHoje->format("Y-m-d H:i:s");
                $itens->produto_id = $p->id;
                $itens->pedido_id = $pedido->id;
                $itens->save();
            }

            DB::commit();
            return ['status' => 'ok', 'message' => 'Venda finalizada.'];
        } catch (Exception $e) {
            DB::rollBack();
            FacadesLog::error("ERRO: VENDA SERVICE", ['message' => $e->getMessage()]);
            return ['status' => 'err', 'message' => 'Venda nao pode ser finalizada.'];
        }
    }
}
