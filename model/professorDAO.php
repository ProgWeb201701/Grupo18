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
        $prof = new ProfessorDao;
        $prof->inserir_professor();
        break;

    case 'edit':
        $prof = new ProfessorDao;
        $prof->editar_professor();
        break;

    case 'delet':
        $prof = new ProfessorDao;
        $prof->deletar_professor();
        break;

    default:
}

class ProfessorDAO
{

    function inserir_professor()
    {
        $mysqli = new mysqli("localhost", "root", "teste", "tcc");
        $query = "INSERT INTO professor SET siap= ?, nome= ?,  instituicao= ?,  email= ?,  titulacao= ?, area=?";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('isssss', $siap, $nome, $instituicao, $email, $titulacao, $area);
        $siap = $_POST['siap'];
        $nome = $_POST['nome'];
        $instituicao = $_POST['instituicao'];
        $email = $_POST['email'];
        $titulacao = $_POST['titulacao'];
        $area = $_POST['area'];
        $stmt->execute();
        $stmt->close();
        $mysqli->close();

        $senha = $_POST['senha'];
        $nivel = 2;
        $usuario = new Usuario();
        $usuario->inserirUsuario($siap, $senha, $nivel);
        header("Location: ../view/Login/login.html");
    }

    function editar_professor()
    {
        session_start();
        $user = $_SESSION['user'];
        $mysqli = new mysqli("localhost", "root", "teste", "tcc");
        $query = "UPDATE professor SET nome= ?,  instituicao= ?,  email= ?,  titulacao= ?, area=? WHERE siap=$user";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('sissi', $nome, $instituicao, $email, $titulacao, $area);
        $nome = $_POST['nome'];
        $instituicao = $_POST['instituicao'];
        $email = $_POST['email'];
        $titulacao = $_POST['titulacao'];
        $area = $_POST['area'];
        $stmt->execute();
        $stmt->close();
        $mysqli->close(); //fechando a conexão
        header("Location: ../view/Professor/editarUsuario.php");
    }

    function deletar_professor()
    {

        session_start();
        $user = $_SESSION['user'];
        $connection = DBConnection::open();
        $query = "DELETE FROM professor WHERE siap=$user";
        $stmt = $connection->stmt_init();
        $stmt->prepare($query);
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
