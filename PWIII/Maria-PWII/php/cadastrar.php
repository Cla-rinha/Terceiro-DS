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
    <title>Cadastrar Usuario</title>
</head>
<body>

    <h2>Cadastro de Usuario</h2>

    <form method = "post" action = "cadastrar.php">
        <input type = "text" name = "nome" placeholder = "Digite seu nome:"> <br>
        <input type = "email" name = "email" placeholder = "Digite seu email:"> <br>
        <input type = "password" name = "senha" placeholder = "Digite sua senha"> <br>
        <input type = "submit" id = "btnCadastro" value = "Cadastrar"> <br>
        <a href="index.php">Já tem uma conta? Clique aqui para logar</a>
    </form>
    
</body>
</html>




