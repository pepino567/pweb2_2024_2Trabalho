<?php

// app/Http/Controllers/AlunoController.php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index(Request $request)
    {
        $query = Aluno::query();
        if ($request->has('txt_pesquisa')) {
            $search = $request->get('txt_pesquisa');
            $query->where('nomeAluno', 'like', "%{$search}%")
                  ->orWhere('telefoneAluno', 'like', "%{$search}%")
                  ->orWhere('cpfAluno', 'like', "%{$search}%")
                  ->orWhere('turma', 'like', "%{$search}%");
        }
        $dados = $query->paginate(10);


        return view('alunos.list', compact('dados'));
    }

    public function create()
    {
        return view('alunos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomeAluno' => 'required|string',
            'cpfAluno' => 'required|string',
            'telefoneAluno' => 'required|string',
            'notaAluno' => 'required|numeric',
            'turma' => 'required|string',
        ]);

        Aluno::create($request->all());

        return redirect()->route('alunos.list')->with('success', 'Aluno adicionado com sucesso.');
    }

    public function edit(Aluno $aluno)
    {
        return view('alunos.edit', compact('aluno'));
    }

    public function update(Request $request, Aluno $aluno)
    {
        $request->validate([
            'nomeAluno' => 'required|string',
            'cpfAluno' => 'required|string',
            'telefoneAluno' => 'required|string',
            'notaAluno' => 'required|numeric',
            'turma' => 'required|string',
        ]);

        $aluno->update($request->all());

        return redirect()->route('alunos.list')->with('success', 'Aluno atualizado com sucesso.');
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
        return redirect()->route('alunos.list')->with('success', 'Aluno excluído com sucesso.');
    }
}
