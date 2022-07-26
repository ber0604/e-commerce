@extends('base.head')

<header class="container-fluid p-3 bg-black text-danger">
    <div class="header conatiner">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="{{route('home')}}" class=" col-sm nav-link px-2 text-danger ">Home</a></li>
          <li><a href="{{route('streaming')}}" class="col-sm nav-link px-2 text-danger ">Streaming</a></li>
          <li><a href="{{route('conta')}}" class="col-sm nav-link px-2 text-danger  ">Minha conta</a></li>
          <li>
            <label for="genero">Gênero:</label>
            <select id="generos" name="generos" onchange="location = this.value;">
              <option value=""></option>    
              <option value="{{route('acao')}}">Ação</option>
              <option value="{{route('infantil')}}">Infantil</option>
              <option value="{{route('romance')}}">Romance</option>

            </select>
          </li>
        </ul>

        <div class="busca">
          <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
            <input type="search" class="form-control form-control-dark" placeholder="Buscar..." aria-label="Search">
          </form>
        </div>

        <div class="login">
          <a href="{{route('login')}}" class="col-sm nav-link px-2 text-danger ">Login</a>
        </div>

        <div class="cart-btn">
          <i id="cart" class="fas fa-shopping-cart"></i>
          <span class="cart-quantity">0</span>
        </div>

      </div>
      <div class="membro">
        <a href="{{route('membro')}}" class=" col-sm nav-link px-2 text-danger ">SEJA MEMBRO</a>
      </div>
  </header>

