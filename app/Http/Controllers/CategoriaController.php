<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function show(Categoria $categoria)
    { 
        try {
            $categoria = Categoria::findOrFail($categoria->CATEGORIA_ID);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404); 
        }

        $maisProdutos = $categoria->Produtos;
        $produto = Produto::where('CATEGORIA_ID', $categoria->CATEGORIA_ID)->get();

        return view('Categorias.show', ['categoria' => $categoria, 'maisProdutos' => $maisProdutos, 'produto' => $produto]);
    }
}
