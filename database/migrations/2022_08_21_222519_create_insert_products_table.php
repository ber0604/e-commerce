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
