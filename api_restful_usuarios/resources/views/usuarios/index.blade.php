<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div id="alert" class="alert d-none w-50 mx-auto mt-3"></div>

    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center">
                <h1 class="mt-4 d-flex justify-content-center">Visualizar usuários</h1>
                <div class="ms-4 mt-2">
                    <a href="/usuarios/create" class="btn btn-secondary mt-4">Criar Usuário</a>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column align-items-center">
        <button class="btn btn-primary mt-5" onclick="carregarUsuarios()">Carregar Usuários</button>
        <ul class="list-group mt-3 w-50" id="lista"></ul>
    </div>

    <script>
        async function deletarUsuario(id) {
            if (!confirm('Tem certeza que deseja excluir este usuário?')) {
                return;
            }

            try {
                const response = await fetch(`/api/usuarios/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                const result = await response.json();

                if (!response.ok) {
                    showAlert(result.message ?? 'Erro ao excluir usuário', 'danger');
                    return;
                }

                // 🔥 REMOVE DA TELA NA HORA
                const item = document.getElementById(`usuario-${id}`);
                if (item) {
                    item.remove();
                }

                showAlert(result.message, 'success');

            } catch (error) {
                showAlert('Erro de conexão com a API', 'danger');
            }
        }


        function carregarUsuarios() {
            fetch('/api/usuarios')
                .then(res => res.json())
                .then(usuarios => {
                    const lista = document.getElementById('lista');
                    lista.innerHTML = '';

                    usuarios.forEach(usuario => {
                        lista.innerHTML += `
                            <li id="usuario-${usuario.id}" 
                                class="d-flex justify-content-between align-items-center list-group-item">
                                
                                <span>${usuario.nome} - ${usuario.email}</span>

                                <div>
                                    <a class="btn btn-primary btn-sm"
                                    href="/usuarios/${usuario.id}/edit">
                                        Editar
                                    </a>

                                    <button class="btn btn-danger btn-sm ms-2"
                                            onclick="deletarUsuario(${usuario.id})">
                                        Deletar
                                    </button>
                                </div>
                            </li>
                        `;
                    });
                });
        }

    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>