@extends('layouts.main')

@section('title', 'HDC DEPOSITO: CADASTRO DE FORNECEDORES')

@section('content')
    <div id="editModal" class="modal">
        <div class="modal-content">
            <a class="position-absolute top-0 start-100 translate-middle" onclick="closeEditModal()">
                <ion-icon id="btEditClose" name="close" style="font-size: 2rem;"></ion-icon>
            </a>
            <h2>Editar Fornecedor</h2>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <label for="nome" class="form-label">Nome:</label>
                <input class="form-label" type="text" name="nome" id="edit-nome"><br>
                <label class="form-label" for="contato">Contato:</label>
                <input class="form-label" type="text" name="contato" id="edit-contato"><br>
                <label class="form-label" for="endereco">Endereço:</label>
                <input class="form-label" type="text" name="endereco" id="edit-endereco"><br>
                <label class="form-label" for="telefone">Telefone:</label>
                <input class="form-label" type="text" name="telefone" id="edit-telefone"><br>
                <label class="form-label" for="email">Email:</label>
                <input class="form-label" type="text" name="email" id="edit-email"><br>
                <button class="btn btn-success" type="submit">Salvar Alterações</button>
            </form>
        </div>
    </div>

    <div id="modal" class="modal">
        <div class="modal-content">
            <a class="position-absolute top-0 start-100 translate-middle" onclick="closeModal()">
                <ion-icon id="btDelete" name="close" style="font-size: 2rem;"></ion-icon>
            </a>
            <h2>Cadastro de Fornecedor</h2>
            <form action="{{ route('fornecedores.store') }}" method="POST">
                @csrf
                <label for="nome" class="form-label">Nome:</label>
                <input class="form-label" type="text" name="nome" id="nome"><br>
                <label class="form-label" for="contato">Contato:</label>
                <input class="form-label" type="text" name="contato" id="contato"><br>
                <label class="form-label" for="endereco">Endereço:</label>
                <input class="form-label" type="text" name="endereco" id="endereco"><br>
                <label class="form-label" for="telefone">Telefone:</label>
                <input class="form-label" type="text" name="telefone" id="telefone"><br>
                <label class="form-label" for="email">Email:</label>
                <input class="form-label" type="text" name="email" id="email"><br>
                <button class="btn btn-success" type="submit">Adicionar Fornecedor</button>
            </form>
        </div>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Contato</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>Email</th>
        </tr>
        @foreach ($fornecedores as $fornecedor)
            <tr>
                <td>{{ $fornecedor->id }}</td>
                <td>{{ $fornecedor->nome }}</td>
                <td>{{ $fornecedor->contato }}</td>
                <td>{{ $fornecedor->endereco }}</td>
                <td>{{ $fornecedor->telefone }}</td>
                <td>{{ $fornecedor->email }}</td>
                <td class="acoes">
                    <div class="acoes2">
                        <a onclick="openModal()">
                            <ion-icon id="btAdd" name="add" style="font-size: 1rem;"></ion-icon>
                        </a>
                        <a onclick="openEditModal({{ $fornecedor }})" class="btoes-acoes">
                            <ion-icon id="btEdit" name="create" style="font-size: 1.2rem;"></ion-icon>
                        </a>
                        <form action="{{ route('fornecedores.destroy', $fornecedor->id) }}" method="POST" class="btoes-acoes">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <ion-icon id="btDelete" name="close" style="font-size: 1rem;"></ion-icon>
                            </button>
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
            modal.style display = 'block';
        }

        function closeModal() {
            modal.style display = 'none';
        }

        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                closeModal();
            }
        });

        const editModal = document.getElementById('editModal');

        function openEditModal(fornecedor) {
            id = fornecedor.id;
            nome = fornecedor.nome;
            contato = fornecedor.contato;
            endereco = fornecedor.endereco;
            telefone = fornecedor.telefone;
            email = fornecedor.email;

            document.getElementById('edit-nome').value = nome;
            document.getElementById('edit-contato').value = contato;
            document.getElementById('edit-endereco').value = endereco;
            document.getElementById('edit-telefone').value = telefone;
            document.getElementById('edit-email').value = email;
            document.getElementById('editForm').action = `{{ route('fornecedores.update', '') }}/${id}`;

            editModal.style.display = 'block';
        }

        function closeEditModal() {
            editModal.style.display = 'none';
        }
    </script>
@endsection
