<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItensPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens_pedidos', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('quantidade');
            $table->dateTime('dt_item');
            $table->decimal('valor', 10,2);

            $table->integer('produto_id')->unsigned();
            $table->integer('pedido_id')->unsigned();

            $table->foreign("pedido_id")->references("id")->on("pedido")->onDelete("cascade");
            $table->foreign("produto_id")->references("id")->on("produto")->onDelete("cascade");
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido');

    }
}
