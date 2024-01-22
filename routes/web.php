<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\EnderecoController;
use App\Models\Produto;
use App\Models\PedidoItem;
use App\Models\Pedido;


Route::get('/promocoes', function () {

    $produtos=Produto::where([
        ['PRODUTO_PRECO','<=',80]
    ])->get();

    return view('Promoções',['produtos'=>$produtos]);
});

Route::get('/', function () {
    return view('Homepage');
});

Route::get('/jogos', function () {
    $produtos = Produto::all();
  return view('Jogos')->with('produtos',$produtos);
});

Route::get('/dashboard', function () {
    redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/carrinho', [CarrinhoController::class, 'MetodoDoCarrinho'])->name('store');

Route::get('/carrinho',[CarrinhoController::class, 'index'])->name('carrinho.index');

Route::post('/carrinho/store/{produto}', [CarrinhoController::class, 'store'])->middleware('auth')->name('carrinho.store');

Route::post('/endereco/store',[EnderecoController::class,'store'])->name('endereco.store');

Route::get('/endereco',[EnderecoController::class,'index'])->name('endereco.index');

Route::delete('/endereco/{endereco}', [EnderecoController::class, 'destroy'])->name('endereco.destroy');

Route::get('/endereco/{endereco}/edit',[EnderecoController::class,'edit'])->name('endereco.edit');

Route::put('/endereco/{endereco}',[EnderecoController::class,'update'])->name('endereco.update');

Route::get("/endereco/create", [EnderecoController::class, "create"])->name('endereco.create');

Route::get('/pedido', [PedidoController::class,'index'])->name('Pedidos.index');

Route::post('/pedido/checkout', [PedidoController::class, 'checkout'])->name('pedido.checkout');

Route::get('/pedido/{pedido}',[PedidoController::class,'show'])->name('pedido.show');

Route::get('/dashboard', function () {
    redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('Homepage');
});
Route::delete('/endereco/{endereco}', 'EnderecoController@destroy')->name('endereco.destroy');

Route::post('/carrinho/remover-produto', 'CarrinhoController@removerProduto')->name('carrinho.removerProduto');

Route::get('/categoria/{categoria}', [CategoriaController::class, 'show'])->name('categoria.show');

Route::get('/produto', [ProdutoController::class, 'index'])->name('produtos.index');

Route::get('/produto/{Produtos}', [ProdutoController::class, 'show'])->name('produto.show');

Route::get('/users/{user}/edit',[UsuarioController::class,'edit'])->name('usuarios.edit');

Route::put('/users/{user}',[UsuarioController::class,'update'])->name('usuarios.update');

Route::get('/users/{user}',[UsuarioController::class,'show'])->name('usuarios.show');

Route::get('/produtos/{id}', 'ProdutoController@show')->name('Produtos.show');
