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
    document.addEventListener('DOMContentLoaded', async () => {
        const token = document.cookie.split('; ').find(row => row.startsWith('auth_token=')).split('=')[1];

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
            row.innerHTML = `
                <td>${produto.id}</td>
                <td>${produto.nome}</td>
                <td>${produto.descricao}</td>
                <td>${produto.preco}</td>
                <td>${produto.user.name}</td>
                <td>
                <a href="/produtos/${produto.id}/edit" class="btn btn-sm btn-primary">Editar</a>
                <a href="/produtos/${produto.id}/delete" class="btn btn-sm btn-danger">Excluir</a>
                </td>
            `;
            produtoList.appendChild(row);
        });
    });
</script>