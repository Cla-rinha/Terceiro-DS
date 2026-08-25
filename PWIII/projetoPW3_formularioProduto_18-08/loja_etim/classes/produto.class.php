<?php

class Produto{
    private $id_produto;
    private $nome;
    private $descricao;
    private $valor;
    private $pdo;

    public function conecta(){
        try {
            $dns = "mysql:dbname=loja_db;host=localhost";
            $dbUser= "root";
            $dbPass ="";

            $this->pdo = new PDO($dns,$dbUser,$dbPass);
            return true;

        } catch (\Throwable $th) {
           return false;

        }
    }

	    public function enviarProduto($nome, $descricao, $valor, $fotos = array()){
        
        $sql = "INSERT INTO produtos SET descricao =:d, nome_produto = :n, valor = :v";
        $sql = $this->pdo->prepare($sql);
        $sql ->bindValue(":d", $descricao);
        $sql ->bindValue(":n", $nome);
        $sql ->bindValue(":v", $valor);

        $isOk = $sql->execute();
        
        if( $isOk ){
            $id_produto = $this->pdo->lastInsertId();
        }

        if( count( $fotos ) ){
            for( $i = 0; $i < count($fotos); $i++ ){
                $nome_foto = $fotos[$i];
                
                $sql = "INSERT INTO imagens (nome_imagem, fk_id_produto) values (:n, :fk)";
                $sql = $this->pdo->prepare($sql);
                $sql ->bindValue(":n" , $nome_foto); 
                $sql ->bindValue(":fk", $id_produto);
                
                $sql->execute();
            }
        }

        return $isOk;
    }
}