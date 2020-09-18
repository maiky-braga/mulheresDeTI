create table pessoa(
    id_pessoa serial,
    email     varchar(255),
    nome      varchar(255),
    sobrenome varchar(255),
    senha     varchar(255),
    data_nascimento date,
    data_cadastro timestamp default current_timestamp,
	foto_perfil bytea,
    primary key(id_pessoa)
);


create table sobre_pessoa(
    id_sobre_pessoa serial,
    fk_id_pessoa int,
    cidade    varchar(255),
    uf        varchar(2),
    pcd       integer default 0,
    cpf       varchar(15),
    primary key(id_sobre_pessoa, fk_id_pessoa)
);

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
	inicio date,
	fim date,
	primary key (id_experiencia_pessoa, fk_id_pessoa)
)

create table post(
    id_post serial,
    fk_id_pessoa int,
    descricao    varchar(255),
    data_cadastro timestamp default current_timestamp,
	tipo int,
    primary key(id_post, fk_id_pessoa)
);

create table perguntaForum(
    id_pergunta serial,
    titulo     varchar(255),
    corpo      varchar(255),
    tags      varchar(255),
    primary key(id_pergunta)
);

create table respostaForum(
	id_resposta serial,
	fk_id_pergunta int,
	resposta      varchar(255),
	primary key(id_resposta),
	FOREIGN KEY(fk_id_pergunta) 
   	REFERENCES perguntaForum(id_pergunta)
);

