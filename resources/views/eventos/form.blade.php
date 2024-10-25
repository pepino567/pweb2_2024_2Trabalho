@extends('base')
@section('titulo', 'Formulário Aluno')
@section('conteudo')
    <h3>Formulário Evento</h3>

    @php
        if (!empty($dado->id)) {
            $route = route('evento.update', $dado->id);
        } else {
            $route = route('evento.store');
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
                <label class="form-label">Evento</label><br>
                <input type="text" name="tituloEvento" class="form-control"
                    value="@if (!empty($dado->tituloEvento)) {{ $dado->tituloEvento }}
                    @elseif (!empty(old('tituloEvento'))){{ old('tituloEvento') }}
                    @else{{ '' }} @endif"><br>
            </div>

            <div class="col-6">
                <label class="form-label">Descrição</label><br>
                <input type="text" name="descricaoEvento" class="form-control"
                    value="@if (!empty($dado->descricaoEvento)) {{ $dado->descricaoEvento }}
                @elseif (!empty(old('descricaoEvento'))){{ old('descricaoEvento') }}
                @else{{ '' }} @endif"><br>
            </div>

            <div class="col-6">
                <label class="form-label">Data Inicio Evento</label><br>
                <input type="text" name="dataInicioEvento" class="form-control"
                    value="@if (!empty($dado->dataInicioEvento)) {{ $dado->dataInicioEvento }}
                @elseif (!empty(old('dataInicioEvento'))){{ old('dataInicioEvento') }}
                @else{{ '' }} @endif"><br>
            </div>

            <div class="col-6">
                <label class="form-label">Hora Inicio Evento</label><br>
                <input type="text" name="horaInicioEvento" class="form-control"
                    value="@if (!empty($dado->horaInicioEvento)) {{ $dado->horaInicioEvento }}
                @elseif (!empty(old('horaInicioEvento'))){{ old('horaInicioEvento') }}
                @else{{ '' }} @endif"><br>
            </div>

            <div class="col-6">
                <label class="form-label">Data Fim Evento</label><br>
                <input type="text" name="dataFimEvento" class="form-control"
                    value="@if (!empty($dado->dataFimEvento)) {{ $dado->dataFimEvento }}
                @elseif (!empty(old('dataFimEvento'))){{ old('dataFimEvento') }}
                @else{{ '' }} @endif"><br>
            </div>

            <div class="col-6">
                <label class="form-label">Hora Fim Evento</label><br>
                <input type="text" name="horaFimEvento" class="form-control"
                    value="@if (!empty($dado->horaFimEvento)) {{ $dado->horaFimEvento }}
                @elseif (!empty(old('horaFimEvento'))){{ old('horaFimEvento') }}
                @else{{ '' }} @endif"><br>
            </div>


            <div class="col-6">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ url('aluno') }}" class="btn btn-light">Voltar</a></button>
            </div>
        </form>

    </div>

@stop
