@extends("layout")
@section("conteudo")
    <h3>Carrinho de Compras</h3>

    @if(isset($carrinho) && count($carrinho) > 0)
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
            @foreach ($carrinho as $id => $prod)
                <tr>
                    <td>
                        <a href="{{ route('deletarcarrinho', ['id'=>$id])}}" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                    <td>{{$prod->nome}}</td>
                    <td><img src="{{asset($prod->foto)}}"></td>
                    <td>{{$prod->valor}}</td>
                    <td>{{$prod->descricao}}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Nenhum produto localizado</p>
    @endif
@endsection
