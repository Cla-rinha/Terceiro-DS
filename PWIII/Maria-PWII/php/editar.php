<?php

require "Usuario.class.php";
$usuario = new Usuario();
$conn = $usuario->conecta();

if (isset($_GET['codigo'])) {
    $id = $_GET['codigo'];
    $user = $usuario->localizarUsuario($id);

    if (!empty($user)) {
        $nome  = $user['nome'];
        $email = $user['email'];
        $senha = $user['senha'];
    } else {
        echo "Usuário não encontrado!";
        exit();
    }
} else {
    echo "ID não informado. Impossível editar o usuário.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Registro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background-color: #f2f2f2;
        }

        .card-form{
            max-width: 450px;
            margin: 60px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,.1);
        }
    </style>
</head>
<body>

<div class="card-form">
    <h2 class="text-center mb-4">Editar Usuário</h2>

    <form action="editar_submit.php" method="post">

        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input
                type="text"
                class="form-control"
                name="nome"
                value="<?php echo $user['nome']; ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input
                type="email"
                class="form-control"
                name="email"
                value="<?php echo $user['email']; ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input
                type="text"
                class="form-control"
                name="senha"
                value="<?php echo $user['senha']; ?>">
        </div>

        <button type="submit" class="btn btn-success w-100">
            Salvar Alterações
        </button>

    </form>
</div>

</body>
</html>