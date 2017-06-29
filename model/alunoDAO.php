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
        $mysqli = new mysqli("localhost","root","teste", "tcc");
        $query = "INSERT INTO orientando SET idAluno=NULL, nome= ?,  matricula= ?,  curso= ?,  instituicao= ?, senha= ?";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('sisss', $nome, $matricula, $curso, $instituicao, $senha);
        $nome = $_POST['nome'];
        $matricula = $_POST['matricula'];
        $curso = $_POST['curso'];
        $instituicao = $_POST['instituicao'];
        $senha = $_POST['senha'];
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
        header("Location: ../login.php");

    }

    public function editar_aluno($id)
    {
        ini_set('display_errors', 1);
        $mysqli = new mysqli("localhost","root","teste", "tcc");
        $query = "UPDATE orientando SET nome= ?,  matricula= ?,  curso= ?,  instituicao= ?, senha= ? WHERE idAluno=?";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('siss', $nome, $matricula, $curso, $instituicao);
        $nome = $_POST['nome'];
        $matricula = $_POST['matricula'];
        $curso = $_POST['curso'];
        $instituicao = $_POST['instituicao'];
        $senha = $_POST['senha'];
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
    }

    public function deletar_aluno($id)
    {
        $query = "DELETE FROM orientando WHERE idAluno=?";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('i', $id);
        $id = $_GET['id'];
        $stmt->execute();
        $stmt->close();
        $conexao->close(); //fechando a conexão
    }
}