<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">

    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-light">Editar Tarefa</h1>
            <a href="/tarefas" class="btn btn-primary">
                Visualizar Tarefas
            </a>
        </div>

        <form id="FormTarefa">
            @csrf   

            <div class="mb-3">
                <label class="form-label text-light">Título da tarefa</label>
                <input 
                    type="text" 
                    name="titulo" 
                    class="form-control" 
                    value=""
                    required
                >
            </div>

            <div class="mb-3">
                <label class="form-label text-light">Status da tarefa</label>
                <select class="form-select" name="concluida">
                    <option value="1">concluida</option>
                    <option value="0">inconcluida</option>
                </select>
            </div>

            <button type="submit" class="btn btn-info">
                Editar Tarefa
            </button>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script>

const form = document.getElementById('FormTarefa');

const url = window.location.pathname;
const partes = url.split('/');
const id = partes[2];

fetch(`/api/tarefas/${id}`)
    .then(response => response.json())
    .then(tarefa => {
        document.querySelector('input[name="titulo"]').value = tarefa.titulo;
        document.querySelector('select[name="concluida"]').value = tarefa.concluida;
    });

form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const dados = {
        titulo: form.titulo.value,
        concluida: form.concluida.value
    };

    const response = await fetch(`/api/tarefas/${id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify(dados)
    });

    if (response.ok) {
        window.location.href = '/tarefas';
    }
});

</script>

</html>