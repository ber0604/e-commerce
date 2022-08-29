<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/login2.css">
    <link rel="icon" href="https://png.pngtree.com/element_our/png_detail/20181227/movie-icon-which-is-designed-for-all-application-purpose-new-png_287896.jpg">
</head>

<body>

    <div class="col-sm-5 container pt-5">
        <img src="https://png.pngtree.com/element_our/png_detail/20181227/movie-icon-which-is-designed-for-all-application-purpose-new-png_287896.jpg"
            class="mx-auto d-block ">
        @if (session('erro'))
            <div>
                {{ session('erro') }}
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3 mt-3">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" class="form-control"
                    placeholder="Entre com seu username" required>
                <div class="valid-feedback">Válido.</div>
                <div class="invalid-feedback">Inválido.</div>
            </div>
            <div class="mb-3">
                <label for="password">Senha:</label>
                <input type="password" class="form-control" name="password" id="password"
                    placeholder="Entre com sua senha" required>
                <div class="valid-feedback">Válido.</div>
                <div class="invalid-feedback">Inválido.</div>
            </div>
            <div class="mb-3">
                <a href="{{ route('index') }}" class="text-danger" target="_blank">Não possuo cadastro</a>
            </div>

            <div class="mb-3">
                <input name="submit" id="botao" type="submit" value="Login" />
            </div>

        </form>
    </div>


</body>

</html>
