-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Mar-2021 às 11:07
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `universidade`
--



-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_privilegio`
--

CREATE TABLE `tb_privilegio` (
  `id_privilegio` int(11) NOT NULL,
  `privilegio` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_privilegio`
--

INSERT INTO `tb_privilegio` (`id_privilegio`, `privilegio`) VALUES
(1, 'Admin'),
(2, 'Universidade'),
(3, 'Estudante');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_genero`
--

CREATE TABLE `tb_genero` (
  `id_genero` int(11) NOT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `ab_genero` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_genero`
--

INSERT INTO `tb_genero` (`id_genero`, `genero`, `ab_genero`) VALUES
(1, 'Masculino', 'M'),
(2, 'Femenino', 'F'),
(3, 'Nenhum', 'U');

-- --------------------------------------------------------


--
-- Estrutura da tabela `tb_provincia`
--

CREATE TABLE `tb_provincia` (
  `id_provincia` int(11) NOT NULL,
  `provincia` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_provincia`
--

INSERT INTO `tb_provincia` (`id_provincia`, `provincia`) VALUES
(1, 'Luanda'),
(2, 'Malange'),
(3, 'Benguela');

-- --------------------------------------------------------


--
-- Estrutura da tabela `tb_municipio`
--

CREATE TABLE `tb_municipio` (
  `id_municipio` int(11) NOT NULL,
  `id_provincia_fk` int(11) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_municipio`
--

INSERT INTO `tb_municipio` (`id_municipio`, `id_provincia_fk`, `municipio`) VALUES
(1, 1, 'Viana'),
(2, 2, 'Testando'),
(3, 3, 'Vamos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_privilegio_fk` int(11) DEFAULT NULL,
  `id_genero_fk` int(11) DEFAULT NULL,
  `nome_usuario` varchar(50) DEFAULT NULL,
  `email_usuario` varchar(50) DEFAULT NULL,
  `senha_usuario` varchar(50) DEFAULT NULL,
  `foto_usuario` varchar(200) DEFAULT NULL,
  `num_bi_usuario` varchar(20) DEFAULT NULL,
  `data_registro_usuario` datetime DEFAULT NULL,
  `data_atualizacao_usuario` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `id_privilegio_fk`, `id_genero_fk`, `nome_usuario`, `email_usuario`, `senha_usuario`, `foto_usuario`, `num_bi_usuario`, `data_registro_usuario`, `data_atualizacao_usuario`) VALUES
(1, 1, 1, 'Eliseu Samuel', 'eliseusamuel@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'eliseu.jpg', '000000000LA023', '2021-03-14 22:11:32', NULL),
(13, 2, 3, 'ISUTIC', 'isutic@gmail.com.br', 'd9b1d7db4cd6e70935368a1efb10e377', '148625794_1083901872087940_6963125234282500321_o.jpg', '123', '2021-03-16 19:49:37', '2021-03-16 19:49:37'),
(16, 3, 2, 'Suzana Formosa 123', 'suzanaformosa@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', '116290991_307508153794531_3898211129808256702_n.jpg', '000212121923LA0', '2021-03-20 11:08:11', '2021-03-20 11:08:11'),
(17, 2, 3, 'António Agostinho Neto (UAN)', 'uan@gmail.com.br', 'd9b1d7db4cd6e70935368a1efb10e377', '153722468_717615605587208_720619213405624488_n.jpg', '123', '2021-03-23 09:27:57', '2021-03-23 09:27:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_universidade`
--

CREATE TABLE `tb_universidade` (
  `id_universidade` int(11) NOT NULL,
  `nome_universidade` varchar(50) DEFAULT NULL,
  `email_universidade` varchar(50) DEFAULT NULL,
  `senha_universidade` varchar(50) DEFAULT NULL,
  `id_usuario_fk` int(11) DEFAULT NULL,
  `id_provincia_fk` int(11) DEFAULT NULL,
  `id_municipio_fk` int(11) NOT NULL,
  `dg_universidade` varchar(50) DEFAULT NULL,
  `foto_universidade` varchar(200) DEFAULT NULL,
  `ref_universidade` varchar(50) DEFAULT NULL,
  `estado_universidade` int(11) DEFAULT NULL,
  `descricao_universidade` varchar(255) NOT NULL,
  `data_registro_universidade` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_universidade`
--

INSERT INTO `tb_universidade` (`id_universidade`, `nome_universidade`, `email_universidade`, `senha_universidade`, `id_usuario_fk`, `id_provincia_fk`, `id_municipio_fk`, `dg_universidade`, `foto_universidade`, `ref_universidade`, `estado_universidade`, `descricao_universidade`, `data_registro_universidade`) VALUES
(6, 'ISUTIC', 'isutic@gmail.com.br', 'd9b1d7db4cd6e70935368a1efb10e377', 1, 1, 1, 'José Domingos', '148625794_1083901872087940_6963125234282500321_o.jpg', '123', 1, 'Estamos apenas trabalhando nos testes', '2021-03-16 14:51:36'),
(7, 'António Agostinho Neto (UAN)', 'uan@gmail.com.br', 'd9b1d7db4cd6e70935368a1efb10e377', 1, 1, 1, 'André Pedro ', '153722468_717615605587208_720619213405624488_n.jpg', '123', 1, 'Testando as coisas que está se fazendo ', '2021-03-16 20:16:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cursos`
--

CREATE TABLE `tb_cursos` (
  `id_curso` int(11) NOT NULL,
  `nome_curso` varchar(50) DEFAULT NULL,
  `id_universidade_fk` int(11) DEFAULT NULL,
  `id_usuario_fk` int(11) DEFAULT NULL,
  `data_registro_curso` datetime DEFAULT NULL,
  `estado_curso` int(11) DEFAULT NULL,
  `descricao_curso` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_cursos`
--

INSERT INTO `tb_cursos` (`id_curso`, `nome_curso`, `id_universidade_fk`, `id_usuario_fk`, `data_registro_curso`, `estado_curso`, `descricao_curso`) VALUES
(1, 'Teste Medicina', 7, 2, '2021-03-17 11:38:17', 0, ' Curso de teste medicina da uan');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_vagas_bolsa`
--

CREATE TABLE `tb_vagas_bolsa` (
  `id_vagas_bolsa` int(11) NOT NULL,
  `id_usuario_fk` int(11) DEFAULT NULL,
  `id_universidade_fk` int(11) DEFAULT NULL,
  `nome_bolsa` varchar(50) DEFAULT NULL,
  `num_vagas` int(11) DEFAULT NULL,
  `num_vagas_disponiveis` int(11) DEFAULT NULL,
  `data_inicio_candidatura` date DEFAULT NULL,
  `data_termino_candidatura` date DEFAULT NULL,
  `data_registro_bolsa` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_vagas_bolsa`
--

INSERT INTO `tb_vagas_bolsa` (`id_vagas_bolsa`, `id_usuario_fk`, `id_universidade_fk`, `nome_bolsa`, `num_vagas`, `num_vagas_disponiveis`, `data_inicio_candidatura`, `data_termino_candidatura`, `data_registro_bolsa`) VALUES
(3, 13, 6, 'Testando 12345', 50, 50, '2021-05-02', '2022-10-02', '2021-03-17 09:34:52');

---------------------------------------------------------

--
-- Estrutura da tabela `tb_anuncios`
--

CREATE TABLE `tb_anuncios` (
  `id_anuncio` int(11) NOT NULL,
  `nome_anuncio` varchar(50) DEFAULT NULL,
  `banner_anuncio` varchar(200) DEFAULT NULL,
  `descricao_anuncio` text DEFAULT NULL,
  `id_universidade_fk` int(11) DEFAULT NULL,
  `id_usuario_fk` int(11) DEFAULT NULL,
  `data_anuncio` datetime DEFAULT NULL,
  `estado_anuncio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_anuncios`
--

INSERT INTO `tb_anuncios` (`id_anuncio`, `nome_anuncio`, `banner_anuncio`, `descricao_anuncio`, `id_universidade_fk`, `id_usuario_fk`, `data_anuncio`, `estado_anuncio`) VALUES
(1, 'Testando', '153722468_717615605587208_720619213405624488_n.jpg', 'Durante o trabalho estamos aqui vamos testar', 6, 13, '2021-03-17 10:47:43', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_candidatura_bolsa`
--

CREATE TABLE `tb_candidatura_bolsa` (
  `id_candidato` int(11) NOT NULL,
  `id_vagas_bolsa_fk` int(11) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tel_candidato` int(11) DEFAULT NULL,
  `num_bi` varchar(50) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `nome_pai` varchar(50) DEFAULT NULL,
  `nome_mae` varchar(50) DEFAULT NULL,
  `morada` varchar(50) DEFAULT NULL,
  `id_genero_fk` int(11) DEFAULT NULL,
  `id_provincia_fk` int(11) DEFAULT NULL,
  `media_conclusao_medio` int(11) DEFAULT NULL,
  `certificado` varchar(200) DEFAULT NULL,
  `estado_candidatura` int(11) DEFAULT NULL,
  `data_candidatura` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_candidatura_bolsa`
--

INSERT INTO `tb_candidatura_bolsa` (`id_candidato`, `id_vagas_bolsa_fk`, `nome`, `email`, `tel_candidato`, `num_bi`, `data_nascimento`, `nome_pai`, `nome_mae`, `morada`, `id_genero_fk`, `id_provincia_fk`, `media_conclusao_medio`, `certificado`, `estado_candidatura`, `data_candidatura`) VALUES
(1, 3, 'Manuel Santos', 'manuelsantosmanuel@gmail.com', 921520121, '123', '1999-02-02', 'Nuno Gomes', 'Maria Gomes ', 'Luanda', 1, 1, 14, '145395294_908790959856357_8866481749509435278_n.jpg', 1, '2021-03-17 21:13:13'),
(4, 3, 'Pedro Gouveia', 'pedroteste@gmail.com', 921538974, '123333333333333', '1999-02-02', 'Pedro Gouveia', 'Maria António', 'Cazenga - Luanda', 1, 1, 15, '145395294_908790959856357_8866481749509435278_n.jpg', 0, '2021-03-18 18:39:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_comentario`
--

CREATE TABLE `tb_comentario` (
  `id_comentario` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `mensagem` text DEFAULT NULL,
  `data_mensagem_registro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_comentario_anuncio`
--

CREATE TABLE `tb_comentario_anuncio` (
  `id_comentario_anuncio` int(11) NOT NULL,
  `id_universidade_fk` int(11) NOT NULL,
  `id_usuario_fk` int(11) DEFAULT NULL,
  `id_anuncio_fk` int(11) DEFAULT NULL,
  `comentario_anuncio` text DEFAULT NULL,
  `data_registro_comentario_anuncio` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_comentario_anuncio`
--

INSERT INTO `tb_comentario_anuncio` (`id_comentario_anuncio`, `id_universidade_fk`, `id_usuario_fk`, `id_anuncio_fk`, `comentario_anuncio`, `data_registro_comentario_anuncio`) VALUES
(1, 6, 16, 1, 'Testando o funcionamento da aplicação ', '2021-03-22 09:17:11');

-- --------------------------------------------------------



--
-- Estrutura da tabela `tb_estudante`
--

CREATE TABLE `tb_estudante` (
  `id_estudante` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `id_genero_fk` int(11) DEFAULT NULL,
  `id_universidade_fk` int(11) DEFAULT NULL,
  `num_bi` varchar(50) DEFAULT NULL,
  `tel` int(9) DEFAULT NULL,
  `data_registro_estudante` datetime DEFAULT NULL,
  `estado_estudante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_estudante`
--

INSERT INTO `tb_estudante` (`id_estudante`, `nome`, `email`, `senha`, `foto`, `id_genero_fk`, `id_universidade_fk`, `num_bi`, `tel`, `data_registro_estudante`, `estado_estudante`) VALUES
(1, 'Eliseu Manuel Santos Miguel', 'eliseusantosmanuel@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', NULL, 1, 6, '3434394', 923, '2021-03-16 15:52:09', 0),
(4, 'Suzana Formosa ', 'suzanaformosa@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', '116290991_307508153794531_3898211129808256702_n.jp', 2, 6, '0000121212', 921530232, '2021-03-20 09:43:23', 1);

-- --------------------------------------------------------


--
-- Estrutura da tabela `tb_horario`
--

CREATE TABLE `tb_horario` (
  `id_horario` int(11) NOT NULL,
  `id_usuario_fk` int(11) DEFAULT NULL,
  `id_universidade_fk` int(11) DEFAULT NULL,
  `ficheiro_horario` varchar(200) DEFAULT NULL,
  `data_registro_horario` datetime DEFAULT NULL,
  `estado_horario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_horario`
--

INSERT INTO `tb_horario` (`id_horario`, `id_usuario_fk`, `id_universidade_fk`, `ficheiro_horario`, `data_registro_horario`, `estado_horario`) VALUES
(1, 2, 7, NULL, '2021-03-17 10:00:33', 0);













--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_anuncios`
--
ALTER TABLE `tb_anuncios`
  ADD PRIMARY KEY (`id_anuncio`),
  ADD KEY `id_universidade_fk` (`id_universidade_fk`),
  ADD KEY `id_usuario_fk` (`id_usuario_fk`);

--
-- Índices para tabela `tb_candidatura_bolsa`
--
ALTER TABLE `tb_candidatura_bolsa`
  ADD PRIMARY KEY (`id_candidato`),
  ADD KEY `id_genero_fk` (`id_genero_fk`),
  ADD KEY `id_provincia_fk` (`id_provincia_fk`),
  ADD KEY `id_vagas_bolsa_fk` (`id_vagas_bolsa_fk`);

--
-- Índices para tabela `tb_comentario`
--
ALTER TABLE `tb_comentario`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Índices para tabela `tb_comentario_anuncio`
--
ALTER TABLE `tb_comentario_anuncio`
  ADD PRIMARY KEY (`id_comentario_anuncio`),
  ADD KEY `id_usuario_fk` (`id_usuario_fk`),
  ADD KEY `id_anuncio_fk` (`id_anuncio_fk`),
  ADD KEY `id_universidade_fk` (`id_universidade_fk`);

--
-- Índices para tabela `tb_cursos`
--
ALTER TABLE `tb_cursos`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `id_universidade_fk` (`id_universidade_fk`),
  ADD KEY `id_usuario_fk` (`id_usuario_fk`);

--
-- Índices para tabela `tb_estudante`
--
ALTER TABLE `tb_estudante`
  ADD PRIMARY KEY (`id_estudante`),
  ADD KEY `id_genero_fk` (`id_genero_fk`),
  ADD KEY `id_universidade_fk` (`id_universidade_fk`);

--
-- Índices para tabela `tb_genero`
--
ALTER TABLE `tb_genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Índices para tabela `tb_horario`
--
ALTER TABLE `tb_horario`
  ADD PRIMARY KEY (`id_horario`),
  ADD KEY `id_usuario_fk` (`id_usuario_fk`),
  ADD KEY `id_universidade_fk` (`id_universidade_fk`);

--
-- Índices para tabela `tb_municipio`
--
ALTER TABLE `tb_municipio`
  ADD PRIMARY KEY (`id_municipio`),
  ADD KEY `id_provincia_fk` (`id_provincia_fk`);

--
-- Índices para tabela `tb_privilegio`
--
ALTER TABLE `tb_privilegio`
  ADD PRIMARY KEY (`id_privilegio`);

--
-- Índices para tabela `tb_provincia`
--
ALTER TABLE `tb_provincia`
  ADD PRIMARY KEY (`id_provincia`);

--
-- Índices para tabela `tb_universidade`
--
ALTER TABLE `tb_universidade`
  ADD PRIMARY KEY (`id_universidade`),
  ADD KEY `tb_universidade_ibfk_1` (`id_usuario_fk`),
  ADD KEY `tb_universidade_ibfk_2` (`id_provincia_fk`),
  ADD KEY `id_municipio_fk` (`id_municipio_fk`);

--
-- Índices para tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_privilegio_fk` (`id_privilegio_fk`),
  ADD KEY `id_genero_fk` (`id_genero_fk`);

--
-- Índices para tabela `tb_vagas_bolsa`
--
ALTER TABLE `tb_vagas_bolsa`
  ADD PRIMARY KEY (`id_vagas_bolsa`),
  ADD KEY `id_usuario_fk` (`id_usuario_fk`),
  ADD KEY `id_universidade_fk` (`id_universidade_fk`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_anuncios`
--
ALTER TABLE `tb_anuncios`
  MODIFY `id_anuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_candidatura_bolsa`
--
ALTER TABLE `tb_candidatura_bolsa`
  MODIFY `id_candidato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_comentario`
--
ALTER TABLE `tb_comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_comentario_anuncio`
--
ALTER TABLE `tb_comentario_anuncio`
  MODIFY `id_comentario_anuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_cursos`
--
ALTER TABLE `tb_cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_estudante`
--
ALTER TABLE `tb_estudante`
  MODIFY `id_estudante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_genero`
--
ALTER TABLE `tb_genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_horario`
--
ALTER TABLE `tb_horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_municipio`
--
ALTER TABLE `tb_municipio`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_privilegio`
--
ALTER TABLE `tb_privilegio`
  MODIFY `id_privilegio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_provincia`
--
ALTER TABLE `tb_provincia`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_universidade`
--
ALTER TABLE `tb_universidade`
  MODIFY `id_universidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tb_vagas_bolsa`
--
ALTER TABLE `tb_vagas_bolsa`
  MODIFY `id_vagas_bolsa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_anuncios`
--
ALTER TABLE `tb_anuncios`
  ADD CONSTRAINT `tb_anuncios_ibfk_1` FOREIGN KEY (`id_universidade_fk`) REFERENCES `tb_universidade` (`id_universidade`),
  ADD CONSTRAINT `tb_anuncios_ibfk_2` FOREIGN KEY (`id_usuario_fk`) REFERENCES `tb_usuario` (`id_usuario`);

--
-- Limitadores para a tabela `tb_candidatura_bolsa`
--
ALTER TABLE `tb_candidatura_bolsa`
  ADD CONSTRAINT `tb_candidatura_bolsa_ibfk_1` FOREIGN KEY (`id_genero_fk`) REFERENCES `tb_genero` (`id_genero`),
  ADD CONSTRAINT `tb_candidatura_bolsa_ibfk_2` FOREIGN KEY (`id_provincia_fk`) REFERENCES `tb_provincia` (`id_provincia`),
  ADD CONSTRAINT `tb_candidatura_bolsa_ibfk_3` FOREIGN KEY (`id_vagas_bolsa_fk`) REFERENCES `tb_vagas_bolsa` (`id_vagas_bolsa`);

--
-- Limitadores para a tabela `tb_comentario_anuncio`
--
ALTER TABLE `tb_comentario_anuncio`
  ADD CONSTRAINT `tb_comentario_anuncio_ibfk_1` FOREIGN KEY (`id_usuario_fk`) REFERENCES `tb_usuario` (`id_usuario`),
  ADD CONSTRAINT `tb_comentario_anuncio_ibfk_2` FOREIGN KEY (`id_anuncio_fk`) REFERENCES `tb_anuncios` (`id_anuncio`),
  ADD CONSTRAINT `tb_comentario_anuncio_ibfk_3` FOREIGN KEY (`id_universidade_fk`) REFERENCES `tb_universidade` (`id_universidade`);

--
-- Limitadores para a tabela `tb_cursos`
--
ALTER TABLE `tb_cursos`
  ADD CONSTRAINT `tb_cursos_ibfk_1` FOREIGN KEY (`id_universidade_fk`) REFERENCES `tb_universidade` (`id_universidade`),
  ADD CONSTRAINT `tb_cursos_ibfk_2` FOREIGN KEY (`id_usuario_fk`) REFERENCES `tb_usuario` (`id_usuario`);

--
-- Limitadores para a tabela `tb_estudante`
--
ALTER TABLE `tb_estudante`
  ADD CONSTRAINT `tb_estudante_ibfk_1` FOREIGN KEY (`id_genero_fk`) REFERENCES `tb_genero` (`id_genero`),
  ADD CONSTRAINT `tb_estudante_ibfk_2` FOREIGN KEY (`id_universidade_fk`) REFERENCES `tb_universidade` (`id_universidade`);

--
-- Limitadores para a tabela `tb_horario`
--
ALTER TABLE `tb_horario`
  ADD CONSTRAINT `tb_horario_ibfk_1` FOREIGN KEY (`id_usuario_fk`) REFERENCES `tb_usuario` (`id_usuario`),
  ADD CONSTRAINT `tb_horario_ibfk_2` FOREIGN KEY (`id_universidade_fk`) REFERENCES `tb_universidade` (`id_universidade`);

--
-- Limitadores para a tabela `tb_municipio`
--
ALTER TABLE `tb_municipio`
  ADD CONSTRAINT `tb_municipio_ibfk_1` FOREIGN KEY (`id_provincia_fk`) REFERENCES `tb_provincia` (`id_provincia`);

--
-- Limitadores para a tabela `tb_universidade`
--
ALTER TABLE `tb_universidade`
  ADD CONSTRAINT `tb_universidade_ibfk_1` FOREIGN KEY (`id_usuario_fk`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_universidade_ibfk_2` FOREIGN KEY (`id_provincia_fk`) REFERENCES `tb_provincia` (`id_provincia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_universidade_ibfk_3` FOREIGN KEY (`id_municipio_fk`) REFERENCES `tb_municipio` (`id_municipio`);

--
-- Limitadores para a tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `tb_usuario_ibfk_1` FOREIGN KEY (`id_privilegio_fk`) REFERENCES `tb_privilegio` (`id_privilegio`),
  ADD CONSTRAINT `tb_usuario_ibfk_2` FOREIGN KEY (`id_genero_fk`) REFERENCES `tb_genero` (`id_genero`);

--
-- Limitadores para a tabela `tb_vagas_bolsa`
--
ALTER TABLE `tb_vagas_bolsa`
  ADD CONSTRAINT `tb_vagas_bolsa_ibfk_1` FOREIGN KEY (`id_usuario_fk`) REFERENCES `tb_usuario` (`id_usuario`),
  ADD CONSTRAINT `tb_vagas_bolsa_ibfk_2` FOREIGN KEY (`id_universidade_fk`) REFERENCES `tb_universidade` (`id_universidade`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
