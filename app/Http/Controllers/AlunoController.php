<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\CategoriaFormacao;
use Illuminate\Http\Request;
use Storage;

class AlunoController extends Controller
{
    function index()
    {
        //select * from
        $dados = Aluno::All();

        return view('alunos.list', [
            'dados' => $dados
        ]);
    }

    public function create()
    {
        return view('alunos.create');
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required|max:130|min:3',
                'cpf' => 'required|max:14',
                'telefone' => 'required|max:20',
                'nota' => 'required|max:3',
            ],
            [
                'nome.required' => " O :attribute é obrigatório",
                'nome.max' => " O máximo de caracteres para :attribute é 130",
                'nome.min' => " O mínimo de caracteres para :attribute é 3",
                'cpf.required' => " O :attribute é obrigatório",
                'cpf.max' => " O máximo de caracteres para :attribute é 14",
                'telefone.required' => " O :attribute é obrigatório",
                'telefone.max' => " O máximo de caracteres para :attribute é 20",
                'nota.required' => " O :attribute é obrigatório",
                'nota.max' => " O máximo de caracteres para :attribute é 3",
            ]
        );

        $data = $request->all();

        Aluno::create($data);

        return redirect('aluno');
    }

    function update(Request $request, $id)
    {
        $request->validate(
            [
                'nome' => 'required|max:130|min:3',
                'cpf' => 'required|max:14',
                'telefone' => 'required|max:20',
                'nota' => 'required|max:3',
            ],
            [
                'nome.required' => " O :attribute é obrigatório",
                'nome.max' => " O máximo de caracteres para :attribute é 130",
                'nome.min' => " O mínimo de caracteres para :attribute é 3",
                'cpf.required' => " O :attribute é obrigatório",
                'cpf.max' => " O máximo de caracteres para :attribute é 14",
                'telefone.required' => " O :attribute é obrigatório",
                'telefone.max' => " O máximo de caracteres para :attribute é 20",
                'nota.required' => " O :attribute é obrigatório",
                'nota.max' => " O máximo de caracteres para :attribute é 3",
            ]
        );

        $data = $request->all();

        Aluno::updateOrCreate(
            ['id' => $id],
            $data
        );

        return redirect('aluno');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Aluno::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Aluno::All();
        }
        return view('alunos.list', ['dados' => $dados]);
    }
}
