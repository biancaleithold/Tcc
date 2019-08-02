CREATE TABLE IF NOT EXISTS `usuario` (
`id_usuario` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
`nome` varchar(100),
`email` varchar(100),
`telefone` varchar(50),
`senha` varchar(100),
`foto_perfil` varchar(20),
`cpf` varchar(50)
);

CREATE TABLE IF NOT EXISTS `convidados` (
`id_convidado` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
`idade` int,
`nome` varchar(100)
);

CREATE TABLE IF NOT EXISTS `empresa` (
`id_empresa` int NOT NULL  AUTO_INCREMENT PRIMARY KEY,
`cnpj` varchar(50),
`nome` varchar(100),
`rua` varchar(100),
`numero` varchar(50),
`complemento` varchar(50),
`bairro` varchar(100),
`cidade` varchar(100),
`estado` varchar(100),
`foto_perfil` varchar(20),
`descricao` varchar(100),
`telefone` varchar(100),
`email` varchar(100),
`id_usuario` int
);

CREATE TABLE IF NOT EXISTS `tarefas` (
`data` date,
`horario` time,
`descricao` varchar(100),
`situacao` int,
`titulo` varchar(50),
`id_usuario` int
);

CREATE TABLE IF NOT EXISTS `eventos` (
`id_evento` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
`nome` varchar(50),
`hora` time,
`descricao` varchar(100),
`dia` date,
`local` varchar(50),
`id_usuario` int
);

CREATE TABLE IF NOT EXISTS `servicos` (
`id_serv` int  NOT NULL AUTO_INCREMENT PRIMARY KEY,
`desc_serv` varchar(50)
);

CREATE TABLE IF NOT EXISTS `contrato` (
`id_contrato` int  NOT NULL AUTO_INCREMENT PRIMARY KEY,
`id_usuario` int,
`id_empresa` int,
`id_evento` int
);

CREATE TABLE IF NOT EXISTS `conv_even` (
`id_evento` int,
`id_convidado` int
);

CREATE TABLE IF NOT EXISTS `serv_contrato` (
`id_serv` int,
`id_contrato` int,
`valor` float,
`situacao` int
);

CREATE TABLE IF NOT EXISTS `emp_serv` (
`id_serv` int,
`id_empresa` int,
`valor_base` float
);

CREATE TABLE IF NOT EXISTS `user_conv` (
`id_convidado` int,
`id_usuario` int
);

ALTER TABLE tarefas ADD FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario);
ALTER TABLE contrato ADD FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario);
ALTER TABLE contrato ADD FOREIGN KEY(id_empresa) REFERENCES empresa (id_empresa);
ALTER TABLE contrato ADD FOREIGN KEY(id_evento) REFERENCES eventos (id_evento);
ALTER TABLE empresa ADD FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario);
ALTER TABLE serv_contrato ADD FOREIGN KEY(id_serv) REFERENCES servicos (id_serv);
ALTER TABLE conv_even ADD FOREIGN KEY(id_evento) REFERENCES eventos (id_evento);
ALTER TABLE conv_even ADD FOREIGN KEY(id_convidado) REFERENCES convidados (id_convidado);
ALTER TABLE eventos ADD FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario);
ALTER TABLE emp_serv ADD FOREIGN KEY(id_serv) REFERENCES servicos (id_serv);
ALTER TABLE emp_serv ADD FOREIGN KEY(id_empresa) REFERENCES empresa (id_empresa);
ALTER TABLE serv_contrato ADD FOREIGN KEY(id_contrato) REFERENCES contrato (id_contrato);
ALTER TABLE user_conv ADD FOREIGN KEY(id_convidado) REFERENCES convidados (id_convidado);
ALTER TABLE user_conv ADD FOREIGN KEY(id_usuario) REFERENCES usuario (id_usuario);
