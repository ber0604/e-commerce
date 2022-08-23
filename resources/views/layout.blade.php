<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<header class="container-fluid p-3 bg-black text-danger">
    <div class="header conatiner">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="{{route('home')}}" class=" col-sm nav-link px-2 text-danger ">Home</a></li>
          <li><a href="{{route('home')}}" class="col-sm nav-link px-2 text-danger ">Streaming</a></li>
          <li><a href="{{route('conta')}}" class="col-sm nav-link px-2 text-danger  ">Minha conta</a></li>
          <li>
            <label for="genero">Gênero:</label>
            <select id="generos" name="generos" onchange="location = this.value;">
              <option value=""></option>
              <option value="{{route('home')}}">Ação</option>
              <option value="{{route('home')}}">Infantil</option>
              <option value="{{route('home')}}">Romance</option>

            </select>
          </li>
        </ul>

        <div class="busca">
          <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
            <input type="search" class="form-control form-control-dark" placeholder="Buscar..." aria-label="Search">
          </form>
        </div>

        <div class="login">
          @auth
          <a href="{{route('logout')}}" class="col-sm nav-link px-2 text-danger ">Logout</a>
          @endauth

          @guest
          <a href="{{route('login')}}" class="col-sm nav-link px-2 text-danger ">Login</a>
          @endguest
        </div>

        <div class="cart-btn">
          <i id="cart" class="fas fa-shopping-cart"></i>
          <span class="cart-quantity">0</span>
        </div>

      </div>
      <div class="membro">
        <a href="{{route('home')}}" class=" col-sm nav-link px-2 text-danger ">SEJA MEMBRO</a>
      </div>
  </header>
  
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

    <div class="container">
        <div class="row">
            @yield("conteudo")
        </div>
    </div>


</body>
