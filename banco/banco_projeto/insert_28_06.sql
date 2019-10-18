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
('57.208.376/0001-03', 'Restaurante Fernandes', 'João Pinheiro', '458', 'casa', 'Centro', 'Joinville', 'Especializados em frutos do mar.', '(47)34668888', 'rest_fernandes@gmail.com'),
('88.183.280/0001-61', 'Salão de Beleza Serena', 'Araras', '96', 'casa', 'São Marcos', 'Joinville', 'Realçando sua beleza desde 1998.', '(47)34668759', 'serena@gmail.com'),
('11.820.025/0001-58', 'Barbearia Gomes', 'Antônio Neves', '32', 'casa', 'Atiradores', 'Joinville', 'Excelência, qualidade e profissionalismo é nosso lema!', '(47)34657826', 'barbearia_gomes@gmail.com'),
('85.270.164/0001-91', 'Confeitaria Delícias', 'Pedro Paulo', '128', 'apartamento 4658', 'Iririú', 'Joinville', 'O sabor dos sonhos...', '(47)34659829', 'confeitaria_delicia@gmail.com'),
('47.367.062/0001-08', 'Joalheria Univesal', 'João Pedro', '894', 'casa', 'Porto Grande', 'Araquari', 'Brilhe como uma joia!', '(47)34635625', 'joalheria_universal@gmail.com'),
('68.660.186/0001-49', 'Brasil Noivas', 'Das Flores', '657', 'casa', 'Floresta', 'Joinville', 'Há mais de 30 anos tornando seu dia mais que especial.', '(47)34661125', 'brasil_noivas@gmail.com'),
('70.617.469/0001-50', 'Confeitaria Predileta', '  Hannah Mendes', '105', 'casa', 'Floresta', 'Joinville', 'A Confeitaria Sonhos foi inaugurada no dia 28 de agosto de 1984, desde então vem sendo a Confeitaria predileta dos habitantes de Joinville e região, fornecendo 200 tipos de sabores de bolos e os melhores doces típicos da região de Santa Catarina. Trabalhamos com qualquer tipo de evento, temos uma equipe rápida e competente, capaz de trabalhar com pequenos e grandes eventos.', ' (47)34441125', 'confeitaria_predileta@gmail.com'),
('59.243.815/0001-44', 'Restaurante Brace', 'Joaquim Ferreira', '30', 'casa', 'Centro', 'Joinville', 'O Restaurante Brace foi inaugurado no dia 30 de setembro de 1990, desde então vem sendo o restaurante predileta de todos os habitantes de Joinville e região, fornecendo 200 tipos de pratos e sobremesas finas mais saborosos de Santa Catarina. Trabalhamos com qualquer tipo de evento, temos uma equipe rápida e competente, capaz de trabalhar com pequenos e grandes eventos.', '4734352255', 'restaurante_brace@gmail.com')
('28.280.261/0001-21', 'Expressiva Homem', 'Dona Francisca', '57', 'casa', 'Saguaçu', 'Joinville', 'Especializada em vestuário para homens.', '(47)33445588', 'expressiva@gmail.com');

INSERT INTO tarefas (data, horario, descricao, titulo) VALUES 
('2019-01-01', '10:10:00', 'Reunião decoração', 'Reunião'),
('2019-02-04', '09:20:00', 'Reunião com banda', 'Reunião'),
('2019-03-03', '08:30:00', 'Teste de penteado', 'Teste'),
('2019-04-02', '13:20:00', 'Degustação buffet', 'Degustação'),
('2019-01-15', '10:10:00', 'Prova do vestido', 'Prova'),
('2019-06-20', '17:15:00', 'Reuniao com cerimonialista', 'Reunição');

INSERT INTO convidados (idade, nome) VALUES
(15, 'Mariana Gonçalves'),
(17, 'Leandro Bressan'),
(21, 'Beatriz Souza'),
(45, 'Geovana Oliveira'),
(12, 'Lorenzo Emanuel Bressan'),
(65, 'Heitor Bressan'),
(44, 'Luana Fagundes'),
(20, 'Gilceia Mendonï¿½a'),
(18, 'Kelvin Bressan'),
(25, 'Lia Bressan'),
(18, 'Bianca Victória Leithold de Oliveira');

INSERT INTO eventos (nome_evento, hora, descricao, dia, local, valor_max_pagar) VALUES 
('Casamento', '10:05:00', 'Casamento Luana e Luan', '2019-05-22', 'Restaurante Viapiana', '20000.00'),
('Casamento', '09:15:00', 'Casamento Fabio e Fabiana', '2019-10-22', 'Restaurante Espinheiros', '50000.00'),
('Aniversário 15 anos', '08:25:00', '15 anos Maria', '2019-08-23', 'Restaurante do Nego', '10000.00'),
('Aniversário', '07:25:00', 'Aniversário Lucas', '2019-06-22', 'Restaurante Estrela', '5000.00'),
('Aniversário', '11:35:00', 'Aniversário Cecília', '2019-10-05', 'Restaurante Kaoma', '8000.00'),
('Aniversário', '12:45:00', '1 ano do Vitor', '2019-06-26', 'Estrela Eventos', '2000.00'),
('Festa coorporativa', '13:55:00', 'Coorporativa da Britânia ', '2019-05-22', 'Restaurante São José', '60000.00'),
('Casamento', '14:25:00', 'Casamento Fernanda e Luciano', '2019-05-15', 'Restaurante Viapiana', '40000.00'),
('Aniversário', '15:30:00', 'Aniversário do Leandro', '2019-03-25', 'Casa do pão', '3000.00'),
('Aniversário', '16:05:00', 'Aniversário da Karen', '2019-05-03', 'Restaurante Varandão', '4000.00');

INSERT INTO especializacao (descricao_esp) VALUES 
('Animação'),
('Barbearia'),
('Brinquedos'),
('Buffet'),
('Cerimonialista'),
('Cia Viagem'),
('Confeitaria'),
('Convite'),
('Decoração'),
('Filmagem'),
('Floricultura'),
('Fotografia'),
('Garçom'),
('Lembrançass'),
('Locação de Carro'),
('Locação e Compra de Trajes'),
('Locação do Local'),
('Música'),
('Recepção'),
('Joalheria'),
('Salão de Beleza'),
('Segurança');

INSERT INTO categoria_evento (nome, descricao, foto1, foto2, foto3, foto4) VALUES
('15 anos','Na primavera de cada aniversário que comemoramos, existem datas que são bem mais especiais que outras. E você hoje esta vivendo uma das mais bonitas e marcantes, os esperados e desejados 15 anos. Que felicidade poder estar ao seu lado para ver todo o brilho que emana no seu sorriso lindo. Este é o aniversário que marcará a transição da infância para a sua adolescência, uma fase diferente e cheia de mistérios a serem desvendados, e muitas aventuras a serem vividas. A descoberta de sua própria identidade, uma maneira diferente de enxergar a vida e o mundo. O amadurecimento tem um toque especial e cheio de encanto, e acredito que fazer 15 anos carrega em si um caráter mágico, pois é um período onde florescem as responsabilidades. Viva com sabedoria e muita dignidade os seus 15 anos, pois será o começo da procura de sua felicidade. Parabéns pelos seus lindos 15 anos!','15anos1.jpg', '15anos2.jpg','15anos3.jpg', '15anos4.jpg'),

('Casamento','O casamento é um de um laço de amor. Um laço que deve ser leve como um abraço, não apertado como um nó, mas firme o suficiente para não se desfazer com o vento. O casamento deve ser feito de amor, de respeito e admiração. Deve sobreviver ao fim da paixão, a tormentas e qualquer tipo de tentação. Num casamento deve haver diálogo, não discussão. O importante não é saber quem tem razão, mas encontrar um consenso. Num casamento, as duas partes devem aprender a ceder. Se apenas um cede, sem nada em troca receber, a frustração se instala e a amargura pode começar a crescer. As mágoas e tristezas que surgem não devem ser guardadas, devem virar palavras, que sejam escritas ou faladas.', 'casamento1.jpg', 'casamento2.jpg', 'casamento3.jpg', 'casamento4.jpg'),

('Coorporativo','O fim de um ano, a comemoração de uma data especial ou a celebração de projeto é de muita alegria, é o momento para agradecer, aos familiares e aos colegas de trabalhos, então nada melhor que montar um evento para comemorar os desafios que superaram com a ajuda daqueles que nunca te deixaram sozinho, que sempre estiveram ao seu lado, independente do dia e do tempo, celebrar após um dever cumprido te da forças para continuar em frente nos próximos anos, venha montar seu evento conosco, celebrar com os amigos e familiares é a melhor forma de se divertir.', 'corporativa1.jpg', 'corporativa2.jpg', 'corporativa3.jpg', 'corporativa4.png'),

('Formatura','O sucesso é daqueles que batalham, e com toda certeza você é um dos merecedores desse sucesso. Que a alegria da formatura hoje, fique para sempre em você, para que a felicidade também contagie aqueles que da sua profissão se beneficiarem. Pessoas grandes são aquelas que lutam por ideais, e hoje nesta formatura você prova ser parte dessas pessoas. A sua conquista vai impulsionar outras buscas e abrir novos horizontes, sempre apontando para um futuro muito luminoso. Por acreditar que este dia chegaria, você se esforçou e buscou a cada dia o seu sonho. Merecidamente venceu, e hoje os aplausos são todos para você! O que você alcançou hoje é uma pequena parte do que você ainda pode conquistar com o seu talento. O talento, a força de vontade e a persistência trouxeram você até aqui. Esperamos que esta vitória seja o início de muitas outras conquistas. Parabéns pela formatura!
', 'formatura1.jpg', 'formatura2.jpg', 'formatura3.jpg', 'formatura4.jpg'),

('Aniversário Infantil','Você é muito especial e a cada ano que passa só me surpreende e me encanta com o seu jeitinho de ser. Feliz aniversário! Que o dia de hoje seja inesquecível, cheio de brincadeiras e muitos presentes! Ser criança é viver em um mundo onde só há diversão, alegria e muito amor e o meu maior desejo para sua vida é que ela seja sempre feliz, que nunca faltem sorrisos, amigos, aventuras e sonhos realizados! Que você nunca perca a sua alegria de viver e que Deus te abençoe sempre. Que você cresça e se torne cada vez mais uma pessoa de bem, inteligente, dedicado, que sempre fala a verdade e faz questão de ajudar as pessoas. Que Jesus e seus anjos te protejam, te acompanhem e te iluminem sempre. Parabéns!
', 'infantil3.jpg', 'infantil2.jpg', 'infantil1.jpg', 'infantil4.jpg'),

('Aniversários','Hoje é dia de grandes sorrisos, de fazer um pequeno balanço do que passou, de inspirar sonhos e desejos para o futuro, e principalmente de receber carinho e homenagens muito merecidas. Os meus votos são enviados à distância, mas nem por isso são menos sinceros ou sentidos. Feliz aniversário! E você sabe como é especial para mim, muito especial, e de como eu gostaria de estar hoje do seu lado, de lhe dar este abraço e este beijo que há muito vivem querendo fugir de mim até você. Mas a vida é mesmo assim, e nem sempre o que queremos se torna realidade. Mas espero que seus desejos se realizem, que a você a vida faça a vontade, pois pessoas especiais como você, merecem o que de melhor existe. Sorria muito hoje, pois seu sorriso aquece corações como mais nada neste mundo consegue. E seja muito feliz, não só hoje, mas sempre e para sempre!','aniversario1.jpg','aniversario2.jpg','aniversario3.jpg','aniversario4.jpg');

INSERT INTO estados (sigla,descricao_est) VALUES 
('AC','Acre'),
('AL','Alagoas'),
('AP','Amapá'),
('AM','Amazonas'),
('BA','Bahia'),
('CE','Ceará'),
('DF','Distrito Federal'),
('ES','Espírito Santo'),
('GO','Goiás'),
('MA','Maranhão'),
('MT','Mato Grosso'),
('MS','Mato Grosso do Sul'),
('MG','Minas Gerais'),
('PA','Pará'),
('PB','Paraíba'),
('PR','Paraná'),
('PE','Pernambuco'),
('PI','Piauí'),
('RJ','Rio de Janeiro'),
('RN','Rio Grande do Norte'),
('RS','Rio Grande do Sul'),
('RO','Rondônia'),
('RR','Roraima'),
('SC','Santa Catarina'),
('SP','São Paulo'),
('SE','Sergipe'),
('TO','Tocantins');

INSERT INTO despesa (valor_pago) VALUES 
('500.00');

