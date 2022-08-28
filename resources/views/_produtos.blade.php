@if (isset($lista))
    <div class="row">
        @foreach ($lista as $prod)
            <div class="col-3 mb-3 d-flex align-items-stretch " id="filmes">
                <div class="card bg-black">
                    <img class="product-image " src={{ asset($prod->foto) }} alt="">
                    <div class="card-body ">

                        <span class="product-price text-danger">{{ $prod->name }} - R${{ $prod->valor }}</span>
                        <a href="{{route('adicionarCarrinho' , ['idproduto' , $prod->id])}}" class="btn btn-sm btn-dark text-danger">Adicionar Filme</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
