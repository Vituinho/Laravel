<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-5">
        <h1>Editar Produto</h1>
        <form id="produto-form">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" required></textarea>
            </div>
            <div class="mb-3">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" step="0.01" class="form-control" id="preco" name="preco" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>

<script>
    const id = window.location.pathname.split('/')[2];
    const form = document.getElementById('produto-form');
    const token = document.cookie.split('; ').find(row => row.startsWith('auth_token=')).split('=')[1];

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

        let produtoResponse = await fetch(`http://localhost:8000/api/produtos/${id}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': `Bearer ${token}`
            }
        });

        let produtoData = await produtoResponse.json();

        // Verificação com comparação numérica
        if (parseInt(usuarioAutenticado.id) !== parseInt(produtoData.user_id)) {
            alert('Você não tem permissão para editar este produto.');
            window.location.href = '/produtos';
            return;
        }

        // Preencher o formulário
        document.getElementById('nome').value = produtoData.nome;
        document.getElementById('descricao').value = produtoData.descricao;
        document.getElementById('preco').value = produtoData.preco;
    });

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = {
            nome: document.getElementById('nome').value,
            descricao: document.getElementById('descricao').value,
            preco: document.getElementById('preco').value
        };

        let response = await fetch(`http://localhost:8000/api/produtos/${id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify(formData)
        });

        if (response.ok) {
            alert('Produto editado com sucesso!');
            window.location.href = '/produtos';
        } else {
            alert('Erro ao editar produto.');
        }
    });

</script>