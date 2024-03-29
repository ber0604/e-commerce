@if (isset($lista))
    <div class="row">
        @foreach ($lista as $produto)

            <div class="card col-sm-3 text-center " id="filmes">
                <h5 class="card-header">{{ $produto->name }}</h5>
                <div class="card-body">
                    <img class="card-img-top" src={{ asset($produto->foto) }} width="10" height="250" >
                    <h5 class="card-title">R${{ $produto->valor }}</h5>
                    <a href="{{ route('adicionarCarrinho', ['idproduto' => $produto->id]) }}"
                        class="btn btn-sm btn-dark text-danger" id="botaoFilme">Adicionar Filme</a>
                </div>
            </div>
        @endforeach
    </div>
@endif
