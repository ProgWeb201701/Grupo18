CREATE TABLE cordenador(idCoordenador int, idProfessor int REFERENCES professor(idProfessor), PRIMARY KEY(idCoordenador));
CREATE TABLE orientador(idOrientador int, idProfessor int REFERENCES professor(idProfessor), PRIMARY KEY(idOrientador));
CREATE TABLE tcc (idTcc int, titulo varchar(45), tema varchar(1000), idAluno int REFERENCES aluno (idAluno), idCoordenador int REFERENCES cordenador(idCoordenador), PRIMARY KEY(idTcc));
