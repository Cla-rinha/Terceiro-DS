<?php

require "Usuario.class.php";
$usuario = new Usuario();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = $usuario->localizarUsuario($id);
    if( !empty( $user ) ){
       $nome  = $_GET['nome'];
       $email  = $_GET['email'];
       $senha = $_GET['senha'];	
} else {
    echo "Usuario não encontrado!";
    exit();
}
	}else{
    echo "ID não informado. Impossível editar o usuário.";
    exit();
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alteração de Registro</title>
    </head>
    <body>
        <h2>Cadastro de Usuario</h2>

        <form action="editar_submit.php" method = "post">
            <input type="text" name="nome"   value = "<?php echo $user['nome' ];?>">
            <input type="text" name="email"  value = "<?php echo $user['email'];?>">
            <input type="text" name="senha"  value = "<?php echo $user['senha'];?>">
            <input type="submit"name= "btn"  value="Cadastrar">
            <input type="submit"name= "btn" value="Cadastrar">
        </form> 
    </body>
</html>