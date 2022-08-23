@include("layout")

    <h2>Gêneros</h2>

    @if (isset($listaGenero) && count($listaGenero) > 0)
        <ul>
            <li>
            <a href="{{ route('genero')}}">Geral</a>
            @foreach ($listaGenero as $gen)


                   <a href="{{ route('genero_id', ['idgenero' => $gen->id]) }}"> {{$gen->name}}</a>
                </li>
            @endforeach
        </ul>
    @endif


    @if (isset($lista) && count($lista) > 0)
        <ul>
            @foreach ($lista as $prod)
                <li>
                    {{ $prod->name }}
                </li>
            @endforeach
        </ul>
    @endif


</html>
