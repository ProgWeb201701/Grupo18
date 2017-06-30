CREATE TABLE `arquivo` (
  `codigo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `arquivo` varchar(40) NOT NULL,
  `dataArq` datetime NOT NULL
);



CREATE TABLE `orientador` (
  `idOrientador` int(11) NOT NULL,
  `idProfessor` int(11) NOT NULL,
    PRIMARY KEY(idOrientador, idProfessor)
);

CREATE TABLE `orientando` (
  `idAluno` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `matricula` int(11) DEFAULT NULL,
  `curso` varchar(45) DEFAULT NULL,
  `instituicao` varchar(45) DEFAULT NULL
);

CREATE TABLE `professor` (
  `idProfessor` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `area` varchar(45) DEFAULT NULL,
  `instituicao` varchar(45) DEFAULT NULL,
  `titulacao` varchar(45) DEFAULT NULL
);

CREATE TABLE `tcc` (
  `idTcc` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `tema` varchar(1000) DEFAULT NULL,
  `idAluno` int(11) DEFAULT NULL,
  `idOrientador` int(11) DEFAULT NULL
);

