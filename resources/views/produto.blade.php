@extends('layouts.main')

@section('title', 'HDC DEPOSITO:PRODUTOS')

@section('content')
<div id="editModal" class="modal">
    <div class="modal-content">
        <a class="position-absolute top-0 start-100 translate-middle" onclick="closeEditModal()">
            <ion-icon id="btEditClose" name="close" style="font-size: 2rem;"></ion-icon>
        </a>
        <h2>Editar Produto</h2>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <label for="nome" class="form-label">Nome:</label>
            <input class="form-label" type="text" name="nome" id="edit-nome"><br>
            <label class="form-label" for="quantidade">quantidade:</label>
            <input class="form-label" type="text" name="quantidade" id="edit-quantidade">
            <label class="form-label" for="preco">preco:</label>
            <input class="form-label" type="text" name="preco" id="edit-preco">
            <button class="btn btn-success" type="submit">Salvar Alteracoes</button>
        </form>
    </div>
</div>


<div id="modal" class="modal">
  <div class="modal-content"><a class="position-absolute top-0 start-100 translate-middle" onclick="closeModal()"><ion-icon id="btDelete" name="close" style="font-size: 2rem;"></ion-icon></a> <h2>Cadastro</h2> 
    <form action="{{ route('produtos.store') }}" method="POST">
    @csrf 
    <label for="nome" class="form-label">Nome:</label> 
    <input class="form-label" type="text" name="nome" id="nome"><br> 
    <label class="form-label" for="funcao">quantidade:</label> 
    <input class="form-label" type="text" name="quantidade" id="quantidade"> 
    <label class="form-label" for="funcao">preco:</label> 
    <input class="form-label" type="text" name="preco" id="preco"> 
    <button class="btn btn-success" type="submit">Adicionar
      Pessoa</button>
      </form> 
      </div>
  </div>
<table>
  <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Quantidade Disponivel</th>
    <th>Preço Unitario(R$)</th>
     @foreach ($produtos as $produto) <tr>
      <td>{{ $produto->id }}</td>
      <td>{{ $produto->nome }}</td>
      <td>{{ $produto->quantidade }}</td>
      <td>{{ $produto->preco }}</td>
      <td class="acoes"> 
        <div class="acoes2">
          <a onclick="openModal()"><ion-icon id="btAdd" name="add" style="font-size: 1rem;"></ion-icon></a> 
          <a onclick="openEditModal({{ $produto}})"
          class='btoes-acoes'><ion-icon id="btEdit" name="create" style="font-size: 1.2rem;"></ion-icon></a> <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST"
          class='btoes-acoes'>
          @csrf
          @method('DELETE')
          <button type="submit"><ion-icon id="btDelete" name="close" style="font-size: 1rem;"></ion-icon></button>
          </form>
        </div>

</td>
</tr>
@endforeach
</table>

<script>
    coopenModalButton = document.getElementById('openModalButton');
  const modal = document.getElementById('modal');

  function openModal() { 
      modal.style.display = 'block';  
    }


  function closeModal() {
    modal.style.display =   'none';
  }

window.addEventListener('click', (event) => {
  if (event.target === modal) {
    closeModal();
  }
});

function openEditModal(produto) {
    id = produto.id;
    nome = produto.nome;
    quantidade = produto.quantidade;
    preco = produto.preco;

    document.getElementById('edit-nome').value = nome;
    document.getElementById('edit-quantidade').value = quantidade;
    document.getElementById('edit-preco').value = preco;
    document.getElementById('editForm').action = `{{ route('produtos.update', '') }}/${id}`;
    
    editModal.style.display = 'block'; 
}




function closeEditModal() {
  editModal.style.display = 'none';
}
</script>
@endsection