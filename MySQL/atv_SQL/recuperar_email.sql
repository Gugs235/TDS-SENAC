create database sistema;
use sistema;

create table if not exists usuarios (
	id int auto_increment primary key,
    nome varchar(100) not null,
    email varchar(100) not null unique,
    senha varchar(100) not null
);

insert into usuarios (nome, email, senha) values
('João Silva', 'joao@example.com', '123'),
('Maria Oliveira', 'maria@example.com', '123'),
('Pedro Santos', 'pedro@example.com', '123'),
('Jhonathan Soares', 'jhonathan.ssoares2008@gmail.com', '1234');
