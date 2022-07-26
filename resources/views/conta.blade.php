@include('base.header')

<body>

    <main>
        <div class="col-sm-12 container pt-5 justify-content-center text-danger bg-black">
            <h1 class="mb-3">Seus Dados</h1>
            <form class="needs-validation" novalidate>
                <div class="row g-3">
                    <div class="col-12">
                        <label for="name" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" id="firstName" placeholder="João da Silva" value="" required>
                        <div class="invalid-feedback">
                            Nome inteiro.
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
                        <input type="email" class="form-control" id="email" placeholder="you@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
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
                        <label for="text" class="form-label">Sua senha atual</label>
                        <input type="password" class="form-control" id="senha" placeholder="********" required>
                        <div class="invalid-feedback">
                            Por favor, coloque sua senha atual.
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="text" class="form-label">Sua senha nova</label>
                        <input type="password" class="form-control" id="senha" placeholder="********" required>
                        <div class="invalid-feedback">
                            Por favor, coloque sua nova senha.
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-danger">Atualizar meu Cadastro</button>
                    </div>
                </div>
            </form>
                <footer class="my-5 pt-5 text-muted text-center text-small">
                    <p class="mb-1">&copy; 2022 FilmesBR</p>

                </footer>
        </div>


        <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <script src="form-validation.js"></script>
  

    </main>

    @include('base.footer')