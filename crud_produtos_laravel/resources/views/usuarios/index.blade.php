<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .main-card {
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        .btn-custom {
            padding: 15px;
            font-size: 1.1rem;
            border-radius: 12px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }

        .subtitle {
            color: #6c757d;
            font-size: 1.05rem;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card main-card">

                {{-- ALERTAS --}}
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        <i class="bi bi-check-circle-fill"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger text-center">
                        <i class="bi bi-x-circle-fill"></i>
                        {{ session('error') }}
                    </div>
                @endif

                {{-- TÍTULO --}}
                <div class="text-center mb-4">
                    <h1 class="fw-bold">
                        <i class="bi bi-people-fill text-primary"></i>
                        Página Inicial de Usuários
                    </h1>
                    <p class="subtitle mt-2">
                        Sistema de gerenciamento moderno e eficiente
                    </p>
                </div>

                {{-- DESCRIÇÃO --}}
                <p class="text-center mb-5">
                    Desenvolvida por <strong>Victor Emanuel</strong>, esta aplicação utiliza um conjunto robusto
                    de tecnologias modernas, incluindo <strong>Laravel</strong>, <strong>PHP</strong>,
                    <strong>PostgreSQL</strong> e <strong>Bootstrap</strong>.
                    <br><br>
                    O sistema implementa todas as operações fundamentais de um <strong>CRUD</strong>
                    (criação, leitura, atualização e exclusão), seguindo boas práticas de arquitetura,
                    segurança e organização de código, garantindo escalabilidade e manutenção facilitada.
                </p>

                {{-- AÇÕES --}}
                <div class="row g-3">
                    <div class="col-md-6">
                        <a href="{{ route('usuarios.create') }}"
                           class="btn btn-primary w-100 btn-custom">
                            <i class="bi bi-person-plus-fill me-2"></i>
                            Cadastrar Usuário
                        </a>
                    </div>

                    <div class="col-md-6">
                        <a href="{{ route('produtos.index') }}"
                           class="btn btn-outline-primary w-100 btn-custom">
                            <i class="bi bi-box-seam me-2"></i>
                            Ver Produtos
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
