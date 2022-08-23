<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsertProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $cat = new \App\Models\Genero([ 'name' => 'romance']);
        $cat->save();

        $cat = new \App\Models\Genero([ 'name' => 'infantil']);
        $cat->save();

        $cat = new \App\Models\Genero([ 'name' => 'ação']);
        $cat->save();

        $prod = new \App\Models\Produto(['name' => 'Shrek', 'valor' => 10 , 'foto'=> 'images/shrek.webp', 'descricao' => '', 'genero_id' => $cat->id]);
        $prod->save();

        $prod2 = new \App\Models\Produto(['name' => 'Creed', 'valor' => 10 , 'foto'=> 'images/creed.jpg', 'descricao' => '', 'genero_id' => $cat->id]);
        $prod2->save();

        $prod3 = new \App\Models\Produto(['name' => 'Romance', 'valor' => 10 , 'foto'=> 'images/romance.jpg', 'descricao' => '', 'genero_id' => $cat->id]);
        $prod3->save();
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insert_products');
    }
}
