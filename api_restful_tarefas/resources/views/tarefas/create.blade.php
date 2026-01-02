<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Tarefas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">

    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-light">Criar Tarefa</h1>
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
                    placeholder="Digite o título"
                    required
                >
            </div>

            <button type="submit" class="btn btn-info">
                Criar Tarefa
            </button>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script>
    
const form = document.getElementById('FormTarefa');

form.addEventListener('submit', async(e) => { //se alguem clicar faça isso
    e.preventDefault(); //previne de carregar a pagina

    const dados = { // cria um objeto com os dados
        titulo: form.titulo.value
    };

    try {
        const response = await fetch('/api/tarefas', { //esperar resposta
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify(dados) // avisar q é json
        });

        const result = await response.json(); // ler o json 

        if (!response.ok) {
            return; //ver se deu erro
        }

        form.reset(); //limpar form

    } catch {

    }
});

</script>

</html>