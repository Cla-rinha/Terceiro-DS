<?php
class Usuario{
    private $id;
    private $email;
    private $senha;
    private $nome;
    private $pdo;

    public function conecta(){
        $dns = "mysql:dbname=etimusuario;host=localhost";
        $user = "root";
        $pass = "";

        try{
            $this->pdo = new PDO($dns,$user,$pass);
            return true;
        }catch(\Throwable  $e){
            return false;
        }
    }

    public function inserirUsuario($nome, $email, $senha){
        //passo 1
        $sql = "INSERT INTO usuarios SET nome = :n, email = :e, senha = :s";
        //passo 2
        $stmt = $this->pdo->prepare($sql);
        //passo 3
        $stmt->bindValue(":n" , $nome);
        $stmt->bindValue(":e" , $email);
        $stmt->bindValue(":s" , $senha);
        //passo 4
        $stmt->execute();
        return $stmt;
    }

    public function checkUser($email){
        $sql = "SELECT * FROM usuarios WHERE email = :e";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":e" , $email);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }
        public function checkPass($email, $senha){
        $sql = "SELECT * FROM usuarios WHERE email = :e AND senha = :s";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":e" , $email);
        $stmt->bindValue(":s" , $senha);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }
}