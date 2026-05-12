<?php
session_start();

if (isset($_SESSION['nome'])) {
    $nome =  $_SESSION['nome'];
    echo "Olá $nome";
} else {
    echo "Você precisa estar Cadastrado e Logado para acessar essa pagina!";
}