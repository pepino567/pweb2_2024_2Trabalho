@extends('base')
@section('titulo', 'Formulario Aluno')
@section('conteudo')

<h3>Listagem alunos</h3>
<div class="row-4"><
    <form action="{{route('aluno.search')}}" method="post">
        @csrf
        <div class="row">

                <div class="col-3">
                    <select name="tipo" class="form-select">

                    <option value="nome">Nome</option>
                    <option value="cpf">CPF</option>
                    <option value="telefone">Telefone</option>
                </select>
            </div>
<div class="col-5">
    <input type="text" name="valor" class="form-control">
</div>

<div class="col-4">
<button type="submit" class="btn btn-primary">Buscar</button>
<a class="btn btn-success" href="{{ url('aluno/create') }}">
</div>
</form>
</div>
<table class="table table-stripied table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Imagem</th>
        <th scope="col">Nome</th>
        <th scope="col">CPF</th>
        <th scope="col">Telefone</th>
        <th scope="col">Categoria</th>
        <th scope="col">Ação</th>
        <th scope="col">Ação</th>
      </tr>
    </thead>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Ação</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dados as $item )
            <tr>

@php
$nome_imagem = !empty($dado->imagem) ? $dado->imagem : "sem_imagem.jpg";

@endphp
<td><img src="/storage/{{$nome_imagem}}" width="80px" alt="imagem"></td>
                <td>{{$item->id}}</td>
                <td>{{$item->nome}}</td>
                <td>{{$item->cpf}}</td>
                <td>{{$item->telefone}}</td>
                <td>{{$item->categoria->nome ?? ''}}</td>
                <td><a href="{{route('aluno.edit',$item->id)}}">Editar</a></td>
                <td>

<form action="{{route('aluno.destroy',$item->id)}}" method="post">
    @method('DELETE')
    @csrf
    <button type="submit" onclick="return confirm('Deseja remover o registro?')">DELETE</button>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop
