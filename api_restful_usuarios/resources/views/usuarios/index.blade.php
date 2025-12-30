<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <h1 class="mt-4 d-flex justify-content-center">Usuários GET</h1>
    <div class="d-flex flex-column align-items-center">
        <button class="btn btn-primary mt-5" onclick="carregarUsuarios()">Carregar Usuários</button>
        <ul class="list-group mt-3 w-50" id="lista"></ul>
    </div>

    <script>
        function carregarUsuarios() {
            fetch('/api/usuarios')
                .then(res => res.json())
                .then(usuarios => {
                    const lista = document.getElementById('lista');
                    lista.innerHTML = '';

                    usuarios.forEach(usuario => {
                        lista.innerHTML += `<li class="d-flex justify-content-center list-group-item">${usuario.nome} - ${usuario.email}</li>`;
                    });
                });
        }
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>