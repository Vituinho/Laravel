<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="mt-5">Login</h2>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a class="btn btn-primary mt-5" href="/register">Registrar</a>
                    </div>
                </div>
                <form id="form">
                    @csrf
                    <div class="mb-3 mt-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3 mt-4">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>

<script>
    let form = document.getElementById('form');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        let response = await fetch('http://localhost:8000/api/usuarios/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: JSON.stringify({
                email: email,
                password: password
            })
        });

        let data = await response.json();

        if (response.ok) {
            sessionStorage.setItem('auth_token', data.token);
            alert('Login successful!');
            window.location.href = '/produtos'; // redirecione para página de produtos
        } else {
            alert('Login failed: ' + data.message);
        }

    });
</script>