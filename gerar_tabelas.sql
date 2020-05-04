CREATE DATABASE IF NOT EXISTS administracao;

CREATE TABLE IF NOT EXISTS administracao.cliente ( 
id int NOT NULL AUTO_INCREMENT,
PRIMARY KEY (id), 
nome VARCHAR(150) NOT NULL, 
data_nascimento DATE NOT NULL,
cpf VARCHAR(11) NOT NULL, 
rg VARCHAR(20) NOT NULL,
telefone VARCHAR(10) NOT NULL) 
CHARSET=utf8 COLLATE utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS administracao.endereco ( 
id int NOT NULL AUTO_INCREMENT,
PRIMARY KEY (id), 
id_cliente int NOT NULL,
rua VARCHAR(150) NOT NULL,
numero VARCHAR(5) NOT NULL, 
bairro VARCHAR(150) NOT NULL, 
complemento VARCHAR(150) NOT NULL, 
cep int NOT NULL, 
cidade VARCHAR(150) NOT NULL, 
estado VARCHAR(2) NOT NULL) 
CHARSET=utf8 COLLATE utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS administracao.usuario (
id int NOT NULL AUTO_INCREMENT,
PRIMARY KEY (id), 
login VARCHAR(150) NOT NULL, 
senha VARCHAR(150) NOT NULL, 
idsessao VARCHAR(150)) 
CHARSET=utf8 COLLATE utf8_unicode_ci;