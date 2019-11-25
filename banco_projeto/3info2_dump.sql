-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Nov-2019 às 13:55
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3info2`
--
CREATE DATABASE IF NOT EXISTS `3info2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `3info2`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_evento`
--

DROP TABLE IF EXISTS `categoria_evento`;
CREATE TABLE `categoria_evento` (
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `descricao` longtext,
  `foto1` varchar(100) DEFAULT NULL,
  `foto2` varchar(100) DEFAULT NULL,
  `foto3` varchar(100) DEFAULT NULL,
  `foto4` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria_evento`
--

INSERT INTO `categoria_evento` (`id_categoria`, `nome`, `descricao`, `foto1`, `foto2`, `foto3`, `foto4`) VALUES
(1, '15 anos', 'Na primavera de cada aniversário que comemoramos, existem datas que são bem mais especiais que outras. E você hoje esta vivendo uma das mais bonitas e marcantes, os esperados e desejados 15 anos. Que felicidade poder estar ao seu lado para ver todo o brilho que emana no seu sorriso lindo. Este é o aniversário que marcará a transição da infância para a sua adolescência, uma fase diferente e cheia de mistérios a serem desvendados, e muitas aventuras a serem vividas. A descoberta de sua própria identidade, uma maneira diferente de enxergar a vida e o mundo. O amadurecimento tem um toque especial e cheio de encanto, e acredito que fazer 15 anos carrega em si um caráter mágico, pois é um período onde florescem as responsabilidades. Viva com sabedoria e muita dignidade os seus 15 anos, pois será o começo da procura de sua felicidade. Parabéns pelos seus lindos 15 anos!', '15anos1.jpg', '15anos2.jpg', '15anos3.jpg', '15anos4.jpg'),
(2, 'Casamento', 'O casamento é um de um laço de amor. Um laço que deve ser leve como um abraço, não apertado como um nó, mas firme o suficiente para não se desfazer com o vento. O casamento deve ser feito de amor, de respeito e admiração. Deve sobreviver ao fim da paixão, a tormentas e qualquer tipo de tentação. Num casamento deve haver diálogo, não discussão. O importante não é saber quem tem razão, mas encontrar um consenso. Num casamento, as duas partes devem aprender a ceder. Se apenas um cede, sem nada em troca receber, a frustração se instala e a amargura pode começar a crescer. As mágoas e tristezas que surgem não devem ser guardadas, devem virar palavras, que sejam escritas ou faladas.', 'casamento1.jpg', 'casamento2.jpg', 'casamento3.jpg', 'casamento4.jpg'),
(3, 'Corporativo', 'O fim de um ano, a comemoração de uma data especial ou a celebração de projeto é de muita alegria, é o momento para agradecer, aos familiares e aos colegas de trabalhos, então nada melhor que montar um evento para comemorar os desafios que superaram com a ajuda daqueles que nunca te deixaram sozinho, que sempre estiveram ao seu lado, independente do dia e do tempo, celebrar após um dever cumprido te da forças para continuar em frente nos próximos anos, venha montar seu evento conosco, celebrar com os amigos e familiares é a melhor forma de se divertir.', 'corporativa1.jpg', 'corporativa2.jpg', 'corporativa3.jpg', 'corporativa4.png'),
(4, 'Formatura', 'O sucesso é daqueles que batalham, e com toda certeza você é um dos merecedores desse sucesso. Que a alegria da formatura hoje, fique para sempre em você, para que a felicidade também contagie aqueles que da sua profissão se beneficiarem. Pessoas grandes são aquelas que lutam por ideais, e hoje nesta formatura você prova ser parte dessas pessoas. A sua conquista vai impulsionar outras buscas e abrir novos horizontes, sempre apontando para um futuro muito luminoso. Por acreditar que este dia chegaria, você se esforçou e buscou a cada dia o seu sonho. Merecidamente venceu, e hoje os aplausos são todos para você! O que você alcançou hoje é uma pequena parte do que você ainda pode conquistar com o seu talento. O talento, a força de vontade e a persistência trouxeram você até aqui. Esperamos que esta vitória seja o início de muitas outras conquistas. Parabéns pela formatura!\r\n', 'formatura1.jpg', 'formatura2.jpg', 'formatura3.jpg', 'formatura4.jpg'),
(5, 'Aniversário Infantil', 'Você é muito especial e a cada ano que passa só me surpreende e me encanta com o seu jeitinho de ser. Feliz aniversário! Que o dia de hoje seja inesquecível, cheio de brincadeiras e muitos presentes! Ser criança é viver em um mundo onde só há diversão, alegria e muito amor e o meu maior desejo para sua vida é que ela seja sempre feliz, que nunca faltem sorrisos, amigos, aventuras e sonhos realizados! Que você nunca perca a sua alegria de viver e que Deus te abençoe sempre. Que você cresça e se torne cada vez mais uma pessoa de bem, inteligente, dedicado, que sempre fala a verdade e faz questão de ajudar as pessoas. Que Jesus e seus anjos te protejam, te acompanhem e te iluminem sempre. Parabéns!\r\n', 'infantil3.jpg', 'infantil2.jpg', 'infantil1.jpg', 'infantil4.jpg'),
(6, 'Aniversários', 'Hoje é dia de grandes sorrisos, de fazer um pequeno balanço do que passou, de inspirar sonhos e desejos para o futuro, e principalmente de receber carinho e homenagens muito merecidas. Os meus votos são enviados à distância, mas nem por isso são menos sinceros ou sentidos. Feliz aniversário! E você sabe como é especial para mim, muito especial, e de como eu gostaria de estar hoje do seu lado, de lhe dar este abraço e este beijo que há muito vivem querendo fugir de mim até você. Mas a vida é mesmo assim, e nem sempre o que queremos se torna realidade. Mas espero que seus desejos se realizem, que a você a vida faça a vontade, pois pessoas especiais como você, merecem o que de melhor existe. Sorria muito hoje, pois seu sorriso aquece corações como mais nada neste mundo consegue. E seja muito feliz, não só hoje, mas sempre e para sempre!', 'aniversario1.jpg', 'aniversario2.jpg', 'aniversario3.jpg', 'aniversario4.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `convidados`
--

DROP TABLE IF EXISTS `convidados`;
CREATE TABLE `convidados` (
  `id_convidado` int(11) NOT NULL,
  `idade` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `id_evento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `convidados`
--

INSERT INTO `convidados` (`id_convidado`, `idade`, `nome`, `id_evento`) VALUES
(1, 15, 'Mariana Gonçalves', 1),
(3, 21, 'Beatriz Souza', 4),
(4, 45, 'Geovana Oliveira', 7),
(5, 12, 'Lorenzo Emanuel Bressan', 9),
(6, 65, 'Heitor Bressan', 10),
(7, 44, 'Luana Fagundes', 1),
(8, 20, 'Gilceia Mendonça', 1),
(9, 18, 'Kelvin Bressan', 6),
(10, 25, 'Lia Bressan', 5),
(11, 18, 'Bianca Victória Leithold de Oliveira', 8),
(12, 48, 'João Antonio Santos', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesa`
--

DROP TABLE IF EXISTS `despesa`;
CREATE TABLE `despesa` (
  `id_despesa` int(11) NOT NULL,
  `valor_pago` decimal(10,2) DEFAULT NULL,
  `id_evento` int(11) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `despesa`
--

INSERT INTO `despesa` (`id_despesa`, `valor_pago`, `id_evento`, `id_empresa`) VALUES
(1, '500.00', 1, 5),
(3, '2500.50', 3, 12),
(5, '400.00', 5, 5),
(6, '450.00', 6, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `cnpj` varchar(50) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `numero` varchar(50) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `foto_perfil` varchar(100) DEFAULT NULL,
  `descricao` longtext,
  `telefone` varchar(100) DEFAULT NULL,
  `email_empresa` varchar(100) DEFAULT NULL,
  `sigla` varchar(2) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `cnpj`, `nome`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `foto_perfil`, `descricao`, `telefone`, `email_empresa`, `sigla`, `id_usuario`) VALUES
(1, '28.661.535/0001-22', 'Floricultura Jujuba', 'Palmeiras', '145', 'Casa', 'Itinga', 'Araquari', 'jujuba.jpg', 'Flores em geral, produtos importados e de qualidade desde 1970.', '(47)3466-5989', 'jujuba@gmail.com', 'SC', 1),
(2, '57.208.376/0001-03', 'Restaurante Fernandes', 'João Pinheiro', '458', 'Casa', 'Centro', 'Goiás', NULL, 'Especializados em frutos do mar.', '(47)3466-8888', 'rest_fernandes@gmail.com', 'GO', 2),
(3, '82.710.153/0001-97', 'Salão de Beleza Serena', 'Tupy', '1026', 'Casa', 'São Marcos', 'Joinville', 'serena.jpg', 'Desde 1986 a Serena Cabeleireira oferece um mundo de beleza para os clientes que frequentam o salão, com serviços de qualidade impecáveis. Num ambiente acolhedor, com uma decoração encantadora, Serena (que é o nome da proprietária), suas filhas e sua equipe recebem seu público com muita alegria e satisfação, tornando os momentos vividos dentro de seu espaço inesquecíveis. Durante todos esses anos de existência, a Serena desenvolveu um novo conceito de salão de beleza, num nível de profissionalismo, gestão e inovação inimagináveis. Hoje a Serena reestruturou a sua marca e ampliou o espaço formando dois ambientes distintos: Serena Cabelo, Corpo e Pele e Serena Noivas e Festas, oferecendo serviços de excelência para pessoas exigentes. A Serena tem uma estrutura física adequada para atender de forma confortável cada procedimento a ser realizado nas suas clientes. Espaços exclusivos para cuidados com os cabelos, unhas, estética, pele e festas.', '(47)3438-8098', 'serena@serenacabeleireira.com.br', 'SC', 3),
(4, '11.820.025/0001-58', 'Barbearia Gomes', 'Antônio Neves', '32', 'Casa', 'Atiradores', 'Rio de Janeiro', NULL, 'Excelência, qualidade e profissionalismo é nosso lema!', '(47)3465-7826', 'barbearia_gomes@gmail.com', 'RJ', 4),
(5, '85.270.164/0001-91', 'Confeitaria Delícias', 'Pedro Paulo', '128', 'Apartamento 4658', 'Iririú', 'Joinville', NULL, 'O sabor dos sonhos...', '(47)3465-9829', 'confeitaria_delicia@gmail.com', 'SC', 1),
(6, '47.367.062/0001-08', 'Joalheria Univesal', 'João Pedro', '894', 'Casa', 'Porto Grande', 'Araquari', NULL, 'Brilhe como uma joia!', '(47)3463-5625', 'joalheria_universal@gmail.com', 'SC', 5),
(7, '26.356.309/0001-02', 'Brasil Noivas e Debutantes', 'São Paulo', '480', 'Casa', 'Bucarein', 'Joinville', 'brasil.jpg', 'Loja especializada na locação de trajes de noivas e debutantes, a mais de 30 anos no mercado. Contamos com profissionais de alto nível para realizar seus sonhos. Exclusividade nas marcas CENTER NOIVAS e NOVA NOIVA, com as coleções mais atuais do mercado. Trabalhamos também com estilista própria, NELIZE BRASIL, designer de moda especialista em alta costura.', '(47)3013-0800', 'brasilnoivas2018@gmail.com', 'SC', 6),
(9, '59.243.815/0001-44', 'Restaurante Brace', 'Joaquim Ferreira', '30', 'Casa', 'Centro', 'Joinville', NULL, 'O Restaurante Brace foi inaugurado no dia 30 de setembro de 1990, desde então vem sendo o restaurante predileta de todos os habitantes de Joinville e região, fornecendo 200 tipos de pratos e sobremesas finas mais saborosos de Santa Catarina. Trabalhamos com qualquer tipo de evento, temos uma equipe rápida e competente, capaz de trabalhar com pequenos e grandes eventos.', '(47)3435-2255', 'restaurante_brace@gmail.com', 'SC', 9),
(10, '00.839.240/0001-84', 'Expressiva Homem', ' Princesa Isabel', '527', 'Casa', 'Centro', 'Joinville', 'expressiva.jpg', 'A história da Expressiva começou com os irmãos gêmeos Giacomelli em 10 de agosto de 1992. Uma história de persistência e de dedicação que transformou um sonho em realidade. Com o nome de Moda Expressiva e localizada numa pequena sala lateral da Rua Princesa Izabel, se estabeleceu a loja com o objetivo de oferecer um serviço de qualidade principalmente para o público feminino. Em 1994, foi inaugurada uma filial da Moda Expressiva na Travessa Sergipe nº 32 desta vez, tendo como foco a moda masculina, que deu origem mais tarde, em 1996, à loja Expressiva Homem. Percebendo a necessidade de instalações mais amplas e modernas, foi que em 2003, a Expressiva Homem mudou seu endereço para a Rua Princesa Izabel nº 527, seu atual endereço. Hoje a Expressiva ocupa uma área total de 400 m2 e sempre se preocupa em oferecer novidades da moda masculina, atendimento diferenciado e de qualidade, além de no seu portfólio de produtos marcas de reconhecimento nacional. Na Expressiva você encontra as últimas tendências em Moda Masculina, nos estilos casual, esportivo e social. Para os noivos, a Expressiva possui um espaço exclusivo, você vai se encantar com a variedade de opções e com o atendimento especializado.', '(47)3433-4414', 'comercial@expressivahomem.com.br', 'SC', 8),
(11, '00.665.699/0001-09', 'Maison Center Noivas', 'Coelho Neto', '722', 'Apartamento', 'Santo Antonio', 'Joinville', 'maison.png', 'Para você estar deslumbrante no seu dia especial, é preciso contar com uma estrutura e profissionais a altura. Na Maison Center Noivas, você recebe a assessoria cuidadosa de uma das mais renomadas estilistas, para acertar em cheio na escolha.', '(47)3422-7555', 'maisoncenternoivas@gmail.com.br', 'SC', 7),
(12, '80.405.616/0001-81', 'Restaurante e Pizzaria do Nego', 'Fátima', '504', 'Apartamento 4658', 'Fátima', 'Joinville', 'nego.png', 'O Restaurante do Nego oferece aos clientes almoço e jantar diariamente de domingo a domingo. Com capacidade para atender 400 pessoas, com um cardápio variado a cada dia, ambiente moderno e climatizado, gerador de energia própria e profissionais capacitados. O Restaurante do Nego busca atender seus clientes com conforto e qualidade sempre da melhor maneira. Servindo no almoço Buffet Livre o a quilo e no jantar além de Buffet Livre, servimos lanches, pizzas, porções e carnes na tábua.', '(47)3441-0800', 'nego@restaurantedonego.com.br', 'SC', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `emp_categ`
--

DROP TABLE IF EXISTS `emp_categ`;
CREATE TABLE `emp_categ` (
  `id_categoria` int(11) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `emp_categ`
--

INSERT INTO `emp_categ` (`id_categoria`, `id_empresa`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(2, 4),
(4, 4),
(1, 5),
(2, 5),
(3, 5),
(4, 5),
(5, 5),
(6, 5),
(1, 6),
(2, 6),
(4, 6),
(1, 9),
(2, 9),
(3, 9),
(4, 9),
(5, 9),
(6, 9),
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(1, 3),
(2, 3),
(4, 3),
(1, 7),
(2, 7),
(2, 10),
(4, 10),
(1, 11),
(2, 11),
(4, 11),
(1, 12),
(2, 12),
(3, 12),
(4, 12),
(5, 12),
(6, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `emp_esp`
--

DROP TABLE IF EXISTS `emp_esp`;
CREATE TABLE `emp_esp` (
  `id_empresa` int(11) DEFAULT NULL,
  `id_especializacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `emp_esp`
--

INSERT INTO `emp_esp` (`id_empresa`, `id_especializacao`) VALUES
(2, 4),
(2, 13),
(4, 2),
(5, 7),
(6, 20),
(2, 17),
(9, 4),
(9, 13),
(9, 17),
(1, 9),
(1, 11),
(3, 21),
(7, 16),
(10, 16),
(11, 16),
(12, 13),
(12, 17),
(2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `especializacao`
--

DROP TABLE IF EXISTS `especializacao`;
CREATE TABLE `especializacao` (
  `id_especializacao` int(11) NOT NULL,
  `descricao_esp` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `especializacao`
--

INSERT INTO `especializacao` (`id_especializacao`, `descricao_esp`) VALUES
(1, 'Animação'),
(2, 'Barbearia'),
(3, 'Brinquedos'),
(4, 'Buffet'),
(5, 'Cerimonialista'),
(6, 'Cia Viagem'),
(7, 'Confeitaria'),
(8, 'Convite'),
(9, 'Decoração'),
(10, 'Filmagem'),
(11, 'Floricultura'),
(12, 'Fotografia'),
(13, 'Garçom'),
(14, 'Lembranças'),
(15, 'Locação de Carro'),
(16, 'Locação e Compra de Trajes'),
(17, 'Locação do Local'),
(18, 'Música'),
(19, 'Recepção'),
(20, 'Joalheria'),
(21, 'Salão de Beleza'),
(22, 'Segurança');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

DROP TABLE IF EXISTS `estados`;
CREATE TABLE `estados` (
  `sigla` varchar(2) NOT NULL,
  `descricao_est` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`sigla`, `descricao_est`) VALUES
('AC', 'Acre'),
('AL', 'Alagoas'),
('AM', 'Amazonas'),
('AP', 'Amapá'),
('BA', 'Bahia'),
('CE', 'Ceará'),
('DF', 'Distrito Federal'),
('ES', 'Espírito Santo'),
('GO', 'Goiás'),
('MA', 'Maranhão'),
('MG', 'Minas Gerais'),
('MS', 'Mato Grosso do Sul'),
('MT', 'Mato Grosso'),
('PA', 'Pará'),
('PB', 'Paraíba'),
('PE', 'Pernambuco'),
('PI', 'Piauí'),
('PR', 'Paraná'),
('RJ', 'Rio de Janeiro'),
('RN', 'Rio Grande do Norte'),
('RO', 'Rondônia'),
('RR', 'Roraima'),
('RS', 'Rio Grande do Sul'),
('SC', 'Santa Catarina'),
('SE', 'Sergipe'),
('SP', 'São Paulo'),
('TO', 'Tocantins');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `nome_evento` varchar(50) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `dia` date DEFAULT NULL,
  `local` varchar(50) DEFAULT NULL,
  `valor_max_pagar` decimal(10,0) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`id_evento`, `nome_evento`, `hora`, `descricao`, `dia`, `local`, `valor_max_pagar`, `id_usuario`) VALUES
(1, 'Casamento', '10:05:00', 'Casamento Luana e Luan', '2019-05-22', 'Restaurante Viapiana', '20000', 1),
(3, 'Aniversário 15 anos', '08:25:00', '15 anos Maria', '2019-12-15', 'Restaurante do Nego', '10000', 2),
(4, 'Aniversário', '07:25:00', 'Aniversário Lucas', '2019-06-22', 'Restaurante Estrela', '5000', 9),
(5, 'Aniversário', '11:35:00', 'Aniversário Cecília', '2019-10-05', 'Restaurante Kaoma', '8000', 3),
(6, 'Aniversário', '16:00:00', '1 ano do Vitor', '2020-06-26', 'Estrela Eventos', '2000', 8),
(7, 'Festa coorporativa', '13:55:00', 'Coorporativa da Britânia ', '2019-05-22', 'Restaurante São José', '60000', 4),
(8, 'Casamento', '14:25:00', 'Casamento Fernanda e Luciano', '2019-05-15', 'Restaurante Viapiana', '40000', 7),
(9, 'Aniversário', '15:30:00', 'Aniversário do Leandro', '2019-03-25', 'Casa do pão', '3000', 5),
(10, 'Aniversário', '16:05:00', 'Aniversário da Karen', '2019-05-03', 'Restaurante Varandão', '4000', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria_empresa`
--

DROP TABLE IF EXISTS `galeria_empresa`;
CREATE TABLE `galeria_empresa` (
  `id_foto` int(11) NOT NULL,
  `descricao_foto` varchar(200) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `galeria_empresa`
--

INSERT INTO `galeria_empresa` (`id_foto`, `descricao_foto`, `id_empresa`) VALUES
(1, 'bolos1.jpeg', 5),
(2, 'bolos2.jpg', 5),
(3, 'bolos4.jpg', 5),
(4, 'bolos5.jpg', 5),
(10, 'restaurante2.jpeg', 2),
(11, 'restaurante3.jpg', 2),
(12, 'restaurante4.jpg', 2),
(13, 'restaurante5.jpg', 9),
(14, 'restaurante6.jpg', 9),
(15, 'restaurante7.jpg', 12),
(16, 'salmao-com-salada.jpg', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefas`
--

DROP TABLE IF EXISTS `tarefas`;
CREATE TABLE `tarefas` (
  `id_tarefa` int(11) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `horario` time DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `situacao` tinyint(1) DEFAULT '0',
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tarefas`
--

INSERT INTO `tarefas` (`id_tarefa`, `titulo`, `data`, `horario`, `descricao`, `situacao`, `id_usuario`) VALUES
(1, 'Reunião', '2019-01-01', '10:10:00', 'Reunião decoração', 0, 1),
(2, 'Reunião', '2019-02-04', '09:20:00', 'Reunião com banda', 0, 3),
(3, 'Teste', '2019-03-03', '08:30:00', 'Teste de penteado', 0, 5),
(4, 'Degustação', '2019-04-02', '13:20:00', 'Degustação buffet', 0, 7),
(5, 'Prova', '2019-01-15', '10:10:00', 'Prova do vestido', 0, 9),
(6, 'Reunição', '2019-06-20', '17:15:00', 'Reuniao com cerimonialista', 0, 1),
(7, 'Degustação de docinhos', '2019-04-25', '15:00:00', 'Escolher docinhos para 15 anos da Maria', 0, 2),
(8, 'Prova do vestido', '2020-02-20', '10:00:00', 'Prova do vestido para o aniversário', 0, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `foto_perfil` varchar(100) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `telefone`, `senha`, `foto_perfil`, `cpf`) VALUES
(1, 'Júlia Biff', 'ju@gmail.com', '(47)3455-5797', 'bola', 'juliabiff.jpeg', '158.814.702-90'),
(2, 'Bianca Leithold', 'bia@gmail.com', '(47)2565-4567', 'banana', 'biancaleithold.jpg', '273.778.022-51'),
(3, 'Elizabeth Antunes', 'beth@gmail.com', '(47)7755-4567', 'maca', 'elizabeth.png', '329.635.185-01'),
(4, 'Leticia dos Santos', 'leticia@gmail.com', '(47)5355-4567', 'batata', 'leticia.jpg', '422.821.472-00'),
(5, 'Joao Pedro', 'joao@gmail.com', '(47)6665-4567', 'tomate', 'joao.jpg', '538.172.449-75'),
(6, 'Natalia Dellandrea', 'nat@gmail.com', '(47)3355-4567', 'chocolate', NULL, '622.343.276-36'),
(7, 'Matheus Gomes', 'gomes@gmail.com', '(47)2225-4567', 'cebola', NULL, '651.132.287-45'),
(8, 'Ana Luiza Souza', 'luiza@gmail.com', '(47)1115-4567', 'abobora', 'analuiza.jpg', '668.265.905-90'),
(9, 'Karen Fernandes', 'karen@gmail.com', '(47)9346-5789', '1234', NULL, '713.438.116-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria_evento`
--
ALTER TABLE `categoria_evento`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `convidados`
--
ALTER TABLE `convidados`
  ADD PRIMARY KEY (`id_convidado`),
  ADD KEY `id_evento` (`id_evento`);

--
-- Indexes for table `despesa`
--
ALTER TABLE `despesa`
  ADD PRIMARY KEY (`id_despesa`),
  ADD KEY `id_evento` (`id_evento`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`),
  ADD KEY `sigla` (`sigla`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `emp_categ`
--
ALTER TABLE `emp_categ`
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indexes for table `emp_esp`
--
ALTER TABLE `emp_esp`
  ADD KEY `id_empresa` (`id_empresa`),
  ADD KEY `id_especializacao` (`id_especializacao`);

--
-- Indexes for table `especializacao`
--
ALTER TABLE `especializacao`
  ADD PRIMARY KEY (`id_especializacao`);

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`sigla`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `galeria_empresa`
--
ALTER TABLE `galeria_empresa`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indexes for table `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id_tarefa`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria_evento`
--
ALTER TABLE `categoria_evento`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `convidados`
--
ALTER TABLE `convidados`
  MODIFY `id_convidado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `despesa`
--
ALTER TABLE `despesa`
  MODIFY `id_despesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `especializacao`
--
ALTER TABLE `especializacao`
  MODIFY `id_especializacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `galeria_empresa`
--
ALTER TABLE `galeria_empresa`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id_tarefa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `convidados`
--
ALTER TABLE `convidados`
  ADD CONSTRAINT `convidados_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `despesa`
--
ALTER TABLE `despesa`
  ADD CONSTRAINT `despesa_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `despesa_ibfk_2` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`sigla`) REFERENCES `estados` (`sigla`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empresa_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `emp_categ`
--
ALTER TABLE `emp_categ`
  ADD CONSTRAINT `emp_categ_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_evento` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emp_categ_ibfk_2` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `emp_esp`
--
ALTER TABLE `emp_esp`
  ADD CONSTRAINT `emp_esp_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emp_esp_ibfk_2` FOREIGN KEY (`id_especializacao`) REFERENCES `especializacao` (`id_especializacao`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `galeria_empresa`
--
ALTER TABLE `galeria_empresa`
  ADD CONSTRAINT `galeria_empresa_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD CONSTRAINT `tarefas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
