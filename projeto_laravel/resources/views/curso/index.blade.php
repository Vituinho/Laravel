<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 mb-5">
                <div class="border-bottom d-flex justify-content-between align-items-center">
                <h2>Listagem de cursos</h2>
                <a href="{{ route('curso.create') }}" class="btn btn-primary">Cadastrar Curso</a>
                </div>
                @if (session('success'))
                <div class="alert alert-success mt-2" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger mt-2" role="alert">
                    {{ session('error') }}
                </div>
                @endif

                <table class="table table-hover table-striped mt-5">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cursos as $curso)
                        <tr>
                            <td>{{ $curso->name }}</td>
                            <td>{{ $curso->description }}</td>
                            <td class="d-flex justify-content-start gap-2">
                                <a href=" {{ route('curso.edit', $curso->id) }}" class="btn btn-success">Editar</a>

                                <form action="{{ route('curso.destroy', $curso->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger">Excluir</button>
                                </form>

                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</html>