-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Jun-2023 às 23:51
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `nomeAluno` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `dataNascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id` int(11) NOT NULL,
  `nomeDisciplina` varchar(100) NOT NULL,
  `horascurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id`, `nomeDisciplina`, `horascurso`) VALUES
(1, 'Comunicação e Expressão', 120),
(2, 'Algoritmo ', 160),
(3, 'GSO', 100),
(4, 'Gestão de Pessoas', 100),
(5, 'Matemática Discreta', 80),
(6, 'Gestão Ambiental', 80),
(7, 'Engrenharia de Software', 120),
(8, 'Contabilidade', 80),
(9, 'Inglês', 120),
(10, 'Estatística', 80);

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula`
--

CREATE TABLE `matricula` (
  `id` int(11) NOT NULL,
  `nomeEstudante` varchar(100) NOT NULL,
  `dataMatricula` date DEFAULT NULL,
  `FK_aluno_id` int(11) DEFAULT NULL,
  `FK_disciplina_id` int(11) DEFAULT NULL,
  `FK_disciplina_id2` int(11) DEFAULT NULL,
  `FK_disciplina_id3` int(11) DEFAULT NULL,
  `FK_disciplina_id4` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `nomeProfessor` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `dataNascimento` date DEFAULT NULL,
  `FK_disciplina_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_disciplina_id` (`FK_disciplina_id`),
  ADD KEY `FK_disciplina_id2` (`FK_disciplina_id2`),
  ADD KEY `FK_disciplina_id3` (`FK_disciplina_id3`),
  ADD KEY `FK_disciplina_id4` (`FK_disciplina_id4`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_disciplina_id` (`FK_disciplina_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`FK_disciplina_id`) REFERENCES `disciplina` (`id`),
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`FK_disciplina_id2`) REFERENCES `disciplina` (`id`),
  ADD CONSTRAINT `matricula_ibfk_3` FOREIGN KEY (`FK_disciplina_id3`) REFERENCES `disciplina` (`id`),
  ADD CONSTRAINT `matricula_ibfk_4` FOREIGN KEY (`FK_disciplina_id4`) REFERENCES `disciplina` (`id`);

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`FK_disciplina_id`) REFERENCES `disciplina` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
