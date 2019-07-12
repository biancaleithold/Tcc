INSERT INTO usuario (nome, email, telefone, senha, cpf) VALUES 
('Julia Biff', 'ju@gmail.com', '934555797', 'bola', '158.814.702-90'),
('Bianca Leithold', 'bia@gmail.com', '256554567', 'banana', '273.778.022-51'),
('Elizabeth Antunes', 'beth@gmail.com', '777554567', 'maca', '329.635.185-01'),
('Leticia dos Santos', 'leticia@gmail.com', '555554567', 'batata', '422.821.472-00'),
('Joao Pedro', 'joao@gmail.com', '666554567', 'tomate', '538.172.449-75'),
('Natalia Dellandrea', 'nat@gmail.com', '333554567', 'chocolate', '622.343.276-36'),
('Matheus Gomes', 'gomes@gmail.com', '222554567', 'cebola', '651.132.287-45'),
('Ana Luiza Souza', 'luiza@gmail.com', '111554567', 'abobora', '668.265.905-90'),
('Karen Fernandes', 'karen@gmail.com', '934665789', '1234', '713.438.116-19'),
('Chas Crane', 'chas@gmail.com', '988552266', '123', '785.956.091-79');

INSERT INTO empresa (cnpj, nome, rua, numero, complemento, bairro, cidade, estado, descricao, telefone, email) VALUES 
('28.661.535/0001-22', 'Floricultura Jujuba', 'Palmeiras', '145', 'casa', 'Itinga', 'Araquari', 'Santa Catarina', 'Flores em geral, produtos importados e de qualidade desde 1970.', '(47)34665989', 'jujuba@gmail.com'),
('57.208.376/0001-03', 'Restaurante Fernandes', 'Jo�o Pinheiro', '458', 'casa', 'Centro', 'Joinville', 'Santa Catarina', 'Especializados em frutos do mar.', '(47)34668888', 'rest_fernandes@gmail.com'),
('88.183.280/0001-61', 'Sal�o de Beleza Serena', 'Araras', '96', 'casa', 'S�o Marcos', 'Joinville', 'Santa Catarina', 'Real�ando sua beleza desde 1998.', '(47)34668759', 'serena@gmail.com'),
('11.820.025/0001-58', 'Barbearia Gomes', 'Ant�nio Neves', '32', 'casa', 'Atiradores', 'Joinville', 'Santa Catarina', 'Excel�ncia, qualidade e profissionalismo � nosso lema!', '(47)34657826', 'barbearia_gomes@gmail.com'),
('85.270.164/0001-91', 'Confeitaria Del�cias', 'Pedro Paulo', '128', 'apartamento 4658', 'Iriri�', 'Joinville', 'Santa Catarina', 'O sabor dos sonhos...', '(47)34659829', 'confeitaria_delicia@gmail.com'),
('47.367.062/0001-08', 'Joalheria Univesal', 'Jo�o Pedro', '894', 'casa', 'Porto Grande', 'Araquari', 'Santa Catarina', 'Brilhe como uma joia!', '(47)34635625', 'joalheria_universal@gmail.com'),
('68.660.186/0001-49', 'Brasil Noivas', 'Das Flores', '657', 'casa', 'Floresta', 'Joinville', 'Santa Catarina', 'H� mais de 30 anos tornando seu dia mais que especial.', '(47)34661125', 'brasil_noivas@gmail.com'),
('28.280.261/0001-21', 'Expressiva Homem', 'Dona Francisca', '57', 'casa', 'Sagua�u', 'Joinville', 'Santa Catarina', 'Especializada em vestu�rio para homens.', '(47)34664958', 'expressiva_homem@gmail.com');

INSERT INTO tarefas (data, horario, descricao, situacao, titulo) VALUES 
('2019-01-01', '10:10:00', 'Reuniao decora��o', 0, 'Reuni�o'),
('2019-02-04', '09:20:00', 'Reuniao com banda', 0, 'Reuni�o'),
('2019-03-03', '08:30:00', 'Teste de penteado', 0, 'Teste'),
('2019-04-02', '13:20:00', 'Degusta��o buffet', 0, 'Degusta��o'),
('2019-01-15', '10:10:00', 'Prova do vestido', 0, 'Prova'),
('2019-06-20', '17:15:00', 'Reuniao com cerimonialista', 0, 'Reuni�o');

INSERT INTO convidados (idade, nome) VALUES
(15, 'Mariana Gon�alves'),
(17, 'Leandro Bressan'),
(21, 'Beatriz Souza'),
(45, 'Geovana Oliveira'),
(12, 'Lorenzo Emanuel Bressan'),
(65, 'Heitor Bressan'),
(44, 'Luana Fagundes'),
(20, 'Gilceia Mendon�a'),
(18, 'Kelvin Bressan'),
(25, 'Lia Bressan');

INSERT INTO eventos (nome_evento, hora, descricao, dia, local) VALUES 
('Casamento', '10:05:00', 'Casamento Luana e Luan', '2019-05-22', 'Restaurante Viapiana'),
('Casamento', '09:15:00', 'Casamento Fabio e Fabiana', '2019-10-22', 'Restaurante Espinheiros'),
('Anivers�rio 15 anos', '08:25:00', '15 anos Maria', '2019-08-23', 'Restaurante do Nego'),
('Anivers�rio', '07:25:00', 'Anivers�rio Lucas', '2019-06-22', 'Restaurante Estrela'),
('Anivers�rio', '11:35:00', 'Anivers�rio Cec�lia', '2019-10-05', 'Restaurante Kaoma'),
('Anivers�rio', '12:45:00', '1 ano do Vitor', '2019-06-26', 'Estrela Eventos'),
('Festa coorporativa', '13:55:00', 'Coorporativa da Brit�nia ', '2019-05-22', 'Restaurante S�o Jos�'),
('Casamento', '14:25:00', 'Casamento Fernanda e Luciano', '2019-05-15', 'Restaurante Viapiana'),
('Anivers�rio', '15:30:00', 'Aniversario do Leandro', '2019-03-25', 'Casa do p�o'),
('Anivers�rio', '16:05:00', 'Anivers�rio da Karen', '2019-05-03', 'Restaurante Varand�o');

INSERT INTO especializacao (descricao) VALUES 
('Anima��o'),
('Barbearia'),
('Brinquedos'),
('Buffet'),
('Cerimonialista'),
('Cia Viagem'),
('Confeitaria'),
('Convite'),
('Decora��o'),
('Filmagem'),
('Floricultura'),
('Fotografia'),
('Gar�om'),
('Lembran�as'),
('Loca��o de Carro'),
('Loca��o e Compra de Trajes'),
('Loca��o do Local'),
('M�sica'),
('Recep��o'),
('Joalheria'),
('Sal�o de Beleza'),
('Seguran�a');

INSERT INTO categoria_evento (nome, descricao) VALUES
('15 anos','festa debutante bla bla'),
('Casamento','momento especial do casal bla bla'),
('Coorporativo','empresas merecem celebrar bla bla'),
('Formatura','finalmente acabou bla bla'),
('Anivers�rio Infantil','crian�as adoram bla bla'),
('Anivers�rios','cada ano melhor bla bla');



