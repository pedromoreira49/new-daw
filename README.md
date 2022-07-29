## Main:
Exercises developed in the discipline of Web Application Development in the 3rd semester of the Technology course in Systems for Internet.

Scripts for database:

```bash
create table categorias (
-> idcategoria int(6) auto_increment primary key,
-> nome varchar(50) not null); 


create table produtos (
-> idproduto int(6) auto_increment primary key, 
-> nome varchar(50) not null,
-> descricao varchar(200) not null, 
-> quantidade int(5) not null, 
-> idcategoria int(6) not null,
-> constraint fk_idcategoria foreign key (idcategoria) references categorias(idcategoria)); 

create table usuarios (
-> idusuario int(6) auto_increment primary key,
-> nome varchar(60) not null,
-> email varchar(80) not null,
-> senha varchar(30) not null,
-> foto varchar(20),
-> tipousuario int(6) not null default 1,
-> status boolean not null default false);

```