-- CADASTRO PERFIL USUÁRIO

    INSERT INTO usuario (nome, email, telefone, senha, cpf) VALUES ('Luiza Biff', 'luizinha@gmail.com', '934554797', '444lu', '158.074.105-80');

-- CONSULTA LOGIN 

    SELECT email, senha FROM usuario WHERE email = 'luizinha@gmail.com' and senha = '444lu';

-- DADOS USUÁRIO P/ PERFIL

    SELECT nome, email, telefone, senha, cpf FROM usuario WHERE id_usuario = 21;

-- ALTERAÇÃO PERFIL USUÁRIO

    UPDATE usuario SET nome = 'Mariele De Oliveira', email = 'marieleoliveira@gmail.com' WHERE id_usuario = 21;






-- CADASTRO EMPRESA

    INSERT INTO empresa (cnpj, nome, rua, numero, complemento, bairro, cidade, estado, descricao, telefone, email) VALUES ('28.661.984/0001-22', 'Steffen Doces e Salgados', 'Araça', '598', 'casa', 'Floresta', 'Joinville', 'Santa Catarina', 'Os melhores doces e salgados da cidade, desde 1999.', '(47)34568792', 'steffen@gmail.com');

-- DADOS EMPRESA P/ PERFIL

    SELECT nome, rua, numero, complemento, bairro, cidade, estado, descricao, telefone, email FROM empresa WHERE id_empresa = 17;

-- ALTERAÇÃO PERFIL EMPRESA

    UPDATE empresa SET nome = 'Steffen Bolos, Doces e Salgados', descricao = 'Os melhores bolos, doces e salgados, desde 1999.' WHERE id_usuario = 17;
