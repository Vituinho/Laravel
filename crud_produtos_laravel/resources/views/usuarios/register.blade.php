<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #141e30, #243b55);
        }
        .card {
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(20px);
            padding: 40px;
            border-radius: 20px;
            width: 100%;
            max-width: 460px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
            color: #fff;
        }
        .card1 h1 { font-size: 28px; margin-bottom: 10px; }
        .card1 p { font-size: 14px; opacity: 0.8; margin-bottom: 30px; }
        .input-group1 { margin-bottom: 18px; }
        .input-group1 label { font-size: 13px; display: block; margin-bottom: 6px; }
        .input-group1 input {
            width: 100%;
            padding: 14px;
            border-radius: 10px;
            border: none;
            outline: none;
            background: rgba(255,255,255,0.15);
            color: #fff;
        }
        button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #7f00ff, #e100ff);
            color: #fff;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }
        button:hover { transform: translateY(-2px); box-shadow: 0 10px 30px rgba(225,0,255,0.5); }
        .footer { text-align: center; margin-top: 20px; font-size: 13px; }
        .footer a { color: #e100ff; text-decoration: none; }
    </style>
</head>
<body class="wrapper d-flex flex-column align-items-center">
    @if ($errors->any())
        <div style="
            background: rgba(255, 0, 0, 0.15);
            color: #ffb3b3;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 20px;"
            class="d-flex flex-column">
            {{ $errors->first() }}
        </div>
    @endif
    <form class="card" method="POST" action="{{ url('/registrar') }}">
        @csrf
        <h1>Criar conta</h1>
        <p>Preencha os dados para se registrar</p>

        <div class="input-group1">
            <label>Nome</label>
            <input type="text" name="nome" placeholder="Seu nome" required>
        </div>

        <div class="input-group1">
            <label>Email</label>
            <input type="email" name="email" placeholder="seu@email.com" required>
        </div>

        <div class="input-group1">
            <label>Senha</label>
            <input type="password" name="password" placeholder="••••••••" required>
        </div>

        <div class="input-group1">
            <label>Confirmar senha</label>
            <input type="password" name="password_confirmation" placeholder="••••••••" required>
        </div>

        <button type="submit">Registrar</button>

        <div class="footer">
            Já tem conta? <a href="{{ url('/logar') }}">Entrar</a>
        </div>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>