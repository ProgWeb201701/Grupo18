<?php
include_once('../../data.base.connection/DBConnection.php');
session_start();

if (isset($_FILES['arquivo'])) {
    $nome = $_FILES['arquivo']['name'];
    $nome = str_replace(" ", "_", $nome);
    $nome = str_replace("ç", "c", $nome);

    $diretorio = "../../comentarios/";

    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$nome)) {
        echo "Arquivo Submetido";
    } else {
        echo "Erro ao Submeter Arquivo";
    }

    $id = $_SESSION['idTcc'];
    $connection = DBConnection::open();
    $query = "INSERT INTO avaliacao SET idTcc= ?,  nota= ?,  parecer= ?, comentarios=?";
    $stmt = $connection->stmt_init();
    $stmt->prepare($query);
    $stmt->bind_param('isss', $idTcc, $nota, $parecer, $comentarios);
    $idTcc = $id;
    $nota = $_POST['nota'];
    $parecer = $_POST['parecer'];
    $comentarios = $nome;
    $stmt->execute();
    $stmt->close();
    $connection->close();  
    header("Location: ./avaliadorView.php");
            
} else {
    $id = $_SESSION['idTcc'];
    $connection = DBConnection::open();
    $query = "INSERT INTO avaliacao SET idTcc= ?,  nota= ?,  parecer= ?";
    $stmt = $connection->stmt_init();
    $stmt->prepare($query);
    $stmt->bind_param('iss', $idTcc, $nota, $parecer);
    $idTcc = $id;
    $nota = $_POST['nota'];
    $parecer = $_POST['parecer'];
    $stmt->execute();
    $stmt->close();
    $connection->close();
    header("Location: ./avaliadorView.php");
}
 
?>
