<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produto', compact('produtos'));
    }

    public function create()
    {
        return view('produto.create');
    }

    public function store(Request $request)
    {
        $produto = new Produto();
        $produto->nome = $request->input('nome');
        $produto->quantidade = $request->input('quantidade');
        $produto->preco = $request->input('preco');
        $produto->save();

        return redirect()->route('produtos.index');
    }

    public function edit($id)
    {
        $produto = Produto::find($id);

        if ($produto) {
            return view('produto.edit', compact('produto'));
        } else {
            return redirect()->route('pagina_de_erro');
        }
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->nome = $request->input('nome');
        $produto->quantidade = $request->input('quantidade');
        $produto->preco = $request->input('preco');
        $produto->save();

        return redirect()->route('produtos.index');
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect()->route('produtos.index');
    }
}
