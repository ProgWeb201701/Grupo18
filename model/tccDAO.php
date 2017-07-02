<?php
include_once('./orientador.php');
include_once('./avaliador.php');
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
        $tcc = new TccDAO;
        $tcc->inserir_tcc();
        break;

    case 'edit':
        $tcc = new TccDAO;
        $tcc->editar_tcc();
        break;

    case 'delet':
        $tcc = new TccDAO;
        $tcc->deletar_tcc();
        break;

    default:
}

class TccDAO
{


    public function inserir_tcc()
    {
        $mysqli = new mysqli("localhost", "root", "teste", "tcc");
        $query = "INSERT INTO tcc SET titulo= ?,  tema= ?, idOrientador= ?, idAluno=?, idAvaliador=?";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('ssiii', $titulo, $tema, $idOrientador, $idAluno, $idAvaliador);
        $titulo = $_POST['titulo'];
        $tema = $_POST['tema'];
        $convert = new Orientador();
        $idOrientador = $convert->setId($_POST['idOrientador']);
        $idOrientador = $convert->save($mysqli);
        $idOrientador = $convert->findIdOrientador($mysqli);
        $idAluno = $_POST['idAluno'];
        $convertAva = new Avaliador();
        $idAvaliador = $convertAva->setId($_POST['idAvaliador']);
        $idAvaliador = $convertAva->save($mysqli);
        $idAvaliador = $convertAva->findIdAvaliador($mysqli);
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
        header("../../view/Tcc/cadastrarTCC.php");
    }

    public function editar_tcc()
    {
        $mysqli = new mysqli("localhost", "root", "teste", "tcc");
        $query = "UPDATE tcc SET titulo= ?,  tema= ?, idOrientador= ?, idAluno=?, idAvaliador=? WHERE idTcc=?";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('ssiiii', $titulo, $tema, $idOrientador, $idAluno, $idAvaliador, $id);
        $titulo = $_POST['titulo'];
        $id = $_POST['id'];
        $tema = $_POST['tema'];
        $convert = new Orientador();
        $idOrientador = $convert->setId($_POST['idOrientador']);
        $idOrientador = $convert->save($mysqli);
        $idOrientador = $convert->findIdOrientador($mysqli);
        $idAluno = $_POST['idAluno'];
        $convertAva = new Avaliador();
        $idAvaliador = $convertAva->setId($_POST['idAvaliador']);
        $idAvaliador = $convertAva->save($mysqli);
        $idAvaliador = $convertAva->findIdAvaliador($mysqli);
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
        header("../../view/Tcc/cadastrarTCC.php");
    }

    public function deletar_tcc()
    {

        $mysqli = new mysqli("localhost", "root", "teste", "tcc");
        $query = "DELETE FROM tcc WHERE idTcc=?";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('i', $id);
        $id = $_GET['id'];
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
       	//header("Location: ../view/Tcc/viewTCC.php");
    }
}
