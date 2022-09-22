@extends('home')

@section('content')
    <div class="container">
        <div class="row">
            @if (isset($cliente))
                <h3>Cliente: {{$cliente->nome}}</h3>
            @else
                <div class="er">
                    <h3>Esta compra não terá nenhum cliente relacionado!</h3>
                </div>
            @endif
        </div>

        <div class="row ">
            @foreach ($produtos as $produto)
                <div class="col-sm-4 mt-3 ">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Produto: {{ $produto->nome }}</h5>
                            <p class="card-text"><b>Descrição:</b> {{ $produto->descricao }}</p>
                            <p class="card-text"><b>Valor R$: </b>{{ number_format($produto->valor, 2, ',', '.') }}</p>
                            @if (isset($cliente))
                                <a href="{{ route('carrinho.show', [$produto->id, $cliente->id]) }}"
                                    class="btn btn-primary btn-block"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                            @else
                                <a href="{{ route('car.show', $produto->id) }}" class="btn btn-primary btn-block"><i
                                        class="fa fa-cart-plus" aria-hidden="true"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
<style>

    .er > h3{
        color: #ff0000;
    }

    h3{
        margin-left: 250px;
    }


</style>
