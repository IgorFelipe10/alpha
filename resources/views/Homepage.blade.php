@extends('Navbar.Home')
    @section('main')

          <div class="produtos">
            <span class="title-secundary"></span>
            <hr>
            <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach(\App\Models\Produto::all()->take(4) as $produto)

                <div class="col">
                    <div class="card">
                        <img src="{{$produto->ProdutoImagem[0]->IMAGEM_URL}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$produto->PRODUTO_NOME}}</h5>
                            <p class="card-text">R${{$produto->PRODUTO_PRECO}}</p>
                            <a href="{{route('produto.show', $produto->PRODUTO_ID)}}">
                            <button type="submit" class="buttonLogin">Comprar <i class="ri-shopping-cart-line"></i></button></a>
                        </div>
                    </div>
                </div>
            @endforeach

                <div class="produtos02">
                    <span class="title-secundary">Principais Jogos</span>
                    <hr>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach(\App\Models\Produto::all()->take(6) as $produto)

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
    </div>

@endsection