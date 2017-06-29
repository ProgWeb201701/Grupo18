<?php

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
        $query = "INSERT INTO professor SET idProfessor=NULL, nome= ?,  instituicao= ?,  email= ?,  titulacao= ?, area=?, senha =?";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('ssssss', $nome, $instituicao, $email, $titulacao, $area, $senha);
        $nome = $_POST['nome'];
        $instituicao = $_POST['instituicao'];
        $email = $_POST['email'];
        $titulacao = $_POST['titulacao'];
        $area = $_POST['area'];
        $senha = $_POST['senha'];
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
        header("Location: ../login.php");
    }

    function editar_professor()
    {
        $mysqli = new mysqli("localhost", "root", "teste", "tcc");
        $query = "UPDATE professor SET nome= ?,  instituicao= ?,  email= ?,  titulacao= ?, area=?, senha=? WHERE idProfessor=?";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('sssssis', $nome, $instituicao, $email, $titulacao, $area_atuacao, $id, $senha);
        $nome = $_POST['nome'];
        $instituicao = $_POST['instituicao'];
        $email = $_POST['email'];
        $titulacao = $_POST['titulacao'];
        $area_atuacao = $_POST['area'];
        $id = $_POST['id'];
        $senha = $_POST['senha'];
        $stmt->execute();
        $stmt->close();
        $mysqli->close(); //fechando a conexão
    }

    function deletar_professor()
    {
        $mysqli = new mysqli("localhost", "root", "teste", "tcc");
        $query = "DELETE FROM professor WHERE idProfessor=?";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('i', $id);
        $id = $_GET['id'];
        $stmt->execute();
        $stmt->close();
        $mysqli->close(); //fechando a conexão
    }
}
