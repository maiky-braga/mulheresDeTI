create table pessoa(
    id_pessoa serial,
    email     varchar(255),
    nome      varchar(255),
    sobrenome varchar(255),
    senha     varchar(255),
    data_nascimento date,
    data_cadastro timestamp default current_timestamp,
    primary key(id_pessoa)
);

-- insert into pessoa( email, nome, sobrenome, senha, data_nascimento ) values ( 'matheus@gmail.com', 'matheus', 'oliveira', md5('12345'), '1998-01-12' );

-- select id_pessoa from pessoa where email = '';

create table sobre_pessoa(
    id_sobre_pessoa serial,
    fk_id_pessoa int,
    cidade    varchar(255),
    uf        varchar(2),
    pcd       integer default 0,
    cpf       varchar(15),
    primary key(id_sobre_pessoa, fk_id_pessoa)
);

--- insert into sobre_pessoa( fk_id_pessoa, cidade, uf, pcd, cpf ) values ( '3', 'Vitoria', 'ES', 1, '12345678990' );

-- select cpf, cidade, uf, pcd from sobre_pessoa where fk_id_pessoa = '';

create table academico(
	id_academico_pessoa serial,
	fk_id_pessoa int,
	formacao varchar(255),
	grau varchar(255),
	status varchar(255),
	curso varchar(255),
	instituicao varchar(255),
	ead int default 0,
	inicio date,
	fim date,
	primary key (id_academico_pessoa, fk_id_pessoa)
)

create table experiencia(
	id_experiencia_pessoa serial,
	fk_id_pessoa int,
	empresa varchar(255),
	cargo varchar(255),
	descricao varchar(255),
	atual int default 0,
	xp int default 0,
	inicio date,
	fim date,
	primary key (id_experiencia_pessoa, fk_id_pessoa)
)


