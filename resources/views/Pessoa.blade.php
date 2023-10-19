@extends('layouts.main')

@section('title', 'HDC DEPOSITO:CADASTRO')

@section('content')
<div id="editModal" class="modal">
    <div class="modal-content">
        <a class="position-absolute top-0 start-100 translate-middle" onclick="closeEditModal()">
            <ion-icon id="btEditClose" name="close" style="font-size: 2rem;"></ion-icon>
        </a>
        <h2>Editar Pessoa</h2>
        @if(isset($pessoa))
    <form action="{{ route('pessoas.update', $pessoa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="nome" value="{{ $pessoa->nome }}">
        <input type="hidden" name="funcao" value="{{ $pessoa->funcao }}">
        <button class="btn btn-success" type="submit">Salvar Alteracoes</button>
    </form>
@endif
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
  </div> <!-- Lista de Pessoas --> <table>
  <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Função</tr> @foreach ($pessoas as $pessoa) <tr>
      <td>{{ $pessoa->id }}</td>
      <td>{{ $pessoa->nome }}</td>
      <td>{{ $pessoa->funcao }}</td> 
      <td class="acoes"> 
        <div class="acoes2">
          <a onclick="openModal()"><ion-icon id="btAdd" name="add" style="font-size: 1rem;"></ion-icon></a> 
          <a onclick="openEditModal({{ $pessoa->id }})"
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

function openEditModal(clientId) {
    console.log('ID do Cliente:', clientId);
    $.ajax({
        type: "GET",
        url: "/findUserById/" + clientId,
        dataType: "json",
        success: function(response) {
            if (response.error) {
              console.error("Erro: " + response.error);
            } else {
              console.log("Usuário encontrado: ", response);
            }
        },
        error: function(error) {
            console.error("Erro na requisição: ", error);
        }
    });
    editModal.style.display = 'block'; 
}


function closeEditModal() {
  editModal.style.display = 'none';
}

</script>


@endsection