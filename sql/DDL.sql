CREATE DATABASE tcc COLLATE utf8_general_ci;

USE tcc;

CREATE TABLE `areainteresse` (
  `codArea` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(45) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`codArea`)
)DEFAULT CHARSET=utf8;

CREATE TABLE `arquivo` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `arquivo` varchar(40) NOT NULL,
  `matricula` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
)DEFAULT CHARSET=utf8;

CREATE TABLE `avaliacao` (
  `idTcc` int(11) NOT NULL,
  `nota` float NOT NULL,
  `parecer` varchar(2000) NOT NULL,
  `comentarios` varchar(45),
  PRIMARY KEY (`idTcc`)
)DEFAULT CHARSET=utf8;

CREATE TABLE `avaliador` (
  `idProfessor` int(11) NOT NULL,
  PRIMARY KEY (`idProfessor`)
)DEFAULT CHARSET=utf8;


CREATE TABLE `curso` (
  `codCurso` int(11) NOT NULL AUTO_INCREMENT,
  `curso` varchar(45) NOT NULL,
  PRIMARY KEY (`codCurso`)
)DEFAULT CHARSET=utf8;

CREATE TABLE `instituicao` (
  `idInstituicao` int(11) NOT NULL AUTO_INCREMENT,
  `instituicao` varchar(45) NOT NULL,
  PRIMARY KEY (`idInstituicao`)
)DEFAULT CHARSET=utf8;

CREATE TABLE `orientador` (
  `idProfessor` int(11) NOT NULL
)DEFAULT CHARSET=utf8;

CREATE TABLE `orientando` (
  `matricula` int(11) NOT NULL,
  `nome` varchar(45) NULL,
  `curso` varchar(45) DEFAULT NULL,
  `instituicao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`matricula`)
)DEFAULT CHARSET=utf8;


CREATE TABLE `professor` (
  `siap` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `area` int(11) NOT NULL,
  `instituicao` int(11) DEFAULT NULL,
  `titulacao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`siap`)
)DEFAULT CHARSET=utf8;


CREATE TABLE `tcc` (
  `idTcc` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NULL,
  `tema` varchar(1000) NULL,
  `aluno` int(11) DEFAULT NULL,
  `idOrientador` int(11) DEFAULT NULL,
  `idAvaliador` int(11) NOT NULL,
  `idAvaliador2` int(11) NOT NULL,
  PRIMARY KEY (`idTcc`)
)DEFAULT CHARSET=utf8;

CREATE TABLE `titulacao` (
  `idTitulacao` int(11) NOT NULL AUTO_INCREMENT,
  `titulacao` varchar(45) NOT NULL,
  PRIMARY KEY (`idTitulacao`)
)DEFAULT CHARSET=utf8;

CREATE TABLE `usuario` (
  `user` varchar(45) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `niveldeacesso` tinyint(4) NOT NULL,
  PRIMARY KEY (`user`)
)DEFAULT CHARSET=utf8;
