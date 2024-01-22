@extends('Navbar.Home')
    @section('main')
<h1>
{{$categoria->CATEGORIA_NOME}}</h1>
<div class="row row-cols-1 row-cols-md-3 g-4" id="container">
    
    @foreach($categoria->Produtos as $produto)

                <div class="col">
                    <div class="card">
                    @if (count($produto->ProdutoImagem)>0 )
                    <img src="{{$produto->ProdutoImagem[0]->IMAGEM_URL}}" class="card-img-top">
                    @else
                    <img src="../img/SemImagem.jpg" class="card-img-top">
                    @endif
                        <div class="card-body">
                            <h5 class="card-title">{{$produto->PRODUTO_NOME}}</h5>
                            <p class="card-text">R${{$produto->PRODUTO_PRECO}}</p>
                            <a href="{{route('produto.show', $produto->PRODUTO_ID)}}"><button type="submit" class="buttonLogin">Comprar <i class="ri-shopping-cart-line"></i></button></a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>


@endsection