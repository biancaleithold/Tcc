CREATE TABLE tarefas (
data date,
horario time,
descricao varchar(100),
situacao int,
titulo varchar(50),
id_usuario int
);

CREATE TABLE convidados (
id_convidado int auto increment PRIMARY KEY,
idade int,
nome varchar(100)
);

CREATE TABLE contrato (
id_contrato int auto increment PRIMARY KEY,
id_usuario int,
id_empresa int,
id_evento int
);

CREATE TABLE empresa (
id_empresa int auto increment PRIMARY KEY,
cnpj varchar(50),
nome varchar(100),
rua varchar(100),
numero varchar(50),
complemento varchar(50),
bairro varchar(100),
cidade varchar(100),
estado varchar(100),
foto_perfil Número(4),
descricao varchar(100),
telefone varhar(100),
email varchar(100),
id_usuario int
);

CREATE TABLE usuario (
id_usuario int auto increment PRIMARY KEY,
nome varchar(100),
email varchar(100),
telefone varchar(50),
senha varchar(100),
foto_perfil Número(4),
cpf varchar(50)
);

CREATE TABLE eventos (
id_evento int auto increment PRIMARY KEY,
hora time,
descricao varchar(100),
dia date,
local varchar(50),
id_usuario varchar(50),
FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario)
);

CREATE TABLE servicos (
id_serv int auto increment PRIMARY KEY,
desc_serv varchar(50)
);

CREATE TABLE conv_even (
id_evento int,
id_convidado int,
FOREIGN KEY(id_evento) REFERENCES eventos (id_evento),
FOREIGN KEY(id_convidado) REFERENCES convidados (id_convidado)
);

CREATE TABLE serv_contrato (
id_serv int,
id_contrato int,
valor float,
situacao int,
FOREIGN KEY(id_contrato) REFERENCES contrato (id_contrato)
);

CREATE TABLE emp_serv (
id_serv int,
id_empresa int,
valor_base float,
FOREIGN KEY(id_serv) REFERENCES servicos (id_serv),
FOREIGN KEY(id_empresa) REFERENCES empresa (id_empresa)
);

CREATE TABLE user_conv (
id_convidado int,
id_usuario int,
FOREIGN KEY(id_convidado) REFERENCES convidados (id_convidado),
FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario)
);

ALTER TABLE tarefas ADD FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario);
ALTER TABLE contrato ADD FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario);
ALTER TABLE contrato ADD FOREIGN KEY(id_empresa) REFERENCES empresa (id_empresa);
ALTER TABLE contrato ADD FOREIGN KEY(id_evento) REFERENCES eventos (id_evento);
ALTER TABLE empresa ADD FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario);
ALTER TABLE serv_contrato ADD FOREIGN KEY(id_serv) REFERENCES servicos (id_serv);
