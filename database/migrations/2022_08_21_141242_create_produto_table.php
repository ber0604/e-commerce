<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto', function (Blueprint $table) {
            $table->increments("id");
            $table->string('name', 255);
            $table->string('foto', 255)->nullable();
            $table->decimal('valor', 10, 2)->nullable();
            $table->string('descricao', 250)->nullable();
            $table->integer('genero_id')->unsigned();

            $table->timestamps();

            $table->foreign('genero_id')->references('id')->on('genero');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto');
    }
}
