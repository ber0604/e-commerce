@extends('layout')
@section('conteudo')
    <div class="col-2">
        @if (isset($listaGenero) && count($listaGenero) > 0)
            <div class="list-group">
                <a href="{{ route('genero') }}" class="list-group-item list-grupo-item-action bg-dark text-danger">Geral</a>
                @foreach ($listaGenero as $gen)
                <a href="{{ route('genero_id', ['idgenero' => $gen->id]) }}" class="list-group-item
                    ist-grupo-item-action bg-dark text-danger @if($gen  ->id ==$idgenero) active @endif">
                    {{ $gen->name }}</a>
                @endforeach
            </div>
        @endif
    </div>

    <div class="col-10 ">
        @include('_produtos', ['lista' => $lista])
    </div>

@endsection
