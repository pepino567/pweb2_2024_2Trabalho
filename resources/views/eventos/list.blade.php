@extends('base')
@section('titulo', 'Listagem Evestos')
@section('conteudo')

    <h3>Listagem Eventos</h3>
    <div class="row mb-4">
        <form action="{{ route('eventos.search') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-3">
                    <select name="tipo" class="form-select">
                        <option value="tituloEvento">Evento</option>
                        <option value="descricaoEvento">Descrição</option>
                        <option value="dataInicioEvento">Data Inicio Evento</option>
                        <option value="horaInicioEvento">Hora Inicio Evento</option>
                        <option value="dataFimEvento">Data Fim Evento</option>
                        <option value="horaFimEvento">Hora Fim Evento</option>
                    </select>
                </div>
                <div class="col-5">
                    <input type="text" name="valor" class="form-control">
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a class="btn btn-success" href="{{ url('aluno/create') }}">Novo</a>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">idEvento</th>
                    <th scope="col">tituloEvento</th>
                    <th scope="col">descricaoEvento</th>
                    <th scope="col">dataInicioEvento</th>
                    <th scope="col">horaInicioEvento</th>
                    <th scope="col">dataFimEvento</th>
                    <th scope="col">horaFimEvento</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->tituloEvento }}</td>
                        <td>{{ $item->descricaoEvento }}</td>
                        <td>{{ $item->dataInicioEvento }}</td>
                        <td>{{ $item->horaInicioEvento }}</td>
                        <td>{{ $item->dataFimEvento }}</td>
                        <td>{{ $item->horaFimEvento }}</td>
                        <td><a href="{{ route('evento.edit', $item->id) }}">Editar</a></td>
                        <td>
                            <form action=" {{ route('evento.destroy', $item->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" onclick="return confirm('Deseja remover o registro?')">
                                    Deletar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
