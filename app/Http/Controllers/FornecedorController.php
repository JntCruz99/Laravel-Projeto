<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedor::all();
        return view('fornecedor', compact('fornecedores'));
    }

    public function create()
    {
        return view('fornecedor.create');
    }

    public function store(Request $request)
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = $request->input('nome');
        $fornecedor->contato = $request->input('contato');
        $fornecedor->endereco = $request->input('endereco');
        $fornecedor->telefone = $request->input('telefone');
        $fornecedor->email = $request->input('email');
        $fornecedor->save();

        return redirect()->route('fornecedores.index');
    }

    public function edit($id)
    {
        $fornecedor = Fornecedor::find($id);

        if ($fornecedor) {
            return view('fornecedor.edit', compact('fornecedor'));
        } else {
            return redirect()->route('pagina_de_erro');
        }
    }

    public function update(Request $request, $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->nome = $request->input('nome');
        $fornecedor->contato = $request->input('contato');
        $fornecedor->endereco = $request->input('endereco');
        $fornecedor->telefone = $request->input('telefone');
        $fornecedor->email = $request->input('email');
        $fornecedor->save();

        return redirect()->route('fornecedores.index');
    }

    public function destroy($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->delete();

        return redirect()->route('fornecedores.index');
    }
}
