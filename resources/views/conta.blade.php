@extends('layout')

@section('conteudo')
    <div class="text-danger bg-black container ">
        <main>

            <div class="col-sm-12 container pt-5 justify-content-center">
                <h1 class="mb-3">Crie seu Cadastro</h1>
                <form action="{{ route('/cliente/update' , ['id' => $usuario->id]) }}" method="post">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" value="{{ $usuario->name }}" name="name">

                        </div>

                        <div class="col-12">
                            <label for="username" class="form-label">Username</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" value="{{ $usuario->username }}" name="username">
                                    >

                            </div>
                        </div>

                        <div class="col-12">
                            <label for="cpf" class="form-label">CPF</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" value="{{ $usuario->cpf }}" onkeyup="mask_cpf()"
                                    maxlength="14" name="cpf">>

                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email </label>
                            <input type="email" class="form-control" value="{{ $usuario->email }}" name="email">>

                        </div>

                        <div class="col-12">
                            <label for="phone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" value="{{ $usuario->phone }}"
                                 name="phone" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);">

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
                            <button type="submit" class="btn btn-danger"name="submit" value="Register"> Salvar </button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
@endsection
