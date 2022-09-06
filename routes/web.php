<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;





route::match(['get', 'post'], '/', [ProdutoController::class, 'index'])->name('home');

route::match(['get', 'post'], '/genero', [ProdutoController::class, 'genero'])->name('genero');
route::match(['get', 'post'], '/{idgenero}/genero', [ProdutoController::class, 'genero'])->name('genero_id');

route::match(['get', 'post'], '/{idproduto}/carrinho/adicionar', [CarrinhoController::class, 'adicionarCarrinho'])
    ->name('adicionarCarrinho');
route::match(['get', 'post'], '/carrinho', [CarrinhoController::class, 'verCarrinho'])
    ->name('verCarrinho');
route::match(['get', 'post'], '/{id}/deletarcarrinho', [CarrinhoController::class, 'deletarCarrinho'])
    ->name('deletarCarrinho');
route::post('/finalizar/carrinho', [CarrinhoController::class, 'finalizarCarrinho'])
    ->name('finalizarCarrinho');


route::match(['get', 'post'] , '/cadastrar' , [CadastroController::class , 'index'])->name('index');

route::get('/cliente/cadastrar', [CadastroController::class, 'cadastro'])->name('cadastro');
route::POST('/cliente/cadastrar', [CadastroController::class, 'cadastro'])->name('cadastro');


route::get('/login', [UsuarioController::class, 'login'])->name('login');
route::POST('/login', [UsuarioController::class, 'login'])->name('login');
Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');

route::match(['get', 'post'], '/filmes/pagar', [   ProdutoController::class , 'pagar'])->name('pagar');

route::match(['get', 'post'] ,'/{id}/editar' , [CadastroController::class, 'editar'])->name('editar');
