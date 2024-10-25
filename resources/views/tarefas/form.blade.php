@extends('base')
@section('titulo', 'Formulário Tarefa')
@section('conteudo')
    <h3>Formulário Tarefa</h3>

    @php
        if (!empty($dado->id)) {
            $route = route('tarefa.update', $dado->id);
        } else {
            $route = route('tarefa.store');
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
                <label class="form-label">Tarefa</label><br>
                <input type="text" name="tituloTarefa" class="form-control"
                    value="@if (!empty($dado->tituloTarefa)) {{ $dado->tituloTarefa }}
                    @elseif (!empty(old('tituloTarefa'))){{ old('notarefame') }}
                    @else{{ '' }} @endif"><br>
            </div>

            <div class="col-6">
                <label class="form-label">Descrição</label><br>
                <input type="text" name="descricaoTarefa" class="form-control"
                    value="@if (!empty($dado->descricaoTarefa)) {{ $dado->descricaoTarefa }}
                @elseif (!empty(old('descricaoTarefa'))){{ old('descricaoTarefa') }}
                @else{{ '' }} @endif"><br>
            </div>

            <div class="col-6">
                <label class="form-label">Data Conclusão</label><br>
                <input type="text" name="dataConclusaoTarefa" class="form-control"
                    value="@if (!empty($dado->dataConclusaoTarefa)) {{ $dado->dataConclusaoTarefa }}
                @elseif (!empty(old('dataConclusaoTarefa'))){{ old('dataConclusaoTarefa') }}
                @else{{ '' }} @endif"><br>
            </div>


            <div class="col-6">
                <label class="form-label">Hora Conclusão</label><br>
                <input type="text" name="horaConclusaoTarefa" class="form-control"
                    value="@if (!empty($dado->horaConclusaoTarefa)) {{ $dado->horaConclusaoTarefa }}
                @elseif (!empty(old('horaConclusaoTarefa'))){{ old('horaConclusaoTarefa') }}
                @else{{ '' }} @endif"><br>
            </div>

            <div class="col-6">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ url('aluno') }}" class="btn btn-light">Voltar</a></button>
            </div>
        </form>

    </div>

@stop
