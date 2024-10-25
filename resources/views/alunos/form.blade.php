@extends('base')
@section('titulo', 'Formulário Aluno')
@section('conteudo')
    <h3>Formulário Aluno</h3>

    @php
        if (!empty($dado->id)) {
            $route = route('aluno.update', $dado->id);
        } else {
            $route = route('aluno.store');
        }
    @endphp

    <div class="row">

        <form action="{{ $route }}" method="post" enctype="multipart/form-data">
            <!-- csrf camada de segurança-->
            @csrf

            @if (!empty($dado->id))
                @method('put')
            @endif

            <input type="hidden" name="id"
                value="@if (!empty($dado->id)) {{ $dado->id }}
            @else{{ '' }} @endif">

            <div class="col-6">
                <label class="form-label">Nome</label><br>
                <input type="text" name="nome" class="form-control"
                    value="@if (!empty($dado->nome)) {{ $dado->nome }}
                    @elseif (!empty(old('nome'))){{ old('nome') }}
                    @else{{ '' }} @endif"><br>
            </div>

            <div class="col-6">
                <label class="form-label">CPF</label><br>
                <input type="text" name="cpf" class="form-control"
                    value="@if (!empty($dado->cpf)) {{ $dado->cpf }}
                @elseif (!empty(old('cpf'))){{ old('cpf') }}
                @else{{ '' }} @endif"><br>
            </div>

            <div class="col-6">
                <label class="form-label">Telefone</label><br>
                <input type="text" name="telefone" class="form-control"
                    value="@if (!empty($dado->telefone)) {{ $dado->telefone }}
                @elseif (!empty(old('telefone'))){{ old('telefone') }}
                @else{{ '' }} @endif"><br>
            </div>

            <div class="col-6">
                <label class="form-label">Nota</label><br>
                <input type="text" name="notaAluno" class="form-control"
                    value="@if (!empty($dado->notaAluno)) {{ $dado->notaAluno }}
                @elseif (!empty(old('notaAluno'))){{ old('notaAluno') }}
                @else{{ '' }} @endif"><br>
            </div>


            <div class="col-6">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ url('aluno') }}" class="btn btn-light">Voltar</a></button>
            </div>
        </form>

    </div>

@stop
