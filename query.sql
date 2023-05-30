show databases;

create database mercado;

use mercado;

create table produto(
	codProd int (6) not null,
    descricao varchar (60),
    valor decimal (5,2),
    validade date
);

alter table produto
modify codProd int (6) not null unique,
modify descricao varchar (60) not null unique;

desc produto;
show tables;

select * from produto;

create table movto(
	codProd int (6) not null,
    tipo varchar (1) not null,
    qtde decimal (7,2) not null,
    datamov date not null
);

select * from movto;

select * from produto order by codProd;
select codProd, descricao, validade from produto order by validade;

select * from produto where validade >= '2024-01-01' && validade < '2024-12-31' order by validade;





