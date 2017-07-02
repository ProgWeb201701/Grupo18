<?php

include_once('../data.base.connection/DBConnection.php');

function get_post_action($name)
{
    $params = func_get_args();
    
    foreach ($params as $name) {
        if (isset($_POST[$name])) {
            return $name;
        }
    }
}

switch (get_post_action('save', 'edit', 'delet')) {
    case 'save':
        $aluno = new AlunoDao;
        $aluno->inserir_aluno();
        break;

    case 'edit':
        $aluno = new AlunoDao;
        $aluno->editar_aluno();
        break;

    case 'delet':
        $aluno = new AlunoDao;
        $aluno->deletar_aluno();
        break;

    default:
      
}


class AlunoDAO
{ 
    
    public function inserir_aluno()
    {
        ini_set('display_errors', 1);    
        $connection = DBConnection::open();
        

        $query2 = "INSERT INTO usuario SET idUsuario=NULL, user= ?, senha=?, niveldeacesso=?";
        $stmt = $connection->stmt_init();
        $stmt->prepare($query2);
        $stmt->bind_param('isi', $user, $senha, $niveldeacesso);
        $user = $_POST['matricula'];
        $senha = $_POST['senha'];
        $niveldeacesso = 1;
        $stmt->close();

        $query = "INSERT INTO orientando SET idAluno=NULL, nome= ?,  matricula= ?,  curso= ?,  instituicao= ?, idUsuario=?";
        $stmt->prepare($query);
        $stmt->bind_param('sissi', $nome, $matricula, $curso, $instituicao, $idUsuario);
        $nome = $_POST['nome'];
        $matricula = $_POST['matricula'];
        $curso = $_POST['curso'];
        $instituicao = $_POST['instituicao'];
        $idUsuario = $res;
        $stmt->execute();

        $stmt->close();
        $connection->close();
        //header("Location: ../view/Login/LoginView.html");
        

    }

    public function editar_aluno()
    {
        ini_set('display_errors', 1);
        $connection = DBConnection::open();
        $query = "UPDATE orientando SET nome= ?,  matricula= ?,  curso= ?,  instituicao= ? WHERE idAluno=?";
        $stmt = $connection->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('siss', $nome, $matricula, $curso, $instituicao);
        $nome = $_POST['nome'];
        $matricula = $_POST['matricula'];
        $curso = $_POST['curso'];
        $instituicao = $_POST['instituicao'];
        $stmt->execute();
        $stmt->close();
        $connection->close();
    }

    public function deletar_aluno()
    {
        $connection = DBConnection::open();
        $query = "DELETE FROM orientando WHERE idAluno=?";
        $stmt = $connection->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('i', $id);
        $id = $_GET['id'];
        $stmt->execute();
        $stmt->close();
        $connection->close();
    }
}