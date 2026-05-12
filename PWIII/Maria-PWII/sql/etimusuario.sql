CREATE DATABASE tabelaUsuario;
use tabelausuario;
CREATE TABLE usuarios(
    id int primary key auto_increment,
    nome varchar(200) not null,
    email varchar(200) not null unique,
    senha varchar(200) not null
)