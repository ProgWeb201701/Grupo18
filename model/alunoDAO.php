<?php

    //include_once 'C:/wamp64/www/Web/conexao.php';
    /**
    *
    */
//class AlunoDAO
//{
    //$conexao = new Conexao();
    //$conexao->conexao_banco();
    ini_set('display_errors', 1);

    //public function inserir_aluno()
    //{
        $mysqli = new mysqli("localhost","root","teste", "tcc");
        $query = "INSERT INTO orientando SET idAluno=NULL, nome= ?,  matricula= ?,  curso= ?,  instituicao= ?";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('siss', $nome, $matricula, $curso, $instituicao);
        $nome = $_POST['nome'];
        $matricula = $_POST['matricula'];
        $curso = $_POST['curso'];
        $instituicao = $_POST['instituicao'];
        $stmt->execute();
        $stmt->close();
        $mysqli->close();

    //}

   /* public function editar_aluno($id)
    {
        $query = "UPDATE aluno SET nome=?, matricula=?, curso=?, instituicao=? WHERE idAluno=?";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('sissi', $nome_aluno, $matricula, $curso, $instituicao, $id);
        $nome_aluno = $_POST['nome'];
        $matricula = $_POST['matricula'];
        $curso = $_POST['curso'];
        $instituicao = $_POST['instituicao'];
        $id = $_POST['idAluno'];
        $stmt->execute();
        $stmt->close();
        $conexao->close(); //fechando a conexão
    }

    public function deletar_aluno($id)
    {
        $query = "DELETE FROM aluno WHERE idAluno=?";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('i', $id);
        $id = $_GET['idAluno'];
        $stmt->execute();
        $stmt->close();
        $conexao->close(); //fechando a conexão
    }*/
//}
