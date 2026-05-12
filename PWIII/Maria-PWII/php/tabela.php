<?php

require_once "Usuario.class.php";
$usuario = new Usuario();

$conn = $usuario->conecta();

if ($conn) {
    $user = $usuario->listarUsuarios();
    if (empty($user)){
        echo "Não ha usuarios para listar!";

    } else {
        ?>
        <table>
            <tr>
                <th>Codigo</th>
                <th>Nome</th>
                <th>Email</th>
                <th> colspan = "2"> Ações</th>
            </tr>
            <?php
            foreach ($user as $item){
                $id = $item['id'];
                $nome = $item['nome'];
                $email = $item['email'];
                ?>

                <tr>
                    <td><?php echo $item['id']?></td>
                    <td><?php echo $item['nome']?></td>
                    <td><?php echo $item['email']?></td>
                    <td><a href="editar.php"><?php echo $item['id']?> Editar</a></td>
                    <td><a href="excluir.php"><?php echo $item['id']?> Excluir</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }

} else {
    echo "Banco Indisponivel. Tente talvez mais tarde!";
}