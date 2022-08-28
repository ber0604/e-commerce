@extends('layout')

@section('scriptjs')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            $('.telephone').mask('9999-9999');

        });
    </script>
@endsection
@section('conteudo')
    <div class="text-danger bg-black container ">
        <main>

            <div class="col-sm-12 container pt-5 justify-content-center">
                <h1 class="mb-3">Crie seu Cadastro</h1>
                <form name="registration" action="{{ route('cadastro') }}" method="post">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="João da Silva" required>
                            <div class="invalid-feedback">
                                Nome inteiro.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="username" class="form-label">Username</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" name="username" id="username"
                                    placeholder="joanzinho06" required>
                                <div class="invalid-feedback">
                                    Crie um username.
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="cpf" class="form-label">CPF</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" name="cpf" id="cpf" required>

                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email </label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="you@example.com">
                            <div class="invalid-feedback">
                                Adicione um e-mail válido.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="telephone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" name="telephone" id="telephone"
                                placeholder="(00) 00000-0000" required>
                            <div class="invalid-feedback">
                                Coloque seu número de telefone.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="password" class="form-label">Crie uma senha</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="********" onkeyup='check();' required>
                            <div class="invalid-feedback">
                                Por favor, crie sua senha.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="password" class="form-label">Confirme sua senha</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                placeholder="********" onkeyup='check();' required>
                            <div class="invalid-feedback">
                                Por favor, confirme sua senha.
                            </div>
                            <span id='message'></span>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-danger"name="submit" value="Register">Criar meu
                                Cadastro</button>
                        </div>
                    </div>

            </div>
    </div>
@endsection
