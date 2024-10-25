@extends('layouts.app')

@section('content')
<header>
    <h3><i class="bi bi-person-plus-fill"></i> {{ $action === 'atualizar' ? 'Editar Aluno' : 'Cadastro de Aluno' }}</h3>
</header>

<form action="{{ $action === 'atualizar' ? route('aluno.update', $aluno->idAlunos) : route('aluno.store') }}" method="post">
    @csrf
    @if($action === 'atualizar')
        @method('PUT')
    @endif
    <div class="form-group">
        <label for="nomeAluno">Nome:</label>
        <input type="text" class="form-control" id="nomeAluno" name="nomeAluno" value="{{ old('nomeAluno', $aluno->nomeAluno ?? '') }}" required>
    </div>
    <div class="form-group">
        <label for="cpfAluno">CPF:</label>
        <input type="text" class="form-control" id="cpfAluno" name="cpfAluno" value="{{ old('cpfAluno', $aluno->cpfAluno ?? '') }}" required>
    </div>
    <div class="form-group">
        <label for="telefoneAluno">Telefone:</label>
        <input type="text" class="form-control" id="telefoneAluno" name="telefoneAluno" value="{{ old('telefoneAluno', $aluno->telefoneAluno ?? '') }}" required>
    </div>
    <div class="form-group">
        <label for="notaAluno">Nota:</label>
        <input type="number" class="form-control" id="notaAluno" name="notaAluno" value="{{ old('notaAluno', $aluno->notaAluno ?? '') }}" required>
    </div>
    <div class="form-group">
        <label for="turma">Turma:</label>
        <input type="text" class="form-control" id="turma" name="turma" value="{{ old('turma', $aluno->turma ?? '') }}" required>
    </div>
    <div class="mb-3">
        <input class="btn btn-success" type="submit" value="{{ $action === 'atualizar' ? 'Atualizar' : 'Adicionar' }}">
    </div>
</form>
@endsection
