<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{

    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments("id");
            $table->string('name', 255);
            $table->string('email', 255);
            $table->string('username', 255)->unique();
            $table->string('cpf', 255);
            $table->string('password', 255);
            $table->string('telephone', 255);
            $table->timestamps();
            $table->boolean('admin')->default(0);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
