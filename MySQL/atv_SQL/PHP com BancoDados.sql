create database connect_db;
use connect_db;

create table usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

create table veiculos (
	id int auto_increment primary key,
    fabricante varchar(100),
    modelo varchar(100),
    ano_fabricacao int(4),
    tipo_combustivel varchar(100),
    nome_proprietario varchar(100),
    email_proprietario varchar(100),
    telefone_proprietario varchar(20)
);
insert into veiculos (id, fabricante, modelo, ano_fabricacao, tipo_combustivel, nome_proprietario, email_proprietario, telefone_proprietario) values (1, 'Fiat', 'Uno', 2013, 'Flex', 'Jhonathan', 'jhon@email.com', '67 23452-1234');


INSERT INTO usuario (id, nome, senha) VALUES (1, 'fulano', '12345'),
(2, 'pedro', 23134),
(3, 'joão', '23415');

SELECT * FROM usuario;
SELECT * FROM veiculos;

#drop database connect_db;