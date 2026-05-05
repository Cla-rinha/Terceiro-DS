<?php
session_start();
require_once "Usuario.class.php";

$usuario = new Usuario();   
$conn = $usuario -> conecta();

if ($conn) {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $user = $usuario->checkUser($email);
        if ($user) {
            $user = $usuario->checkPass($email, $senha);

            $_SESSION['nome'] = $nome;
            header("Location:home.php");

        }else {
            echo "usuario não cadastrado";
            header("Location:home.php");
        }
    }
}else {
    echo "Banco indisponivel, Tente novamente mais tarde";
    exit();
}