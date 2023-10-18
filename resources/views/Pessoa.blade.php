@extends('layouts.main')

@section('title', 'HDC DEPOSITO:CADASTRO')

@section('content')
<div id="modal" class="modal">
<div class="modal-content">
  <h2>Cadastro de Cliente</h2>

  <form action="{{ route('pessoas.store') }}" method="POST">
                @csrf
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome"><br>
                <label for="funcao">Função:</label>
                <input type="text" name="funcao" id="funcao">
                <button type="submit">Adicionar Pessoa</button>
            </form>

  <button onclick="closeModal()">Fechar</button>
</div>
</div>
    <!-- Lista de Pessoas -->
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Função</th>
        </tr>
        @foreach ($pessoas as $pessoa)
            <tr>
                <td>{{ $pessoa->id }}</td>
                <td>{{ $pessoa->nome }}</td>
                <td>{{ $pessoa->funcao }}</td>
                <td class= "acoes">
                    <button id="openModalButton">+</button>
                    <a href="{{ route('pessoas.edit', $pessoa->id) }}" class= 'btoes-acoes'>Editar</a>
                    <form action="{{ route('pessoas.destroy', $pessoa->id) }}" method="POST" class= 'btoes-acoes'>
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>   
                </td>
            </tr>
        @endforeach
    </table>

<script>
    const openModalButton = document.getElementById('openModalButton');
const modal = document.getElementById('modal');

openModalButton.addEventListener('click', () => {
  modal.style.display = 'block';
});

// Função para fechar o modal
function closeModal() {
  modal.style.display = 'none';
}

// Fechar o modal quando o usuário clica fora da área do modal
window.addEventListener('click', (event) => {
  if (event.target === modal) {
    closeModal();
  }
});

</script>
    

@endsection
