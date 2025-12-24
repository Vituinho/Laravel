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
                <h2>Cadastro de Curso</h2>
                <a href="{{ route('curso.index') }}" class="btn btn-primary">Listar Curso</a>
                </div>

                @if ($errors->any())

                    <ul>
                    @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                    @endforeach
                    </ul>

                @endif

                <form action="{{ route('curso.store') }}" method="POST">

                    @csrf

                    <div class="col-7 form-group mt-3">
                        <label for="name">Nome do Curso</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}"> 
                    </div>

                    <div class="form-group mt-3">
                        <label for="descricao">Descrição do Curso</label>
                        <input type="text" id="descricao" name="description" class="form-control" value="{{ old('description') }}"> 
                    </div>

                    <div class="form-group mt-3">
                        <button class="btn btn-primary">Cadastrar Curso</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</html>