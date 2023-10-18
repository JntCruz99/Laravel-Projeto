<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;

class PessoaController extends Controller
{
    public function index()
    {
        $pessoas = Pessoa::all();
        return view('Pessoa', compact('pessoas'));
    }

    public function create()
    {
        return view('Pessoa.create');
    }

    public function store(Request $request)
    {
        $pessoa = new Pessoa();
        $pessoa->nome = $request->input('nome');
        $pessoa->funcao = $request->input('funcao');
        $pessoa->save();

        return redirect()->route('pessoas.index');
    }

    public function edit($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        return view('Pessoa.edit', compact('pessoa'));
    }

    public function update(Request $request, $id)
    {
        $pessoa = Pessoa::findOrFail($id);
        $pessoa->nome = $request->input('nome');
        $pessoa->funcao = $request->input('funcao');
        $pessoa->save();

        return redirect()->route('pessoas.index');
    }

    public function destroy($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        $pessoa->delete();

        return redirect()->route('pessoas.index');
    }
}
