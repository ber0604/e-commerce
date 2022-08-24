@extends('layout')
@section('conteudo')
    <div class="items-container">
        @include('_produtos', ['lista' => $lista])
    </div>
@endsection
