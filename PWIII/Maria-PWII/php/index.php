<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background-color: #f2f2f2;
        }

        .login-box{
            width: 380px;
            margin: 100px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,.1);
        }

        a{
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="login-box">

    <h2 class="text-center mb-4">Tela de Login</h2>

    <form method="post" action="login.php">

        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input
                type="email"
                name="email"
                class="form-control"
                placeholder="Digite seu e-mail"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input
                type="password"
                name="senha"
                class="form-control"
                placeholder="Digite sua senha"
                required>
        </div>

        <button type="submit" class="btn btn-success w-100">
            Login
        </button>

        <p class="text-center mt-3">
            Não tem conta?
            <a href="cadastrar.php">Cadastre-se aqui</a>
        </p>

    </form>

</div>

</body>
</html>