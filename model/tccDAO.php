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
        $tcc = new TccDao;
        $tcc->inserir_tcc();
        break;

    case 'edit':
        $tcc = new TccDao;
        $tcc->editar_tcc();
        break;

    case 'delet':
        $tcc = new TccDao;
        $tcc->deletar_tcc();
        break;

    default:
}

class TccDAO
{


    public function inserir_tcc()
    {
        $mysqli = new mysqli("localhost", "root", "teste", "tcc");
        $query = "INSERT INTO tcc SET idTcc=NULL, titulo= ?,  tema= ?, idOrientador= ?, idOrientando= ?";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('ssii', $titulo, $tema, $idOrientador, $idOrientando);
        $titulo = $_POST['titulo'];
        $tema = $_POST['tema'];
        $idOrientador = $_POST['idOrientador'];
        $idOrientando = $_POST['idOrientando'];
        $id = $_POST['idTcc'];
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
    }

    public function editar_tcc()
    {
        $mysqli = new mysqli("localhost", "root", "teste", "tcc");
        $query = "UPDATE tcc SET titulo=?, tema=? WHERE idTcc=?";
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        $stmt->bind_param('ssi', $titulo, $tema, $id);
        $titulo = $_POST['titulo'];
        $tema = $_POST['tema'];
        $id = $_POST['id'];
        $stmt->execute();
        $stmt->close();
        $mysqli->close();
        header("Location: ../view/viewTCC.php");
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
       	header("Location: ../view/viewTCC.php");
    }
}
