<?php

include_once('../data.base.connection/DBConnection.php');
include_once('../model/usuario.php');

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

      
}


class AlunoDAO
{ 
    
    public function inserir_aluno()
    {
        ini_set('display_errors', 1); 
        $connection = DBConnection::open();
        $query = "INSERT INTO orientando SET nome= ?,  matricula= ?,  curso= ?,  instituicao= ?";
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
        $senha = $_POST['senha'];
        $nivel = 1;
        $usuario = new Usuario();
        $usuario->inserirUsuario($matricula, $senha, $nivel);
        //$res = $usuario->find($matricula, $senha);
        
        header("Location: ../view/Login/login.html");
        

    }

    public function editar_aluno()
    {
        session_start();
        $user = $_SESSION['user'];
        ini_set('display_errors', 1);
        $connection = DBConnection::open();
        $query = "UPDATE orientando SET nome= ?, curso= ?,  instituicao= ? WHERE matricula=$user";
        $stmt = $connection->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('ssi', $nome, $curso, $instituicao);
        $nome = $_POST['nome'];
        $curso = $_POST['curso'];
        $instituicao = $_POST['instituicao'];
        $stmt->execute();
        $stmt->close();
        $connection->close();
    }

    public function deletar_aluno()
    {
        session_start();
        $user = $_SESSION['user'];
        $connection = DBConnection::open();
        $query = "DELETE FROM orientando WHERE matricula=$user";
        $stmt = $connection->stmt_init();
        $stmt->prepare($query);
        //$stmt->bind_param($id);
        //$id = $_GET['id'];
        $stmt->execute();
        $stmt->close();

        $query = "DELETE FROM usuario WHERE user=$user";
        $stmt = $connection->stmt_init();
        $stmt->prepare($query);
        $stmt->execute();
        $stmt->close();
        $connection->close();

        header("Location: ../logout.php");
    }
}