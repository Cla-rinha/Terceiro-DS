<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        .fundo{
            background: #f0f0f0;
        }
    </style>

</head>
<body class ="container fundo">
</body>

<?php
require '../PHP/Usuario.class.php';

$usuario = new Usuario();
$con = $usuario->conecta();

if (!$con) {
    echo "Banco Indisponivel. Tente mais tarde!";
    exit();
}else {
    echo "<a href = '../html/cadastroUsuario.html' class = 'btn btn-success my-5'> Novo Usuario</a></p>";

    $usuarios = $usuario->listarUsuarios();
    //montagem do html da tabela

    $table = '<table class = "table table-striped">';
    $table .= '<thead>';
    $table .= '<tr>';
    $table .= '<th>Selecionar Usuario</th>';
    $table .= '<th>Codigo</th>';
    $table .= '<th>Nome</th>';
    $table .= '<th>E-mail</th>';
    $table .= '<th>Ações</th>';
    $table .= '<tr>';
    $table .= '<tbody>';

    //laço de repetição para a inclusão de dados da tabela

    foreach ($usuarios as $item){
        $id = $item['id'];
        $nome = $item['nome'];
        $email =  $item['email'];

        $table .= '<tr>';
        $table .= "<td><input type = 'checkbox' value = $id></td>";
        $table .= "<td>$id</td>";
        $table .= "<td>$nome</td>";
        $table .= "<td>$email</td>";
        $table .= "<td><a class = 'btn btn-success' href = 'editar.php?codigo=$id'>Editar</a></td>";
        $table .= "<td><a class = 'btn btn-danger' href = 'deletar.php?codigo=$id'>Excluir</a></td>";

        $table .= '</tr>';

    }

    $table .= '</tbody>';
    $table .= '</thead>';
    $table .= '</table';

}

echo $table;
?>
</html>