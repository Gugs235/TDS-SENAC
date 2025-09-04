create database sistema_login;
use sistema_login;

create table if not exists usuarios (
	id int auto_increment primary key,
    nome varchar(100) not null,
    usuario varchar(50) not null unique,
    senha varchar(100) not null
);
