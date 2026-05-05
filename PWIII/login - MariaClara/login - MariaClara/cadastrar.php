<?php
session_start();

require_once "Usuario.class.php";
$usuario = new Usuario();

if(isset($_POST["nome"])){
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $conn = $usuario -> conecta();
    if ($conn) {
        $user = $usuario ->checkUser($email);
        if (!$user) {
            $user = $usuario->inserirUsuario($nome,$email,$senha);
            if ($user) {
                $_SESSION['nome'] = $nome;
                header("Location:home.php");
                echo "Confirmar cadastro de alguma coisa";
            } else {
                echo "Tal coisa não foi cadastrada por tal erro, tente mais tarde";
            }
        } else {
            echo "Já tem um jamal com esse cadastro";
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
    <title>Cadastrar Usuario</title>
</head>
<body>

    <h2>Cadastro de Usuario</h2>

    <form method = "post" action = "cadastrar.php">
        <input type = "text" name = "nome" placeholder = "Digite seu nome:"> <br>
        <input type = "email" name = "email" placeholder = "Digite seu email:"> <br>
        <input type = "password" name = "senha" placeholder = "Digite sua senha"> <br>
        <input type = "submit" id = "btnCadastro" value = "Cadastrar"> <br>
        <a href="index.php">Já tem uma conta? clique aqui para logar</a>
    </form>
    
</body>
</html>