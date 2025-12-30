<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Usuarios</title>
</head>
<body>
    <h1>Usuários</h1>
    <button onclick="carregarUsuarios()">Carregar Usuários</button>

    <ul id="lista"></ul>

    <script>
        function carregarUsuarios() {
            fetch('/api/usuarios')
                .then(res => res.json())
                .then(usuarios => {
                    const lista = document.getElementById('lista');
                    lista.innerHTML = '';

                    usuarios.forEach(usuario => {
                        lista.innerHTML += `<li>${usuario.name} - ${usuario.email}</li>`;
                    });
                });
        }
    </script>
</body>
</html>