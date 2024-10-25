@extends('base')
@section('titulo', 'Listagem Tarefa')
@section('conteudo')

    <h3>Listagem Tarefa</h3>
    <div class="row mb-4">
        <form action="{{ route('tarefa.search') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-3">
                    <select name="tipo" class="form-select">
                        <option value="idTarefas">ID</option>
                        <option value="tituloTarefa">TAREFA</option>
                        <option value="descricaoTarefa">DSECRICAO TAREFA</option>
                        <option value="dataConclusaoTarefa">DATA CONCLUSAO</option>
                        <option value="horaConclusaoTarefa">HORA CONCLUSAO</option>
                    </select>
                </div>
                <div class="col-5">
                    <input type="text" name="valor" class="form-control">
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a class="btn btn-success" href="{{ url('tarefa/create') }}">Novo</a>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">idTarefa</th>
                    <th scope="col">tituloTarefa</th>
                    <th scope="col">descricaoTarefa</th>
                    <th scope="col">dataConclusaoTarefa</th>
                    <th scope="col">horaConclusaoTarefa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->idTarefa }}</td>
                        <td>{{ $item->tituloTarefa }}</td>
                        <td>{{ $item->descricaoTarefa }}</td>
                        <td>{{ $item->dataConclusaoTarefa }}</td>
                        <td>{{ $item->horaConclusaoTarefa }}</td>
                        <td><a href="{{ route('tarefa.edit', $item->id) }}">Editar</a></td>
                        <td>
                            <form action=" {{ route('tarefa.destroy', $item->id) }}" method="post">
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
