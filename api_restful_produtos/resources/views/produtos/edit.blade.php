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
        <h1 class="mb-4">Editar Produtos</h1>
        <a href="/produtos" class="btn btn-primary mb-3">Listar Produtos</a>

        <form id="form" class="mt-4">
            @csrf

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço:</label>
                <input type="number" step="0.01" class="form-control" id="preco" name="preco" required>
            </div>

            <button type="submit" class="btn btn-success mt-2">Salvar</button>
        </form>

    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>

<script>
    const id = window.location.pathname.split('/')[2];
    const form = document.getElementById('form');

    fetch(`/api/produtos/${id}`)
        .then(res => res.json())
        .then(produto => {
            form.nome.value = produto.nome;
            form.preco.value = produto.preco;
        })
        .catch(() => alert('Erro ao carregar produto'));

    form.addEventListener('submit', async(e) =>{
        e.preventDefault();

        try {
            const response = await fetch(`/api/produtos/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    nome: form.nome.value,
                    preco: form.preco.value
                })  
            })

            const result = await response.json();

            if (response.ok) {
                alert('Produto editado com sucesso!');
                window.location.href = '/produtos';
            } else {
                alert('Erro ao editar produto: ' + result.message);
            }
        } catch (error) {
            alert('Erro na requisição: ' + error.message);
        }
    });
</script>