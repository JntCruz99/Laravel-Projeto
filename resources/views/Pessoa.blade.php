@extends('layouts.main')

@section('title', 'HDC DEPOSITO:CADASTRO')

@section('content')
<div id="editModal" class="modal">
    <div class="modal-content">
        <a class="position-absolute top-0 start-100 translate-middle" onclick="closeEditModal()">
            <ion-icon id="btEditClose" name="close" style="font-size: 2rem;"></ion-icon>
        </a>
        <h2>Editar Pessoa</h2>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <label for="nome" class="form-label">Nome:</label>
            <input class="form-label" type="text" name="nome" id="edit-nome"><br>
            <label class="form-label" for="funcao">Função:</label>
            <input class="form-label" type="text" name="funcao" id="edit-funcao">
            <button class="btn btn-success" type="submit">Salvar Alteracoes</button>
        </form>
    </div>
</div>




<div id="modal" class="modal">
  <div class="modal-content"><a class="position-absolute top-0 start-100 translate-middle" onclick="closeModal()"><ion-icon id="btDelete" name="close" style="font-size: 2rem;"></ion-icon></a> <h2>Cadastro</h2> 
    <form action="{{ route('pessoas.store') }}" method="POST">
    @csrf 
    <label for="nome" class="form-label">Nome:</label> 
    <input class="form-label" type="text" name="nome" id="nome"><br> 
    <label class="form-label" for="funcao">Função:</label> 
    <input class="form-label" type="text" name="funcao" id="funcao"> 
    <button class="btn btn-success" type="submit">Adicionar
      Pessoa</button>
      </form> 
  </div>
  </div>
  <table>
  <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Função</tr> @foreach ($pessoas as $index => $pessoa) <tr>
      <td>{{ $pessoa->id }}</td>
      <td>{{ $pessoa->nome }}</td>
      <td>{{ $pessoa->funcao }}</td> 
      <td class="acoes"> 
        <div class="acoes2">
          <a onclick="openModal()"><ion-icon id="btAdd" name="add" style="font-size: 1rem;"></ion-icon></a> 
          <a onclick="openEditModal({{ $pessoa}})"
          class='btoes-acoes'><ion-icon id="btEdit" name="create" style="font-size: 1.2rem;"></ion-icon></a> <form action="{{ route('pessoas.destroy', $pessoa->id) }}" method="POST"
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

const editModal = document.getElementById('editModal');

function openEditModal(pessoa) {
    id = pessoa.id;
    nome = pessoa.nome;
    funcao = pessoa.funcao;

    document.getElementById('edit-nome').value = nome;
    document.getElementById('edit-funcao').value = funcao;
    document.getElementById('editForm').action = `{{ route('pessoas.update', '') }}/${id}`;
    
    editModal.style.display = 'block'; 
}




function closeEditModal() {
  editModal.style.display = 'none';
}

</script>


@endsection