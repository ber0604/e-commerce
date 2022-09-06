@extends('layout')

@section('scriptjs')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        function mask_cpf() {
            let cpf = document.getElementById('cpf').value

            cpf = cpf.replace(/\D/g, "")
            cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
            cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")

            cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2")
            document.getElementById('cpf').value = cpf
        }

        function mask(o, f) {
            setTimeout(function() {
                var v = mphone(o.value);
                if (v != o.value) {
                    o.value = v;
                }
            }, 1);
        }

        function mphone(v) {
            var r = v.replace(/\D/g, "");
            r = r.replace(/^0/, "");
            if (r.length > 10) {
                r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
            } else if (r.length > 5) {
                r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
            } else if (r.length > 2) {
                r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
            } else {
                r = r.replace(/^(\d*)/, "($1");
            }
            return r;
        }
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
                                <input type="text" class="form-control" name="cpf" onkeyup="mask_cpf()"
                                    maxlength="14" id="cpf" placeholder="000.000.000-00" required>

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
                            <label for="phone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" name="phone" id="phone"
                                placeholder="(00) 00000-0000" required onkeypress="mask(this, mphone);"
                                onblur="mask(this, mphone);">
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
                        {{-- <div class="col-12">
                            <label for="password" class="form-label">Confirme sua senha</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                placeholder="********" onkeyup='check();' required>
                            <div class="invalid-feedback">
                                Por favor, confirme sua senha.
                            </div>
                            <span id='message'></span>
                        </div> --}}
                        <div class="col-4">
                            <button type="submit" class="btn btn-danger"name="submit" value="Register">Criar meu Cadastro</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
@endsection
