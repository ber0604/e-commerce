@include('templates.header')
@section('content')

<div class="cart-modal-overlay">
    <div class="cart-modal">
      <i id="close-btn" class="fas fa-times"></i>
      <h1 class="cart-is-empty">Cart is empty</h1>

      <div class="product-rows">
      </div>
      <div class="total">
        <h1 class="cart-total">TOTAL</h1>
        <span class="total-price">R$ 00,00</span>
        <button class="purchase-btn">Finalizar Compra</button>
      </div>
    </div>
  </div>
  <!--   end of cart modal -->

  <!--  products  -->
  <div class="items-container">
    <div class="card-1 card" id="filmes">
      <img class="product-image " src="imagens/shrek.webp" alt="">
      <button class="add-to-cart">Adicionar ao carrinho</button>
      <span class="product-price text-danger">R$ 20,00</span>
    </div>
    <div class="card-2 card" id="filmes">
      <img class="product-image" src="imagens/creed.jpg" alt="">
      <button class="add-to-cart">Adicionar ao carrinho</button>
      <span class="product-price text-danger">R$ 20,00</span>
    </div>
    <div class="card-3 card" id="filmes">
      <img class="product-image" src="imagens/romance.jpg" alt="">
      <button class="add-to-cart">Adicionar ao carrinho</button>
      <span class="product-price text-danger">R$ 20,00</span>
    </div>

  </div>
  </div>


  @endsection
