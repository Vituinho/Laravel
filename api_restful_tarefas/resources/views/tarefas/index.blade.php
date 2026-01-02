<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>

    <div class="container mt-5 d-flex justify-content-between align-items-center">
        <h1>Tarefas</h1>
        <a href="{{ route('tarefas.create') }}" class="btn btn-primary mb-3">Criar Tarefa</a>
    </div>

    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>

            <tbody id="tabela"> 

            </tbody>
            
        </table>
        <button onclick="PegarTarefa()" class="btn btn-info">Mostrar Tarefas</button>
    </div>

    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>