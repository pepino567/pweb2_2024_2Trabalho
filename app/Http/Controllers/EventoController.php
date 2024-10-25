<?php

// app/Http/Controllers/EventoController.php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index(Request $request)
    {
        $query = Evento::query();
        if ($request->has('txt_pesquisa')) {
            $search = $request->get('txt_pesquisa');
            $query->where('tituloEvento', 'like', "%{$search}%")
                  ->orWhere('descricaoEvento', 'like', "%{$search}%")
                  ->orWhere('dataInicioEvento', 'like', "%{$search}%")
                  ->orWhere('horaInicioEvento', 'like', "%{$search}%")
                  ->orWhere('dataFimEvento', 'like', "%{$search}%")
                  ->orWhere('horaFimEvento', 'like', "%{$search}%");
        }
        $eventos = $query->paginate(10);
        return view('eventos.index', compact('eventos'));
    }

    public function create()
    {
        return view('eventos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tituloEvento' => 'required|string',
            'dataInicioEvento' => 'required|string',
            'descricaoEvento' => 'required|string',
            'horaInicioEvento' => 'required|string',
            'dataFimEvento' => 'required|string',
            'horaFimEvento' => 'required|string',
        ]);

        Evento::create($request->all());

        return redirect()->route('eventos.index')->with('success', 'Evento adicionado com sucesso.');
    }

    public function edit(Evento $evento)
    {
        return view('eventos.edit', compact('evento'));
    }

    public function update(Request $request, Evento $evento)
    {
        $request->validate([
            'tituloEvento' => 'required|string',
            'dataInicioEvento' => 'required|string',
            'descricaoEvento' => 'required|string',
            'horaInicioEvento' => 'required|numeric',
            'dataFimEvento' => 'required|numeric',
            'horaFimEvento' => 'required|numeric',
        ]);

        $evento->update($request->all());

        return redirect()->route('eventos.index')->with('success', 'Evento atualizado com sucesso.');
    }

    public function destroy(Evento $evento)
    {
        $evento->delete();
        return redirect()->route('eventos.index')->with('success', 'Evento excluído com sucesso.');
    }
}
