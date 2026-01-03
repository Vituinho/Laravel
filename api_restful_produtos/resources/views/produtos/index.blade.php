<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                </tr>
            </thead>
            <tbody id="lista">
                
            </tbody>
        </table>

    </div>

</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                    </tr>
                `
            })
        })
</script>