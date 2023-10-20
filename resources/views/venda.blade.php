@extends('layouts.main')

@section('title', 'HDC DEPOSITO:VENDAS')

@section('content')
<div id="modal" class="modal">
  <div class="modal-content"><a class="position-absolute top-0 start-100 translate-middle" onclick="closeModal()"><ion-icon id="btDelete" name="close" style="font-size: 2rem;"></ion-icon></a>
    <h2>Fazer Venda</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('vendas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="produto_id">Produto:</label>
            <select class="form-control" name="produto_id" id="produto_id">
                @foreach ($produtos as $produto)
                    <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade:</label>
            <input type="number" class="form-control" name="quantidade" id="quantidade" value="1" min="1">
        </div>
        <div class="form-group">
            <label for="total">Total:</label>
            <input type="text" class="form-control" name="total" id="total" value="0" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Registrar Venda</button>
    </form>
</div>
</div>

<table>
  <tr>
    <th>ID</th>
    <th>Produto</th>
    <th>Quantidade</th>
    <th>Preço Unitario(R$)</th>
    <th>Total(R$)</th>
     @foreach ($vendas as $venda) <tr>
      <td>{{ $venda->id }}</td>
      <td>{{ $venda->produto->nome }}</td>
      <td>{{ $venda->quantidade }}</td>
      <td>{{ $venda->produto->preco }}</td>
      <td>{{ $venda->total }}</td>
      <td class="acoes"> 
        <div class="acoes2"  >
          <a style="margin-right: 5px;" onclick="openModal()"><ion-icon id="btAdd" name="add" style="font-size: 1rem;"></ion-icon></a>
        </div>

</td>
</tr>
@endforeach
</table>



    <script>
        document.getElementById('quantidade').addEventListener('input', function () {
            const produto_id = document.getElementById('produto_id').value;
            const quantidade = parseFloat(this.value);
            const preco = parseFloat('{{ $produtos[0]->preco }}'); 
            const total = quantidade * preco;
            document.getElementById('total').value = total.toFixed(2);
        });
        coopenModalButton = document.getElementById('openModalButton');
  const modal = document.getElementById('modal');

  function openModal() { 
      modal.style.display = 'block';  
    }


  function closeModal() {
    modal.style.display =   'none';
  }
    </script>
@endsection