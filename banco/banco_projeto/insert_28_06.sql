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

INSERT INTO empresa (cnpj, nome, rua, numero, complemento, bairro, cidade, descricao, telefone, email_empresa) VALUES 
('28.661.535/0001-22', 'Floricultura Jujuba', 'Palmeiras', '145', 'casa', 'Itinga', 'Araquari', 'Flores em geral, produtos importados e de qualidade desde 1970.', '(47)34665989', 'jujuba@gmail.com'),
('57.208.376/0001-03', 'Restaurante Fernandes', 'Jo�o Pinheiro', '458', 'casa', 'Centro', 'Joinville', 'Especializados em frutos do mar.', '(47)34668888', 'rest_fernandes@gmail.com'),
('88.183.280/0001-61', 'Sal�o de Beleza Serena', 'Araras', '96', 'casa', 'S�o Marcos', 'Joinville', 'Real�ando sua beleza desde 1998.', '(47)34668759', 'serena@gmail.com'),
('11.820.025/0001-58', 'Barbearia Gomes', 'Ant�nio Neves', '32', 'casa', 'Atiradores', 'Joinville', 'Excel�ncia, qualidade e profissionalismo � nosso lema!', '(47)34657826', 'barbearia_gomes@gmail.com'),
('85.270.164/0001-91', 'Confeitaria Del�cias', 'Pedro Paulo', '128', 'apartamento 4658', 'Iriri�', 'Joinville', 'O sabor dos sonhos...', '(47)34659829', 'confeitaria_delicia@gmail.com'),
('47.367.062/0001-08', 'Joalheria Univesal', 'Jo�o Pedro', '894', 'casa', 'Porto Grande', 'Araquari', 'Brilhe como uma joia!', '(47)34635625', 'joalheria_universal@gmail.com'),
('68.660.186/0001-49', 'Brasil Noivas', 'Das Flores', '657', 'casa', 'Floresta', 'Joinville', 'H� mais de 30 anos tornando seu dia mais que especial.', '(47)34661125', 'brasil_noivas@gmail.com'),
('28.280.261/0001-21', 'Expressiva Homem', 'Dona Francisca', '57', 'casa', 'Sagua�u', 'Joinville', 'Especializada em vestu�rio para homens.', '(47)34664958', 'expressiva_homem@gmail.com');

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
(25, 'Lia Bressan'),
(18, 'Bianca Vict�ria Leithold de Oliveira');

INSERT INTO eventos (nome_evento, hora, descricao, dia, local, valor_max_pagar) VALUES 
('Casamento', '10:05:00', 'Casamento Luana e Luan', '2019-05-22', 'Restaurante Viapiana', '20000.00'),
('Casamento', '09:15:00', 'Casamento Fabio e Fabiana', '2019-10-22', 'Restaurante Espinheiros', '50000.00'),
('Anivers�rio 15 anos', '08:25:00', '15 anos Maria', '2019-08-23', 'Restaurante do Nego', '10000.00'),
('Anivers�rio', '07:25:00', 'Anivers�rio Lucas', '2019-06-22', 'Restaurante Estrela', '5000.00'),
('Anivers�rio', '11:35:00', 'Anivers�rio Cec�lia', '2019-10-05', 'Restaurante Kaoma', '8000.00'),
('Anivers�rio', '12:45:00', '1 ano do Vitor', '2019-06-26', 'Estrela Eventos', '2000.00'),
('Festa coorporativa', '13:55:00', 'Coorporativa da Brit�nia ', '2019-05-22', 'Restaurante S�o Jos�', '60000.00'),
('Casamento', '14:25:00', 'Casamento Fernanda e Luciano', '2019-05-15', 'Restaurante Viapiana', '40000.00'),
('Anivers�rio', '15:30:00', 'Aniversario do Leandro', '2019-03-25', 'Casa do p�o', '3000.00'),
('Anivers�rio', '16:05:00', 'Anivers�rio da Karen', '2019-05-03', 'Restaurante Varand�o', '4000.00');

INSERT INTO especializacao (descricao_esp) VALUES 
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

INSERT INTO categoria_evento (nome, descricao, foto1, foto2, foto3, foto4) VALUES
('15 anos','Na primavera de cada anivers�rio que comemoramos, existem datas que s�o bem mais especiais que outras. E voc� hoje esta vivendo uma das mais bonitas e marcantes, os esperados e desejados 15 anos.

Que felicidade poder estar ao seu lado para ver todo o brilho que emana no seu sorriso lindo. Este � o anivers�rio que marcar� a transi��o da inf�ncia para a sua adolesc�ncia, uma fase diferente e cheia de mist�rios a serem desvendados, e muitas aventuras a serem vividas.

A descoberta de sua pr�pria identidade, uma maneira diferente de enxergar a vida e o mundo. O amadurecimento tem um toque especial e cheio de encanto, e acredito que fazer 15 anos carrega em si um car�ter m�gico, pois � um per�odo onde florescem as responsabilidades.

Viva com sabedoria e muita dignidade os seus 15 anos, pois ser� o come�o da procura de sua felicidade. Parab�ns pelos seus lindos 15 anos!','15anos1.jpg', '15anos2.jpg','15anos3.jpg', '15anos4.jpg'),
('Casamento','O casamento � um de um la�o de amor. Um la�o que deve ser leve como um abra�o, n�o apertado como um n�, mas firme o suficiente para n�o se desfazer com o vento. O casamento deve ser feito de amor, de respeito e admira��o. Deve sobreviver ao fim da paix�o, a tormentas e qualquer tipo de tenta��o. Num casamento deve haver di�logo, n�o discuss�o. O importante n�o � saber quem tem raz�o, mas encontrar um consenso. Num casamento, as duas partes devem aprender a ceder. Se apenas um cede, sem nada em troca receber, a frustra��o se instala e a amargura pode come�ar a crescer. As m�goas e tristezas que surgem n�o devem ser guardadas, devem virar palavras, que sejam escritas ou faladas.', 'casamento1.jpg', 'casamento2.jpg', 'casamento3.jpg', 'casamento4.jpg'),
('Coorporativo','empresas merecem celebrar bla bla', 'corporativa1.png', 'corporativa2.jpg', 'corporativa3.jpg', 'corporativa4.jpg'),
('Formatura','O sucesso � daqueles que batalham, e com toda certeza voc� � um dos merecedores desse sucesso. Que a alegria da formatura hoje, fique para sempre em voc�, para que a felicidade tamb�m contagie aqueles que da sua profiss�o se beneficiarem.

Pessoas grandes s�o aquelas que lutam por ideais, e hoje nesta formatura voc� prova ser parte dessas pessoas. A sua conquista vai impulsionar outras buscas e abrir novos horizontes, sempre apontando para um futuro muito luminoso. 

Por acreditar que este dia chegaria, voc� se esfor�ou e buscou a cada dia o seu sonho. Merecidamente venceu, e hoje os aplausos s�o todos para voc�! 

O que voc� alcan�ou hoje � uma pequena parte do que voc� ainda pode conquistar com o seu talento.

O talento, a for�a de vontade e a persist�ncia trouxeram voc� at� aqui. Esperamos que esta vit�ria seja o in�cio de muitas outras conquistas. Parab�ns pela formatura!', 'formatura1.jpg', 'formatura2.jpg', 'formatura3.jpg', 'formatura4.jpg'),
('Anivers�rio Infantil','Voc� � muito especial e a cada ano que passa s� me surpreende e me encanta com o seu jeitinho de ser. Feliz anivers�rio! Que o dia de hoje seja inesquec�vel, cheio de brincadeiras e muitos presentes! Ser crian�a � viver em um mundo onde s� h� divers�o, alegria e muito amor e o meu maior desejo para sua vida � que ela seja sempre feliz, que nunca faltem sorrisos, amigos, aventuras e sonhos realizados!

Que voc� nunca perca a sua alegria de viver e que Deus te aben�oe sempre. Que voc� cres�a e se torne cada vez mais uma pessoa de bem, inteligente, dedicado, que sempre fala a verdade e faz quest�o de ajudar as pessoas. Que Jesus e seus anjos te protejam, te acompanhem e te iluminem sempre. Parab�ns!

', 'infantil3.jpg', 'infantil2.jpg', 'infantil1.jpg', 'infantil4.jpg'),
('Anivers�rios','Hoje � dia de grandes sorrisos, de fazer um pequeno balan�o do que passou, de inspirar sonhos e desejos para o futuro, e principalmente de receber carinho e homenagens muito merecidas. Os meus votos s�o enviados � dist�ncia, mas nem por isso s�o menos sinceros ou sentidos. Feliz anivers�rio!

E voc� sabe como � especial para mim, muito especial, e de como eu gostaria de estar hoje do seu lado, de lhe dar este abra�o e este beijo que h� muito vivem querendo fugir de mim at� voc�. 

Mas a vida � mesmo assim, e nem sempre o que queremos se torna realidade. Mas espero que seus desejos se realizem, que a voc� a vida fa�a a vontade, pois pessoas especiais como voc�, merecem o que de melhor existe.

Sorria muito hoje, pois seu sorriso aquece cora��es como mais nada neste mundo consegue. E seja muito feliz, n�o s� hoje, mas sempre e para sempre!','aniversario1.jpg','aniversario2.jpg','aniversario3.jpg','aniversario4.jpg');

INSERT INTO estados (sigla,descricao_est) VALUES 
('AC','Acre'),
('AL','Alagoas'),
('AP','Amap�'),
('AM','Amazonas'),
('BA','Bahia'),
('CE','Cear�'),
('DF','Distrito Federal'),
('ES','Esp�rito Santo'),
('GO','Goi�s'),
('MA','Maranh�o'),
('MT','Mato Grosso'),
('MS','Mato Grosso do Sul'),
('MG','Minas Gerais'),
('PA','Par�'),
('PB','Para�ba'),
('PR','Paran�'),
('PE','Pernambuco'),
('PI','Piau�'),
('RJ','Rio de Janeiro'),
('RN','Rio Grande do Norte'),
('RS','Rio Grande do Sul'),
('RO','Rond�nia'),
('RR','Roraima'),
('SC','Santa Catarina'),
('SP','S�o Paulo'),
('SE','Sergipe'),
('TO','Tocantins');

INSERT INTO despesa (valor_pago) VALUES 
('500.00');
