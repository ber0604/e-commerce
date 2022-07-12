@include('templates.header')
@section('content')

<div class="text-danger bg-black container ">
    <main>

      <div class="col-sm-12 container pt-5 justify-content-center">
        <h1 class="mb-3">Crie seu Cadastro</h1>
        <form name="registration" action="" method="post">
          <div class="row g-3">
            <div class="col-12">
              <label for="name" class="form-label">Nome Completo</label>
              <input type="text" class="form-control" id="firstName" placeholder="João da Silva" value="" required>
              <div class="invalid-feedback">
                Nome inteiro.
              </div>
            </div>

            <div class="col-12">
              <label for="username" class="form-label">Username</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" name="username" id="username" placeholder="" required>
                <div class="invalid-feedback">

                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="cpf" class="form-label">CPF</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="username" placeholder="000.000.000-00" required>
                <div class="invalid-feedback">
                  000.000.000-00
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email </label>
              <input type="email" class="form-control" id="email" name="email "placeholder="you@example.com">
              <div class="invalid-feedback">
                Adicione um e-mail válido.
              </div>
            </div>

            <div class="col-12">
              <label for="telefone" class="form-label">Telefone</label>
              <input type="text" class="form-control" id="address" placeholder="(00) 00000-0000" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>
            <div class="col-12">
              <label for="text" class="form-label">Crie uma senha</label>
              <input type="password" class="form-control" id="senha" name="password" placeholder="********" required>
              <div class="invalid-feedback">
                Por favor, crie sua senha.
              </div>
            </div>
            <div class="col-12">
              <label for="text" class="form-label">Confirme sua senha</label>
              <input type="password" class="form-control" id="senha" placeholder="********" required>
              <div class="invalid-feedback">
                Por favor, confirme sua senha.
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-danger"name="submit" value="Register" >Criar meu Cadastro</button>
            </div>
          </div>

      </div>
  </div>
  <footer class="my-5 pt-5 text-muted text-center text-small bg-black">
    <p class="mb-1">&copy; 2022 FilmesBR</p>

  </footer>
</body>
</html>


  @endsection

