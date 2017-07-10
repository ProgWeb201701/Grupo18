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
        $query = "INSERT INTO tcc SET titulo= ?,  tema= ?, idOrientador= ?, aluno=?, idAvaliador=?, idAvaliador2=?";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('ssiiii', $titulo, $tema, $idOrientador, $aluno, $idAvaliador, $idAvaliador2);
        $titulo = $_POST['titulo'];
        $tema = $_POST['tema'];
        $save = new Orientador();
        $idOrientador = $save->save($mysqli, $_POST['idOrientador']);
        $idOrientador = $_POST['idOrientador'];
        $aluno = $_POST['aluno'];
        $saveAva = new Avaliador();
        $idAvaliador = $saveAva->save($mysqli, $_POST['idAvaliador']);
        $idAvaliador = $_POST['idAvaliador'];
        $saveAva2 = new Avaliador();
        $idAvaliador2 = $saveAva2->save($mysqli, $_POST['idAvaliador2']);
        $idAvaliador2 = $_POST['idAvaliador2'];
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
        header("Location: ../view/Tcc/viewTCC.php");
    }

    public function editar_tcc()
    {   
        session_start();
        $idTcc = $_SESSION['idTcc'];
        $mysqli = new mysqli("localhost", "root", "teste", "tcc");
        $query = "UPDATE tcc SET titulo= ?,  tema= ?, idOrientador= ?, aluno=?, idAvaliador=?, idAvaliador2=? WHERE idTcc=$idTcc";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('ssiiii', $titulo, $tema, $idOrientador, $aluno, $idAvaliador, $idAvaliador2);
        $titulo = $_POST['titulo'];
        $tema = $_POST['tema'];
        $save = new Orientador();
        $idOrientador = $save->save($mysqli, $_POST['idOrientador']);
        $idOrientador = $_POST['idOrientador'];
        $aluno = $_POST['aluno'];
        $saveAva = new Avaliador();
        $idAvaliador = $saveAva->save($mysqli, $_POST['idAvaliador']);
        $idAvaliador = $_POST['idAvaliador'];
        $saveAva2 = new Avaliador();
        $idAvaliador2 = $saveAva->save($mysqli, $_POST['idAvaliador2']);
        $idAvaliador2 = $_POST['idAvaliador2'];
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
        header("Location: ../view/Tcc/viewTCC.php");
    }

    public function deletar_tcc()
    {
        session_start();
        $idTcc = $_SESSION['idTcc'];
        $mysqli = new mysqli("localhost", "root", "teste", "tcc");
        $query = "DELETE FROM tcc WHERE idTcc= $idTcc";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
       	header("Location: ../view/Tcc/viewTCC.php");
    }
}
