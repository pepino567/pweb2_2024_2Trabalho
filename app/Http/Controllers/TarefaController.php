<?php

// app/Http/Controllers/TarefaController.php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index(Request $request)
    {
        $query = Tarefa::query();
        if ($request->has('txt_pesquisa')) {
            $search = $request->get('txt_pesquisa');
            $query->where('tituloTarefa', 'like', "%{$search}%")
                  ->orWhere('descricaoTarefa', 'like', "%{$search}%")
                  ->orWhere('dataConclusaoTarefa', 'like', "%{$search}%")
                  ->orWhere('horaConclusaoTarefa', 'like', "%{$search}%");
        }
        $tarefas = $query->paginate(10);
        return view('tarefas.index', compact('tarefas'));
    }

    public function create()
    {
        return view('tarefas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tituloTarefa' => 'required|string',
            'dataConclusaoTarefa' => 'required|string',
            'descricaoTarefa' => 'required|string',
            'notaTarefa' => 'required|numeric',
            'horaConclusaoTarefa' => 'required|string',
        ]);

        Tarefa::create($request->all());

        return redirect()->route('tarefas.index')->with('success', 'Tarefa adicionado com sucesso.');
    }

    public function edit(Tarefa $tarefa)
    {
        return view('tarefas.edit', compact('tarefa'));
    }

    public function update(Request $request, Tarefa $tarefa)
    {
        $request->validate([
            'tituloTarefa' => 'required|string',
            'dataConclusaoTarefa' => 'required|string',
            'descricaoTarefa' => 'required|string',
            'notaTarefa' => 'required|numeric',
            'horaConclusaoTarefa' => 'required|string',
        ]);

        $tarefa->update($request->all());

        return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizado com sucesso.');
    }

    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return redirect()->route('tarefas.index')->with('success', 'Tarefa excluído com sucesso.');
    }
}
