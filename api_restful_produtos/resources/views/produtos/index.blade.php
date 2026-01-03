<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Produtos</h1>
        <a href="/produtos/create" class="btn btn-primary mb-3">Novo Produto</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="lista">
                
            </tbody>
        </table>

    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>

<script>
    fetch('/api/produtos')
        .then(res => res.json())
        .then(produtos => {
            const lista = document.getElementById('lista');
            lista.innerHTML = '';

            produtos.forEach(produto => {
                lista.innerHTML += `
                    <tr>
                        <td>${produto.id}</td>
                        <td>${produto.nome}</td>
                        <td>${produto.preco}</td>
                        <td>
                            <a href="/produtos/${produto.id}/edit" class="btn btn-warning btn-sm">Editar</a>
                            <button onclick="deletarProduto(${produto.id})" class="btn btn-danger btn-sm">Deletar</button>
                        </td>
                    </tr>
                `
            })
        })
</script>