DROP TABLE IF EXISTS alertas;

CREATE TABLE `alertas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_alerta` varchar(20) NOT NULL,
  `titulo_mensagem` varchar(100) NOT NULL,
  `mensagem` varchar(1000) NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `data` date NOT NULL,
  `ativo` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO alertas VALUES("1","Promoção Imperdível","Combo de 8 Camisetas","Combo com 8 camisetas de 260 reais por apenas 160 reais.","http://google.com","cat-2.jpg","2020-09-02","Sim");
INSERT INTO alertas VALUES("3","fdsafdsfa","fdfadf","dfasfdsafsad","http://google.com","sem-foto.jpg","2020-09-01","Não");


DROP TABLE IF EXISTS carac;

CREATE TABLE `carac` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO carac VALUES("1","Tamanho");
INSERT INTO carac VALUES("2","Cor");
INSERT INTO carac VALUES("3","Numeração");
INSERT INTO carac VALUES("4","Voltagem");


DROP TABLE IF EXISTS carac_itens;

CREATE TABLE `carac_itens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_carac_prod` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `valor_item` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

INSERT INTO carac_itens VALUES("1","11","Azul","#80acf2");
INSERT INTO carac_itens VALUES("2","3","Azul","#80acf2");
INSERT INTO carac_itens VALUES("3","3","Vermelho","#cf4023");
INSERT INTO carac_itens VALUES("4","10","P",NULL);
INSERT INTO carac_itens VALUES("5","10","M",NULL);
INSERT INTO carac_itens VALUES("6","10","G",NULL);
INSERT INTO carac_itens VALUES("7","10","GG",NULL);
INSERT INTO carac_itens VALUES("8","3","Amarelo",NULL);
INSERT INTO carac_itens VALUES("9","3","Verde",NULL);
INSERT INTO carac_itens VALUES("12","11","Vermelho",NULL);
INSERT INTO carac_itens VALUES("13","15","30 e 31",NULL);
INSERT INTO carac_itens VALUES("14","15","32 e 33",NULL);
INSERT INTO carac_itens VALUES("15","16","Marron",NULL);
INSERT INTO carac_itens VALUES("16","16","Preto",NULL);
INSERT INTO carac_itens VALUES("17","17","34/35",NULL);
INSERT INTO carac_itens VALUES("18","17","36/37",NULL);
INSERT INTO carac_itens VALUES("19","18","Azul",NULL);
INSERT INTO carac_itens VALUES("20","20","P",NULL);
INSERT INTO carac_itens VALUES("22","21","Preta","#000");
INSERT INTO carac_itens VALUES("23","21","Azul","#939ced");
INSERT INTO carac_itens VALUES("24","22","P",NULL);
INSERT INTO carac_itens VALUES("25","22","M",NULL);
INSERT INTO carac_itens VALUES("26","22","G",NULL);
INSERT INTO carac_itens VALUES("27","22","GG",NULL);
INSERT INTO carac_itens VALUES("29","21","Verde Escuro","#073817");
INSERT INTO carac_itens VALUES("30","21","Verde Claro","#6fd691");
INSERT INTO carac_itens VALUES("31","21","Laranja","#b5631b");
INSERT INTO carac_itens VALUES("32","19","Azul","#2640bf");
INSERT INTO carac_itens VALUES("33","19","Preta","#000");
INSERT INTO carac_itens VALUES("34","20","M",NULL);
INSERT INTO carac_itens VALUES("35","23","P M G",NULL);
INSERT INTO carac_itens VALUES("36","24","P M G",NULL);
INSERT INTO carac_itens VALUES("37","20","G",NULL);
INSERT INTO carac_itens VALUES("38","20","GG",NULL);


DROP TABLE IF EXISTS carac_prod;

CREATE TABLE `carac_prod` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_carac` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

INSERT INTO carac_prod VALUES("3","2","1");
INSERT INTO carac_prod VALUES("10","1","1");
INSERT INTO carac_prod VALUES("11","2","3");
INSERT INTO carac_prod VALUES("12","3","3");
INSERT INTO carac_prod VALUES("13","1","3");
INSERT INTO carac_prod VALUES("14","4","3");
INSERT INTO carac_prod VALUES("15","3","1");
INSERT INTO carac_prod VALUES("16","2","23");
INSERT INTO carac_prod VALUES("17","3","23");
INSERT INTO carac_prod VALUES("18","2","31");
INSERT INTO carac_prod VALUES("19","2","30");
INSERT INTO carac_prod VALUES("20","1","30");
INSERT INTO carac_prod VALUES("21","2","25");
INSERT INTO carac_prod VALUES("22","1","25");
INSERT INTO carac_prod VALUES("23","1","33");
INSERT INTO carac_prod VALUES("24","3","32");


DROP TABLE IF EXISTS categorias;

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `nome_url` varchar(50) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO categorias VALUES("10","Cuecas Cordoba","cuecas-cordoba","item-1.png");
INSERT INTO categorias VALUES("11","Cuecas Cordoba camu","cuecas-cordoba-camu","item-2.png");
INSERT INTO categorias VALUES("12","Kit Cueca Cordoba","kit-cueca-cordoba","item-4.png");
INSERT INTO categorias VALUES("13","Calcinhas","calcinhas","item-3.png");


DROP TABLE IF EXISTS clientes;

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `rua` varchar(80) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` varchar(5) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `cartoes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO clientes VALUES("1","Alice Santos","000.000.000-40","alice@hotmail.com",NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO clientes VALUES("2","Cliente Teste","000.000.000-10","cliente@hotmail.com",NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO clientes VALUES("3","Matheus Silva","184.854.545-44","mateus@hotmail.com",NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO clientes VALUES("4","Rozane da cruz salomao","141.496.458-76","ro@gmail.com",NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);


DROP TABLE IF EXISTS combos;

CREATE TABLE `combos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `nome_url` varchar(50) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `descricao_longa` text NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `tipo_envio` int(1) NOT NULL,
  `palavras` varchar(250) NOT NULL,
  `ativo` varchar(5) NOT NULL,
  `peso` double(8,2) NOT NULL,
  `largura` double(8,2) NOT NULL,
  `altura` double(8,2) NOT NULL,
  `comprimento` double(8,2) NOT NULL,
  `valor_frete` decimal(10,2) DEFAULT NULL,
  `vendas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO combos VALUES("1","Camisa e Bermuda","camisa-e-bermuda","fdsfd","fsdfdsf","139.99","cat-1.jpg","1","fdsaf","Sim","1.00","1.00","1.00","1.00","0.00",NULL);
INSERT INTO combos VALUES("3","Kit Cueca Cordoba","kit-cueca-cordoba","fsdfds","fsdf","199.00","item-4.png","1","afdsaf","Sim","1.00","1.00","1.00","1.00","0.00",NULL);


DROP TABLE IF EXISTS emails;

CREATE TABLE `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `ativo` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO emails VALUES("1","José Silva","hugovasconcelosf@hotmail.com","Sim");
INSERT INTO emails VALUES("2","João Silva","contato@hugocursos.com.br","Sim");
INSERT INTO emails VALUES("3","Alice Santos","alice@hotmail.com","Sim");
INSERT INTO emails VALUES("4","Cliente Teste","cliente@hotmail.com","Sim");
INSERT INTO emails VALUES("5","Matheus Silva","mateus@hotmail.com","Sim");
INSERT INTO emails VALUES("6","Rozane da cruz salomao","ro@gmail.com","Sim");


DROP TABLE IF EXISTS imagens;

CREATE TABLE `imagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

INSERT INTO imagens VALUES("11","1","cat-4.jpg");
INSERT INTO imagens VALUES("13","3","cat-2.jpg");
INSERT INTO imagens VALUES("14","3","cat-4.jpg");
INSERT INTO imagens VALUES("15","3","cat-7.jpg");
INSERT INTO imagens VALUES("16","1","cat-6.jpg");
INSERT INTO imagens VALUES("19","31","cat-4.jpg");
INSERT INTO imagens VALUES("21","25","ca misa social.jpg");
INSERT INTO imagens VALUES("22","25","Blusa-azul.jpg");
INSERT INTO imagens VALUES("23","25","Blusa Ver.jpg");
INSERT INTO imagens VALUES("24","25","Polo Marinho.jpg");
INSERT INTO imagens VALUES("25","25","Blue.jpg");
INSERT INTO imagens VALUES("26","30","item-1.png");


DROP TABLE IF EXISTS prod_combos;

CREATE TABLE `prod_combos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `id_combo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

INSERT INTO prod_combos VALUES("9","24","1");
INSERT INTO prod_combos VALUES("10","25","1");
INSERT INTO prod_combos VALUES("13","30","1");
INSERT INTO prod_combos VALUES("14","23","1");
INSERT INTO prod_combos VALUES("15","30","3");
INSERT INTO prod_combos VALUES("18","24","3");
INSERT INTO prod_combos VALUES("19","22","3");


DROP TABLE IF EXISTS produtos;

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` int(11) NOT NULL,
  `sub_categoria` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nome_url` varchar(100) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `descricao_longa` text NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `estoque` int(11) NOT NULL,
  `tipo_envio` int(11) NOT NULL,
  `palavras` varchar(250) NOT NULL,
  `ativo` varchar(5) NOT NULL,
  `peso` double(8,2) DEFAULT NULL,
  `largura` int(11) DEFAULT NULL,
  `altura` int(11) DEFAULT NULL,
  `comprimento` int(11) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `valor_frete` decimal(8,2) DEFAULT NULL,
  `promocao` varchar(5) NOT NULL,
  `vendas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

INSERT INTO produtos VALUES("30","10","14","Cueca","cueca","Cueca |Box Cordoba","Cueca Box Cordoba","139.99","item-1.png","20","1","ssfs","Sim","0.00",NULL,NULL,NULL,NULL,"0.00","Não","2");
INSERT INTO produtos VALUES("32","13","16","Calcinha","calcinha","Calcinha ","Calcinha","70.00","item-3.png","30","3","Calcinha","Sim","0.00",NULL,NULL,NULL,NULL,"0.00","Não",NULL);
INSERT INTO produtos VALUES("33","10","15","Cuecas Femeninas","cuecas-femeninas",NULL,NULL,"159.99","cuecas-f.jpg","30","3",NULL,"Sim","0.00",NULL,NULL,NULL,NULL,"0.00","Não",NULL);


DROP TABLE IF EXISTS promocao_banner;

CREATE TABLE `promocao_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `ativo` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS promocoes;

CREATE TABLE `promocoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_final` date NOT NULL,
  `ativo` varchar(5) NOT NULL,
  `desconto` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO promocoes VALUES("2","31","30.00","2020-08-30","2020-09-01","Sim",NULL);
INSERT INTO promocoes VALUES("3","30","104.99","2020-08-31","2020-09-04","Sim","25");
INSERT INTO promocoes VALUES("4","29","35.00","2020-08-24","2020-09-02","Não",NULL);
INSERT INTO promocoes VALUES("5","28","50.00","2020-08-31","2020-09-08","Sim",NULL);
INSERT INTO promocoes VALUES("6","25","45.00","2020-09-02","2020-09-02","Sim","10");
INSERT INTO promocoes VALUES("7","24","42.50","2020-09-02","2020-09-04","Sim","15");
INSERT INTO promocoes VALUES("8","22","89.91","2020-09-02","2020-09-04","Sim","10");
INSERT INTO promocoes VALUES("9","18","170.99","2020-09-02","2020-09-02","Sim","10");


DROP TABLE IF EXISTS sub_categorias;

CREATE TABLE `sub_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `nome_url` varchar(50) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO sub_categorias VALUES("14","Cueca Masculina","cueca-masculina","item-1.png","10");
INSERT INTO sub_categorias VALUES("15","Cuecas Femeninas","cuecas-femeninas","item-2.png","10");
INSERT INTO sub_categorias VALUES("16","Calcinha","calcinha","item-3.png","13");


DROP TABLE IF EXISTS tipo_envios;

CREATE TABLE `tipo_envios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO tipo_envios VALUES("1","Correios");
INSERT INTO tipo_envios VALUES("2","Valor Fixo");
INSERT INTO tipo_envios VALUES("3","Sem Frete");
INSERT INTO tipo_envios VALUES("4","Digital");


DROP TABLE IF EXISTS usuarios;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(35) NOT NULL,
  `senha_crip` varchar(150) NOT NULL,
  `nivel` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO usuarios VALUES("1","Administrador","000.000.000-00","lojaportalhugo@gmail.com","123","202cb962ac59075b964b07152d234b70","Admin");
INSERT INTO usuarios VALUES("5","Alice Santos","000.000.000-40","alice@hotmail.com","123","202cb962ac59075b964b07152d234b70","Cliente");
INSERT INTO usuarios VALUES("6","Cliente Teste","000.000.000-10","cliente@hotmail.com","123","202cb962ac59075b964b07152d234b70","Cliente");
INSERT INTO usuarios VALUES("7","Matheus Silva","184.854.545-44","mateus@hotmail.com","123","202cb962ac59075b964b07152d234b70","Cliente");
INSERT INTO usuarios VALUES("8","Rozane da cruz salomao","141.496.458-76","ro@gmail.com","123456","e10adc3949ba59abbe56e057f20f883e","Cliente");


