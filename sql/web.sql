CREATE TABLE orientando(idAluno int AUTO_INCREMENT NOT NULL, nome varchar(45), matricula int, curso varchar(45), instituicao varchar(45), PRIMARY KEY(idAluno));
CREATE TABLE professor(idProfessor int AUTO_INCREMENT NOT NULL, nome varchar(45), email varchar(100), area VARCHAR(45), instituicao VARCHAR(45), titulacao varchar(45), PRIMARY KEY(idProfessor));
CREATE TABLE orientador(idOrientador int AUTO_INCREMENT NOT NULL, idProfessor int REFERENCES professor(idProfessor), PRIMARY KEY(idOrientador));
CREATE TABLE tcc (idTcc int AUTO_INCREMENT NOT NULL, titulo varchar(45), tema varchar(1000), idAluno int REFERENCES aluno (idAluno), idOrientador int REFERENCES orientador(idOrientador), PRIMARY KEY(idTcc));
