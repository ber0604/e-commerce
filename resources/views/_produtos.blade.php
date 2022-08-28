@if (isset($lista))
    <div class="row">
        @foreach ($lista as $produto)
            <div class="col-3 mb-3 d-flex align-items-stretch " id="filmes">
                <div class="card bg-black">
                    <img class="product-image " src={{ asset($produto->foto) }} alt="">
                    <div class="card-body ">

                        <span class="product-price text-danger">{{ $produto->name }} - R${{ $produto->valor }}</span>
                        <a href="{{route('adicionarCarrinho' , ['idproduto' => $produto->id])}}" class="btn btn-sm btn-dark text-danger">Adicionar Filme</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif  
