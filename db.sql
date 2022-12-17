CREATE TABLE tb_privilegio(
    id_privilegio int(11) PRIMARY KEY AUTO_INCREMENT, 
    privilegio varchar(50)
);

INSERT INTO tb_privilegio (id_privilegio, privilegio) VALUES (1, "Admin");
INSERT INTO tb_privilegio (id_privilegio, privilegio) VALUES (2, "Universidade");
INSERT INTO tb_privilegio (id_privilegio, privilegio) VALUES (3, "Estudante");

CREATE TABLE tb_genero(
    id_genero int(11) PRIMARY KEY AUTO_INCREMENT, 
    genero varchar(50), 
    ab_genero varchar(50)
);



CREATE TABLE tb_provincia(
    id_provincia int(11) PRIMARY KEY AUTO_INCREMENT, 
    provincia varchar(50)
);

CREATE TABLE `tb_municipio` (
  `id_municipio` int(11) NOT NULL,
  `id_provincia_fk` int(11) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE tb_usuario (
    id_usuario int(11) PRIMARY KEY AUTO_INCREMENT, 
    id_privilegio_fk int(11),
    id_genero_fk int(11), 
    nome_usuario varchar(50), 
    email_usuario varchar(50), 
    senha_usuario varchar(50), 
    foto_usuario varchar(200), 
    num_bi_usuario varchar(20),
    data_registro_usuario datetime, 
    data_atualizacao_usuario datetime, 
    FOREIGN KEY (id_privilegio_fk) REFERENCES tb_privilegio(id_privilegio), 
    FOREIGN KEY (id_genero_fk) REFERENCES tb_genero(id_genero)
);

CREATE TABLE tb_universidade(
    id_universidade int(11) PRIMARY KEY AUTO_INCREMENT, 
    nome_universidade varchar(50), 
    email_universidade varchar(50), 
    senha_universidade varchar(50), 
    id_usuario_fk int(11),
    id_provincia_fk int(11), 
    dg_universidade varchar(50), 
    foto_universidade varchar(200), 
    ref_universidade varchar(50), 
    estado_universidade int(11),
    data_registro_universidade datetime,
    FOREIGN KEY (id_usuario_fk) REFERENCES tb_usuario(id_usuario),
    FOREIGN KEY (id_provincia_fk) REFERENCES tb_provincia(id_provincia)
);

CREATE TABLE tb_comentario(
    id_comentario int(11) PRIMARY KEY AUTO_INCREMENT, 
    nome varchar(50), 
    email varchar(50), 
    tel varchar(50), 
    mensagem text, 
    data_mensagem_registro datetime
);



CREATE TABLE tb_estudante(
    id_estudante int(11) PRIMARY KEY AUTO_INCREMENT, 
    nome varchar(50), 
    email varchar(50), 
    senha varchar(50), 
    foto  varchar(50), 
    id_genero_fk int(11), 
    id_universidade_fk int(11),
    num_bi varchar(50), 
    num_processo varchar(50), 
    data_registro_estudante datetime, 
    estado_estudante int(11),
    FOREIGN KEY (id_genero_fk) REFERENCES tb_genero(id_genero), 
    FOREIGN KEY (id_universidade_fk) REFERENCES tb_universidade(id_universidade)
);

CREATE TABLE tb_horario(
    id_horario int(11) PRIMARY KEY AUTO_INCREMENT, 
    id_usuario_fk int(11),
    id_universidade_fk int(11),
    ficheiro_horario varchar(200), 
    data_registro_horario datetime,
    estado_horario int(11),
    FOREIGN KEY (id_usuario_fk) REFERENCES tb_usuario(id_usuario),
    FOREIGN KEY (id_universidade_fk) REFERENCES tb_universidade(id_universidade)
);

CREATE TABLE tb_cursos(
    id_curso int(11) PRIMARY KEY AUTO_INCREMENT, 
    nome_curso varchar(50), 
    id_universidade_fk int(11), 
    id_usuario_fk int(11),
    data_registro_curso datetime,
    estado_curso int(11),
    FOREIGN KEY (id_universidade_fk) REFERENCES tb_universidade(id_universidade),
    FOREIGN KEY (id_usuario_fk) REFERENCES tb_usuario(id_usuario)
);

CREATE TABLE tb_anuncios(
    id_anuncio int(11) PRIMARY KEY AUTO_INCREMENT, 
    nome_anuncio varchar(50), 
    banner_anuncio varchar(200),
    descricao_anuncio text, 
    id_universidade_fk int(11),
    id_usuario_fk int(11),
    data_anuncio datetime,
    estado_anuncio int(11),
    FOREIGN KEY (id_universidade_fk) REFERENCES tb_universidade(id_universidade)
    FOREIGN KEY (id_usuario_fk) REFERENCES tb_usuario(id_usuario)
);

CREATE TABLE tb_comentario_anuncio(
    id_comentario_anuncio int(11) PRIMARY KEY AUTO_INCREMENT, 
    id_usuario_fk int(11), 
    id_anuncio_fk int(11),
    comentario_anuncio text, 
    data_registro_comentario_anuncio datetime, 
    FOREIGN KEY (id_usuario_fk) REFERENCES tb_usuario(id_usuario),
    FOREIGN KEY (id_anuncio_fk) REFERENCES tb_anuncios(id_anuncio)
);






CREATE TABLE tb_vagas_bolsa (
    id_vagas_bolsa int(11) PRIMARY KEY AUTO_INCREMENT, 
    id_usuario_fk int(11),
    id_universidade_fk int(11),
    nome_bolsa varchar(50), 
    num_vagas int(11), 
    num_vagas_disponiveis int(11), 
    data_inicio_candidatura date, 
    data_termino_candidatura date,
    data_registro_bolsa datetime,
    data_atualizar_bolsa datetime,
    FOREIGN KEY (id_usuario_fk) REFERENCES tb_usuario(id_usuario),
    FOREIGN KEY (id_universidade_fk) REFERENCES tb_universidade(id_universidade)
);


CREATE TABLE tb_candidatura_bolsa(
    id_candidato int(11) PRIMARY KEY AUTO_INCREMENT, 
    id_vagas_bolsa_fk int(11), 
    nome varchar(50), 
    email varchar(50),
    tel_candidato int(11),
    num_bi varchar(50),
    data_nascimento date,
    nome_pai varchar(50),
    nome_mae varchar(50),
    morada varchar(50),
    id_genero_fk int(11), 
    id_provincia_fk int(11), 
    media_conclusao_medio int(11),
    certificado varchar(200), 
    pedido_solicitacao varchar(200), 
    estado_candidatura int(11),
    FOREIGN KEY (id_genero_fk) REFERENCES tb_genero(id_genero),
    FOREIGN KEY (id_provincia_fk) REFERENCES tb_provincia(id_provincia),
    FOREIGN KEY (id_vagas_bolsa_fk) REFERENCES tb_vagas_bolsa(id_vagas_bolsa)
);