CREATE TABLE usuario (
id_usuario int NOT NULL AUTO_INCREMENT PRIMARY KEY,
nome varchar(100),
email varchar(100),
telefone varchar(50),
senha varchar(100),
foto_perfil varchar(100),
cpf varchar(50)
);

CREATE TABLE convidados (
id_convidado int NOT NULL AUTO_INCREMENT PRIMARY KEY,
idade int,
nome varchar(100),
id_evento int
);

CREATE TABLE empresa (
id_empresa int NOT NULL  AUTO_INCREMENT PRIMARY KEY,
cnpj varchar(50),
nome varchar(100),
rua varchar(100),
numero varchar(50),
complemento varchar(50),
bairro varchar(100),
cidade varchar(100),
estado varchar(100),
foto_perfil varchar(100),
descricao varchar(100),
telefone varchar(100),
email_empresa varchar(100),
id_usuario int
);

CREATE TABLE especializacao (
id_especializacao int NOT NULL  AUTO_INCREMENT PRIMARY KEY,
descricao varchar(200),
id_empresa int
);

CREATE TABLE categoria_evento (
id_categoria int NOT NULL  AUTO_INCREMENT PRIMARY KEY,
nome varchar(50),
descricao varchar(200),
foto varchar(100)
);

CREATE TABLE tarefas (
data date,
horario time,
descricao varchar(100),
situacao int,
titulo varchar(50),
id_usuario int
);

CREATE TABLE eventos (
id_evento int NOT NULL  AUTO_INCREMENT PRIMARY KEY,
nome_evento varchar(50),
hora time,
descricao varchar(200),
dia date,
local varchar(50),
id_usuario varchar(50)
);

CREATE TABLE servicos (
id_serv int NOT NULL  AUTO_INCREMENT PRIMARY KEY,
desc_serv varchar(50)
);

CREATE TABLE contrato (
id_contrato int NOT NULL  AUTO_INCREMENT PRIMARY KEY,
id_usuario int,
id_empresa int,
id_evento int
);

CREATE TABLE serv_contrato (
id_serv int,
id_contrato int,
valor float,
situacao int
);

CREATE TABLE emp_serv (
id_serv int,
id_empresa int,
valor_base float
);

CREATE TABLE emp_categ (
id_categoria int,
id_empresa int
);

ALTER TABLE tarefas ADD FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario);
ALTER TABLE emp_serv ADD FOREIGN KEY(id_empresa) REFERENCES empresa (id_empresa);
ALTER TABLE emp_serv ADD FOREIGN KEY(id_serv) REFERENCES servicos (id_serv);
ALTER TABLE emp_categ ADD FOREIGN KEY(id_categoria) REFERENCES categoria_evento (id_categoria);
ALTER TABLE emp_categ ADD FOREIGN KEY(id_empresa) REFERENCES empresa (id_empresa);
ALTER TABLE contrato ADD FOREIGN KEY(id_empresa) REFERENCES empresa (id_empresa);
ALTER TABLE convidados ADD FOREIGN KEY(id_evento) REFERENCES eventos (id_evento);
ALTER TABLE empresa ADD FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario);
ALTER TABLE especializacao ADD FOREIGN KEY(id_empresa) REFERENCES empresa (id_empresa);
ALTER TABLE eventos ADD FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario);
ALTER TABLE contrato ADD FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario);
ALTER TABLE contrato ADD FOREIGN KEY(id_evento) REFERENCES eventos (id_evento);
ALTER TABLE serv_contrato ADD FOREIGN KEY(id_serv) REFERENCES servicos (id_serv);
ALTER TABLE serv_contrato ADD FOREIGN KEY(id_contrato) REFERENCES contrato (id_contrato);
ALTER TABLE emp_serv ADD FOREIGN KEY(id_serv) REFERENCES servicos (id_serv);
