<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Produto;

class VendaController extends Controller
{
    public function index()
{
    $vendas = Venda::all(); // Carrega todas as vendas

    $produtos = Produto::all(); // Carrega todos os produtos

    return view('venda', compact('vendas', 'produtos'));
}

    public function store(Request $request)
    {
        $request->validate([
            'produto_id' => 'required',
            'quantidade' => 'required|numeric|min:1',
        ]);

        $produto = Produto::find($request->produto_id);
        if (!$produto) {
            return redirect()->route('vendas.create')->with('error', 'Produto não encontrado.');
        }

        $venda = new Venda();
        $venda->produto_id = $request->produto_id;
        $venda->quantidade = $request->quantidade;
        $venda->total = $this->calcularTotal($produto->preco, $request->quantidade);
        $venda->save();

        return redirect()->route('vendas.index')->with('success', 'Venda registrada com sucesso.');
    }

    public function calcularTotal($preco, $quantidade)
    {
        return $preco * $quantidade;
    }
}
