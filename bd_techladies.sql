create table pessoa(
cpf integer,
usuario varchar(40),
senha varchar(80),
email varchar(100) primary key,
nome varchar(50),
sobrenome varchar(200),
pcd char,
data_nascimento date);

insert into pessoa (cpf, usuario, senha, email, nome, sobrenome, data_nascimento) values (1111, 'dudars', 'duda1', 'duda@hotmail.com', 'eduarda', 'simoes', '2020-10-22')
