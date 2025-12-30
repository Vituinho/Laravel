<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Criar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

<h1 class="mt-4 d-flex justify-content-center">Cadastrar usuário</h1>

<form class="d-flex justify-content-center flex-column align-items-center mt-3" id="formUsuario">
    <input class="form-control w-25 mt-2" type="text" name="nome" placeholder="Nome" required>
    <input class="form-control w-25 mt-2" type="email" name="email" placeholder="Email" required>
    <button class="btn btn-primary mt-2" type="submit">Salvar</button>
</form>

<p id="msg"></p>

<script>
    const form = document.getElementById('formUsuario');
    const msg = document.getElementById('msg');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const dados = {
            nome: form.nome.value,
            email: form.email.value
        };

        try {
            const response = await fetch('/api/usuarios', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(dados)
            });

            const result = await response.json();

            if (!response.ok) {
                msg.innerText = result.message ?? 'Erro ao cadastrar';
                msg.style.color = 'red';
                return;
            }

            msg.innerText = 'Usuário cadastrado com sucesso!';
            msg.style.color = 'green';
            form.reset();

        } catch (error) {
            msg.innerText = 'Erro de conexão com a API';
            msg.style.color = 'red';
        }
    });
</script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>