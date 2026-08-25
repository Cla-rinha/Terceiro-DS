<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="loja.css">
</head>

<body>

    <a href="produtos.php" class="sombra">Ver todos os produtos</a>
    
    <form action="" method="post" enctype="multipart/form-data">

        <Label for ="nome">Nome do Produto</Label>
        <input type="text" id="nome" name="nome" placeholder="Insira seu nome: " required>

        <label for="descricao">Descrição</label>
        <textarea id="descricao" name="descricao" placeholder="Insira a descrição" required></textarea>

        <label for="valor">Valor</label>
        <input type="number" id="valor" name="valor" placeholder="Insira o valor:" required>

        <label for="foto">Imagens</label>
        <input type="file" id="foto" name="foto[]" multiple required>

        <button type="submit">Cadastrar produto</button>
    </form>

    <?php

        if (isset($_POST['nome']) && !empty($_POST['nome'])) {

            $nome = addslashes($_POST['nome']);
            $descricao = addslashes($_POST['descricao']);

            $fotos = array();

            if (isset($_FILES['foto'])) {

                for ($i = 0; $i < count($_FILES['foto']['name']); $i++) {

                    if ($_FILES['foto']['type'][$i] == 'image/png') {

                        $tipo = ".png";

                    } elseif ($_FILES['foto']['type'][$i] == 'image/jpeg') {

                        $tipo = ".jpg";

                    } else {

                        $tipo = "outro";
                    }

                    if ($tipo == "outro") {
                        ?>
                        <script>
                            alert("Só é permitido o envio de arquivos JPEG ou PNG");
                        </script>  
                        <?php  
                    } else {

                        $nome_arquivo = md5($_FILES['foto']['name'][$i]) . rand(1,999) . $tipo;

                        move_uploaded_file(
                            $_FILES['foto']['tmp_name'][$i],'imagens/' . $nome_arquivo
                        );

                        array_push($fotos, $nome_arquivo);

                    }
                }

                if(!empty($nome) && !empty($descricao)){
                    require 'classes/produto.class.php';
                    $p = new produto();
                    $p->enviarProduto($nome, $descricao, $fotos);

                } else{
                    ?>
                    <script>
                        alert("Preencha os campos obrigatórios!")
                    </script>
                    <?php    
                }
            }
        }
    ?>

</body>
</html>