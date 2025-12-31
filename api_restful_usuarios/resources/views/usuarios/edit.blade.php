<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script>
        const id = {{ $usuario->id }};
    </script>


</head>
<body>

<div id="alert" class="alert d-none w-50 mx-auto mt-3"></div>

<div class="container">
    <div class="row">
        <div class="d-flex justify-content-center">
            <h1 class="mt-4 d-flex justify-content-center">Editar usuário</h1>
            <div class="ms-4 mt-2">
                <a href="/usuarios" class="btn btn-secondary mt-4">Voltar para a lista</a>
            </div>
        </div>
    </div>
</div>



<form class="d-flex justify-content-center flex-column align-items-center mt-3" id="formUsuario">
    <input class="form-control w-25 mt-2" type="text" name="nome" value="{{ $usuario->nome }}" required>
    <input class="form-control w-25 mt-2" type="email" name="email" value="{{ $usuario->email }}" required>
    <button class="btn btn-primary mt-2" type="submit">Salvar</button>
</form>

<script>
    const form = document.getElementById('formUsuario');
    const alertBox = document.getElementById('alert');

    function showAlert(message, type = 'success') {
        alertBox.className = `alert alert-${type} w-50 mx-auto mt-3`;
        alertBox.innerText = message;
    }

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const dados = {
            nome: form.nome.value,
            email: form.email.value
        };

        try {
            const response = await fetch(`/api/usuarios/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(dados)
            });

            const result = await response.json();

            if (!response.ok) {
                showAlert(result.message ?? 'Erro ao atualizar', 'danger');
                return;
            }

            showAlert(result.message ?? 'Usuário atualizado com sucesso!', 'success');

        } catch (error) {
            msg.innerText = 'Erro de conexão com a API';
            msg.style.color = 'red';
        }
    });
</script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>