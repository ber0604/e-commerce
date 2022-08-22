@include('base.header')


<div class="cart-modal-overlay">
    <div class="cart-modal">
        <i id="close-btn" class="fas fa-times"></i>
        <h1 class="cart-is-empty">Cart is empty</h1>
    </div>
    <div class="product-rows">
        <h1 class="cart-total">TOTAL</h1>
        <span class="total-price">R$ 00,00</span>
        <button class="purchase-btn">Finalizar Compra</button>
    </div>
</div>


<div class="items-container">
    @if (count($lista))
        @foreach ($lista as $prod)
            <div class="card-1 card" id="filmes">
                <img class="product-image " src={{ asset($prod->foto) }} alt="">
                <div class="card-body">
                    <button class="add-to-cart">Adicionar ao carrinho</button>
                    <span class="product-price text-danger">{{ $prod->name }} - R${{$prod->valor}}</span>
                </div>
            </div>
        @endforeach
    @endif
</div>

<script src="{{ asset('js/script.js') }}"></script>

@include('base.footer')
