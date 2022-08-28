<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AcaoController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\StreamingController;
use App\Http\Controllers\RomanceController;
use App\Http\Controllers\MembroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\InfantilController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;





route::match(['get', 'post'], '/', [ProdutoController::class, 'index'])->name('home');

route::match(['get', 'post'], '/genero', [ProdutoController::class, 'genero'])->name('genero');
route::match(['get', 'post'], '/{idgenero}/genero', [ProdutoController::class, 'genero'])->name('genero_id');

route::match(['get', 'post'], '/{idproduto}/carrinho/adicionar', [ProdutoController::class, 'adicionarCarrinho'])
    ->name('adicionarCarrinho');
route::match(['get', 'post'], '/carrinho', [ProdutoController::class, 'verCarrinho'])
    ->name('verCarrinho');
route::match(['get', 'post'], '/{id}/deletarcarrinho', [ProdutoController::class, 'deletarCarrinho'])
    ->name('deletarCarrinho');
route::post('/finalizar/carrinho', [ProdutoController::class, 'finalizarCarrinho'])
    ->name('finalizarCarrinho');


route::match(['get', 'post'] , '/cadastrar' , [CadastroController::class , 'index'])->name('index');

route::get('/cliente/cadastrar', [CadastroController::class, 'cadastro'])->name('cadastro');
route::POST('/cliente/cadastrar', [CadastroController::class, 'cadastro'])->name('cadastro');

route::get('/conta', [ContaController::class, 'index'])->name('conta');

route::get('/login', [UsuarioController::class, 'login'])->name('login');
route::POST('/login', [UsuarioController::class, 'login'])->name('login');
Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');
