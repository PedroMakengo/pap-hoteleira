CREATE DATABASE hotel;

USE hotel;

CREATE TABLE tb_admin(
  id_admin INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  senha VARCHAR(255) NOT NULL,
  foto  VARCHAR(255) NOT NULL
)

INSERT INTO tb_admin (id_admin,nome, email, senha, foto ) 
VALUES (1, "Beny João", "beny@gmail.com", md5(md5(123)), "beny.jpg");

CREATE TABLE tb_hotel (
  id_hotel INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome_hotel VARCHAR(255) NOT NULL,
  email_hotel VARCHAR(255) NOT NULL,
  senha_hotel VARCHAR(255) NOT NULL,
  nif_hotel VARCHAR(10) NOT NULL,
  endereco_hotel VARCHAR(255) NOT NULL,
  cidade_hotel VARCHAR(255) NOT NULL,
  descricao_hotel TEXT,
  classificacao_hotel INT NOT NULL,
  num_quartos_hotel INT NOT NULL,
  servicos_hotel TEXT,
  telefone_hotel VARCHAR(20) NOT NULL,
  site_hotel VARCHAR(255),
  data_criacao_hotel DATETIME DEFAULT CURRENT_TIMESTAMP,
  data_atualizacao_hotel DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO (
id_hotel, nome_hotel, endereco_hotel, cidade_hotel, nif_hotel, 
descricao_hotel, classificacao_hotel,
num_quartos_hotel, servicos_hotel, telefone_hotel, email_hotel, 
senha_hotel, site_hotel, data_criacao_hotel, data_atualizacao_hotel
) VALUES ()




CREATE TABLE tb_hospedes (
    id_hospede INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome_hospede VARCHAR(255) NOT NULL,
    email_hospede VARCHAR(255) NOT NULL,
    senha_hospede VARCHAR(255) NOT NULL,
    foto_hospedes VARCHAR(255) NOT NULL,
    endereco_hospede VARCHAR(255) NOT NULL,
    cidade_hospede VARCHAR(255) NOT NULL,
    bi_hospede VARCHAR(15) NOT NULL,
    telefone_hospede VARCHAR(20) NOT NULL,
    data_nascimento_hospede DATE NOT NULL,
    data_criacao_hospede DATETIME DEFAULT CURRENT_TIMESTAMP,
    data_atualizacao_hospede DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE tb_quartos (
    id_quarto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tipo_quarto VARCHAR(50) NOT NULL,
    capacidade_quarto INT NOT NULL,
    preco_quarto DECIMAL(10, 2) NOT NULL,
    descricao_quarto TEXT,
    status_quarto VARCHAR(20) NOT NULL,
    foto_primeira_quarto VARCHAR(255) NOT NULL,
    foto_segunda_quarto VARCHAR(255) NOT NULL,
    status_quarto VARCHAR(20) NOT NULL,
    data_criacao_quarto DATETIME DEFAULT CURRENT_TIMESTAMP,
    data_atualizacao_quarto DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    id_hotel INT NOT NULL
    FOREIGN KEY (id_hotel) REFERENCES tb_hotel(id_hotel)
);

CREATE TABLE tb_historicos (
  id_historico_quarto INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_quarto INT NOT NULL,
  status_quarto_historico VARCHAR(20),
  data_criacao_quarto_historico DATETIME DEFAULT CURRENT_TIMESTAMP,
  data_atualizacao_quarto_historico DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)

CREATE TABLE tb_restaurante (
  id_restaurante INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_hotel INT NOT NULL,
  nome_restaurante VARCHAR (50) NOT NULL,
  descricao_restaurante TEXT,
  classificacao_restaurante INT NOT NULL,
  num_mesas_restaurante INT NOT NULL,
  data_criacao_restaurante DATETIME DEFAULT CURRENT_TIMESTAMP,
  data_atualizacao__restaurante DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (id_hotel) REFERENCES tb_hotel(id_hotel)
)

CREATE TABLE tb_mesas (
  id_mesa INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  id_restaurante INT NOT NULL,
  id_hotel   INT NOT NULL,
  nome_mesa VARCHAR(25) NOT NULL,
  tipo_mesa VARCHAR(25) NOT NULL,
  preco_mesa DECIMAL(10, 2) NOT NULL,
  status_mesa VARCHAR(50) NOT NULL,
  descricao_comida VARCHAR(255) NOT NULL, 
  descricao_bebidas VARCHAR(255) NOT NULL,
  data_criacao_mesa DATETIME DEFAULT CURRENT_TIMESTAMP,
  data_atualizacao__mesa DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (id_restaurante) REFERENCES tb_restaurante (id_restaurante)
  FOREIGN KEY (id_hotel) REFERENCES tb_hotel (id_hotel)
)

CREATE TABLE tb_mesa_reservas (
  id_reserva_mesa INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_mesa INT NOT NULL,
  id_hospede INT NOT NULL, 
  id_restaurante INT NOT NULL,
  data_checkin_mesa_reserva DATE NOT NULL,
  status_mesa_reserva VARCHAR(20) NOT NULL,
  comprovativo_mesa_reserva VARCHAR(255) NOT NULL,
  data_criacao_mesa_reserva DATETIME DEFAULT CURRENT_TIMESTAMP,
  data_atualizacao_mesa_reserva DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (id_mesa) REFERENCES tb_mesas (id_mesa),
  FOREIGN KEY (id_hospede) REFERENCES tb_hospedes(id_hospede),
  FOREIGN KEY (id_restaurante) REFERENCES tb_restaurante(id_restaurante),
)

CREATE TABLE tb_reservas (
    id_reserva INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_hospede INT NOT NULL,
    id_quarto INT NOT NULL,
    data_checkin_reserva DATE NOT NULL,
    data_checkout_reserva DATE NOT NULL,
    num_hospedes_reserva INT NOT NULL,
    preco_total_reserva DECIMAL(10, 2) NOT NULL,
    status_reservas_reserva VARCHAR(20) NOT NULL,
    comprovativo_reserva VARCHAR(255) NOT NULL,
    data_criacao_reserva DATETIME DEFAULT CURRENT_TIMESTAMP,
    data_atualizacao_reserva DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_hospede) REFERENCES tb_hospedes(id_hospede),
    FOREIGN KEY (id_quarto) REFERENCES tb_quartos(id_quarto)
);



INSERT INTO tb_hotel 
(
id_hotel,
nome_hotel, 
email_hotel,
senha_hotel,
nif_hotel,
endereco_hotel,
foto_hotel,
cidade_hotel,
descricao_hotel,
classificacao_hotel,
num_quartos_hotel,
servicos_hotel,
telefone_hotel,
site_hotel,
data_criacao_hotel,
data_atualizacao_hotel
) 
VALUES (
1,
"Epic Sana",
"epicsana@gmail.com",
md5(md5(123)),
"",
"",
"",
"",
"",
"",
"",
"",
"",
"",
now(),
now()
) 


INSERT INTO tb_reservas (
	id_reserva,
    id_hospede,
    id_quarto,
    data_checkin_reserva,
    data_checkout_reserva,
    num_hospedes_reserva,
    preco_total_reserva,
    status_quarto_reserva,
    comprovativo_reserva,
    data_criacao_reserva,
    data_atualizacao_reserva
)
VALUES (
	3, 
    1, 
    3,
    now(),
    now(),
    "2",
    "10.50",
    "Por verificar",
    "comprovativo.jpg",
    now(),
    now()
)



INSERT INTO tb_mesa_reservas (
	id_reserva_mesa,
    id_mesa,
    id_hospede,
    id_restaurante,
    data_checkin_mesa_reserva,
    status_mesa_reserva,
    comprovativo_mesa_reserva,
    data_criacao_mesa_reserva,
    data_atualizacao_mesa_reserva
)
VALUES (
	2,
    2, 
    1,
    1,
    NOW(),
    "Por verificar",
    "comprovativo.jpg",
    now(),
    now()
	
) 