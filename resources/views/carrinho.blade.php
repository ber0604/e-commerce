@extends("layout")
@section("conteudo")
    <h3>carrinho</h3>

    @if(isset($cart) && count($cart) > 0)
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Nome</th>
                <th>Foto</th>
                <th>Valor</th>
                <th>Descricao</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $produto)
                <tr>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                    <td>{{$produto->nome}}</td>
                    <td><img src="{{asset($produto->foto)}}"></td>
                    <td>{{$produto->valor}}</td>
                    <td>{{$produto->descricao}}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Nenhum produto localizado</p>
    @endif
@endsection
