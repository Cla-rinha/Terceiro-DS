<?php
session_start();

require_once "Usuario.class.php";
$usuario = new Usuario();

if(isset($_POST["nome"])){
    //evite injection codigo malicioso digitado por parte do usuario
    $nome = addslashes($_POST["nome"]);
    $email = addslashes($_POST["email"]);
    $senha = md5( addslashes($_POST["senha"]));
    $conn = $usuario -> conecta();
    if ($conn) {
        $user = $usuario ->checkUser($email);
        if (!$user) {
            $user = $usuario->inserirUsuario($nome,$email,$senha);
            if ($user) {
                $_SESSION['nome'] = $nome;
                header("Location:home.php");
            } else {
                echo "Alguma coisa ai não te cadastrou, tente novamente mais tarde";
            }
        } else {
            echo "Você já é cadastrado";
            exit();
        }
    } else {
        echo "banco indisponivel";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background-color: #f2f2f2;
        }

        .cadastro-box{
            width: 400px;
            margin: 80px auto;
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

<div class="cadastro-box">

    <h2 class="text-center mb-4">Cadastro de Usuário</h2>

    <form method="post" action="cadastrar.php">

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input
                type="text"
                name="nome"
                class="form-control"
                placeholder="Digite seu nome"
                required>
        </div>

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
            Cadastrar
        </button>

        <p class="text-center mt-3">
            Já tem uma conta?
            <a href="index.php">Faça login</a>
        </p>

    </form>

</div>

</body>
</html>