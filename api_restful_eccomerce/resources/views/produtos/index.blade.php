<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="justify-content-between d-flex">
            <h1>Produtos</h1>
            <a href="/produtos/create" class="btn btn-primary align-self-center">Cadastrar Produto</a>
        </div>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Nome do Usuário</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="produto-list">
                
            </tbody>
        </table>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>

<script>
    const token = document.cookie.split('; ').find(row => row.startsWith('auth_token=')).split('=')[1];

    async function DeletarProduto(e, produtoId) {
        e.preventDefault();
        if (confirm('Tem certeza que deseja excluir este produto?')) {
            let deleteResponse = await fetch(`http://localhost:8000/api/produtos/${produtoId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'Authorization': `Bearer ${token}`
                }
            });

            if (deleteResponse.ok) {
                alert('Produto excluído com sucesso.');
                window.location.reload();
            } else {
                alert('Erro ao excluir o produto.');
            }
        }
    }

    document.addEventListener('DOMContentLoaded', async () => {

        let userResponse = await fetch('http://localhost:8000/api/user', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': `Bearer ${token}`
            }
        });

        let usuarioAutenticado = await userResponse.json();

        let response = await fetch('http://localhost:8000/api/produtos', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': `Bearer ${token}`
            }
        });

        let produtos = await response.json();
        let produtoList = document.getElementById('produto-list');

        produtos.forEach(produto => {
            let row = document.createElement('tr');

            let isOwner = usuarioAutenticado.id === produto.user_id;
            let acoes = '';

            if (isOwner) {
                acoes = `
                    <a href="/produtos/${produto.id}/edit" class="btn btn-sm btn-primary">Editar</a>
                    <button onclick="DeletarProduto(event, ${produto.id})" class="btn btn-sm btn-danger">Excluir</button>
                `;
            } else {
                acoes = '<span class="text-muted">Nenhuma ação disponível</span>';
            }

            row.innerHTML = `
                <td>${produto.id}</td>
                <td>${produto.nome}</td>
                <td>${produto.descricao}</td>
                <td>${produto.preco}</td>
                <td>${produto.user.name}</td>
                <td>
                    ${acoes}
                </td>
            `;
            produtoList.appendChild(row);
        });
    });
</script>