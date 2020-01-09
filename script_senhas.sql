create database Paripassu character set utf8 collate utf8_general_ci;

create table Paripassu.controlesenha (
	codigo int(5) NOT NULL AUTO_INCREMENT,
	posicao int(4) NOT NULL,
	preferencial int(1) NOT NULL,
	atendendo int(1) DEFAULT NULL,
	PRIMARY KEY (codigo),
	UNIQUE KEY posicao (posicao, preferencial)
);