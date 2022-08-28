@extends('layout')
@section('conteudo')
    <div class="text-danger">
        <h3>Carrinho de Compras</h3>
    </div>
    @if (isset($carrinho) && count($carrinho) > 0)
        <table class="table text-danger">
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
                @php $total = 0;
                @endphp
                @foreach ($carrinho as $id => $produto)
                    <tr>
                        <td>
                            <a href="{{ route('deletarCarrinho', ['id' => $id]) }}" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                        <td>{{ $produto->nome }}</td>
                        <td><img src="{{ asset($produto->foto) }}" width= "110" height="140"></td>
                        <td>{{ $produto->valor }}</td>
                        <td>{{ $produto->descricao }}</td>

                    </tr>
                    @php $total += $produto->valor;
                    @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5"> Total do Carrinho: R$ {{ $total }}</td>
                </tr>
            </tfoot>
        </table>

        <form action="{{ route('finalizarCarrinho') }}" method="POST">
            @csrf
            <input type="submit" value="Finalizar Compra" class=" btn btn-lg btn-success">
        </form>
    @else
        <div class="text-danger">
            <p>Nenhum produto localizado</p>
        </div>
    @endif
@endsection
