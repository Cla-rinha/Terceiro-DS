 CREATE DATABASE etimusuario;
 use etimusuario;
CREATE TABLE usuario(
    id int primary key auto_increment,
    nome varchar(200) not null,
    email varchar(200) not null unique,
    senha varchar(200) not null
)