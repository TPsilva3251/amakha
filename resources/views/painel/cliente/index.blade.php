@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @yield('containt')
            </div>
        </div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Cadastro</li>
                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
            </ol>
        </nav>

        @if (session()->has('success'))
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <button type="button" class="close" aria-label="Close" data-dismiss="alert" aria-hidden="true">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>{{ session()->get('success') }}</strong>
                    </div>
                </div>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="row">
                <div class="alert alert-danger">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="alert"
                        aria-hidden="true"></button>
                    <strong>{{ session()->get('error') }}</strong>
                </div>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                Clientes <button type="button" class="btn btn-info" id="btnCreate" data-toggle="modal"
                    data-target="#exampleModal">Novo</button>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="form">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">CPF</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($clientes as $cliente)
                  <tr>
                    <th scope="row">{{$cliente->id}}</th>
                    <td>{{$cliente->nome}}</td>
                    <td>{{$cliente->cpf}}</td>
                    <td>{{$cliente->logradouro}}</td>
                    <td>{{$cliente->telefone}}</td>
                    <td>
                        <a href="#" class="badge badge-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a href="#" class="badge badge-warning"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a href="clientecart/{{$cliente->id}}" class="badge badge-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        <a href="clientecart/{{$cliente->id}}" class="badge badge-success"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                    </td>
                  </tr>
                  @empty
                      <h2>Não tem cliente cadastrado !</h2>
                  @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal -->
    <form action="{{ route('cliente.store') }}" class="form-group" method="POST">
        {!! csrf_field() !!}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Novo Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" placeholder="Digite o nome" name="nome">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-12">
                                <label for="logradouro">Logradouro</label>
                                <input type="text" class="form-control" placeholder="Digite o endereço" name="logradouro"
                                    id="">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-6">
                                <label for="bairro">Bairro</label>
                                <input type="text" class="form-control" placeholder="Digite o Bairro" name="bairro" id="">
                            </div>
                            <div class="col-lg-2">
                                <label for="numero">Número</label>
                                <input type="text" class="form-control" name="numero" id="">
                            </div>
                            <div class="col-lg-4">
                                <label for="complemento">Comp.</label>
                                <input type="text" class="form-control" name="complemento" id=""
                                    placeholder="Ex:. Apto">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-6">
                                <label for="decricao">CPF</label>
                                <input type="text" class="form-control" name="cpf" id="cpf"
                                    placeholder="Digite o CPF">
                            </div>
                            <div class="col-lg-6">
                                <label for="valor">Telefone</label>
                                {{-- <input type="telefone" class="form-control" name="telefone"
                                    placeholder="(EX:. (99)9 9999-9999)"> --}}
                                    <input type="text" name="telefone" value="{{old('telefone')}}" class="form-control" placeholder="ex:(88) 88888-8888" id="whats"
                            data-mask="(00) 00000-0000" data-mask-selectonfocus="true" onblur="validphone(this)">
                            </div>
                        </div>
                        {{-- <div class="row mt-4">
                            <div class="col-lg-6">
                                <h5>Status de <b>Ativo</b></h5>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ativo" id="inlineRadio1"
                                        value="S" checked>
                                    <label class="form-check-label" for="inlineRadio1">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ativo" id="inlineRadio2"
                                        value="N">
                                    <label class="form-check-label" for="inlineRadio2">Não</label>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
