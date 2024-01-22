@extends('Navbar.Home')
@section('main')
<script>
    function login() {
        window.alert('Você precisa estar logado!');
    }
</script>

<main>
    <div class="content" id="palmeiras">
        <div class="left-side">
            <h1 id="produto-nome">{{$produto->PRODUTO_NOME}}</h1>
            
            <div class="right-side" id="right-side">
                <div class="img" id="produto-img">
                    @if(isset($produto->ProdutoImagem[0]))
                        <img src="{{$produto->ProdutoImagem[0]->IMAGEM_URL}}">
                    @else
                        <p>Sem imagem disponível</p>
                    @endif
                </div>
            </div>
            
            <p>
                <ul class="list-group list-group-flush" id="list-group">
                    <li class="list-group-item" id="produto-desc">{{$produto->PRODUTO_DESC}}</li>
                    <li class="list-group-item" id="categoria-nome">
                        @if(isset($produto->Categoria))
                            {{$produto->Categoria->CATEGORIA_NOME}}
                        @else
                            Categoria não definida
                        @endif
                    </li>
                </ul>
            </p>
            <div class="textoProduto" style="display: flex; flex-direction: column" id="textoProduto">
                <span id="qtd-disponivel">Quantidade disponível:{{$produto->PRODUTO_QTD}}</span>
                <span id="valor-original">Valor original:R${{$produto->PRODUTO_PRECO}} </span>
                <span id="desconto">Desconto:R${{$produto->PRODUTO_DESCONTO}}</span><br>
                <span id="valor-com-desconto">Valor do produto com desconto: R${{ $produto->PRODUTO_PRECO - $produto->PRODUTO_DESCONTO ?? 0 }}</span><br><br><br>
            </div>
            @if(!Auth::check())
                <div>
                    <div>
                        <label for="qtd-input">Adicionar quantidade</label>
                        <input type="number" name="ITEM_QTD" min="1" value="1" id="qtd-input">
                    </div>
                    
                    <a href="/login">
                    <button type="submit" id="spfc" class="buttonLogin" name="produto_id" value="{{ $produto->PRODUTO_ID }}">Adicionar ao carrinho</button>
                    </a>
                </div>
            @else
            <form method="POST" action="{{ route('carrinho.store', ['produto' => $produto->PRODUTO_ID]) }}">
    @csrf
    <div id="santos">
        <label for="qtd-input">Adicionar quantidade</label>
        <input type="number" name="ITEM_QTD" min="1" value="1" class="inputCarrinhoQtd" id="qtd-input">
        <button type="submit" id="spfc" class="buttonLogin">Comprar <i class="ri-shopping-cart-line"></i></button>
    </div>
</form>
 @endif
        </div>
    </div>
</main>
@endsection
