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

CREATE TABLE estados (
id_estado int NOT NULL  AUTO_INCREMENT PRIMARY KEY,
sigla varchar(2)
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
foto_perfil varchar(100),
descricao varchar(100),
telefone varchar(100),
email_empresa varchar(100),
id_estado int,
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
id_tarefa int NOT NULL  AUTO_INCREMENT PRIMARY KEY,
titulo varchar(50),
data date,
horario time,
descricao varchar(100),
situacao int,
id_usuario int
);

CREATE TABLE eventos (
id_evento int NOT NULL  AUTO_INCREMENT PRIMARY KEY,
nome_evento varchar(50),
hora time,
descricao varchar(200),
dia date,
local varchar(50),
saldo descimal,
id_usuario varchar(50)
);

CREATE TABLE emp_categ (
id_categoria int,
id_empresa int
);

CREATE TABLE emp_esp (
id_empresa int,
id_especializacao int
);

CREATE TABLE despesa (
valor_empresa decimal,
resto decimal,
id_evento int,
id_empresa int
);

ALTER TABLE tarefas ADD FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario) ON DELETE CASCADE ON UPDATE CASCADE; 
ALTER TABLE emp_categ ADD FOREIGN KEY(id_categoria) REFERENCES categoria_evento (id_categoria) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE emp_categ ADD FOREIGN KEY(id_empresa) REFERENCES empresa (id_empresa) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE convidados ADD FOREIGN KEY(id_evento) REFERENCES eventos (id_evento) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE empresa ADD FOREIGN KEY(id_estado) REFERENCES estados (id_estado) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE empresa ADD FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE especializacao ADD FOREIGN KEY(id_empresa) REFERENCES empresa (id_empresa) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE eventos ADD FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE emp_esp ADD FOREIGN KEY(id_empresa) REFERENCES empresa (id_empresa) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE emp_esp ADD FOREIGN KEY(id_especializacao) REFERENCES especializacao (id_especializacao) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE despesa ADD FOREIGN KEY(id_evento) REFERENCES eventos (id_evento) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE despesa ADD FOREIGN KEY(id_empresa) REFERENCES empresa (id_empresa) ON DELETE CASCADE ON UPDATE CASCADE;     