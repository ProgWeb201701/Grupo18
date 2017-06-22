<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8"/>
	<meta charset="utf-8">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../estilo.css">
	<script src="../js/jquery.js" type="text/javascript"></script>
</head>
<body>

<div class="navbar">
    <ul>
        <li><a href="home.php">Home</a></li>
        <li style="float:right"><a href="cadastrarTCC.php">Cadastrar TCC</a></li>
		<li style="float:right"><a href="#">Visualizar TCC</a></li>
        <li style="float:right"><a href="#" id="clique">Acompanhar Avaliação</a></li>
    </ul>
</div>


<div class="container">
<h2>TCC</h2>
<br>
<?php
	ini_set('display_errors', 1);
	$mysqli = new mysqli("localhost", "root", "teste", "tcc");
	$query = "SELECT idTcc, titulo, tema, idAluno, idOrientador FROM tcc ORDER BY tema";
	$result = $mysqli->query($query, MYSQLI_STORE_RESULT);
	echo "<table class='table table-striped table-responsive table-condensed'>";
	echo "<tr><th>ID</th><th>Titulo</th><th>Tema</th><th>Orientando</th><th>Orientador</th><th>Ações</th></tr>";
	while (list($idTcc, $titulo, $tema, $idAluno, $idOrientador) = $result->fetch_row()) {
    	echo "<tr><td>$idTcc</td><td>$titulo</td><td>$tema</td><td>$idAluno</td><td>$idOrientador</td>";
    	echo "<td>
    	<a class='btn btn-default btn-sm' title='Editar' href='edit.php?id=$idTcc'><i class='glyphicon glyphicon-edit'></i></a>
		<a class='btn btn-default btn-sm' title='Excluir' href='delete.php?id=$idTcc'><i class='glyphicon glyphicon-trash'></i></a></td>";
    	echo "<tr>";
	}
	echo "<tr><td colspan='3'>Total de registros</td><td>$mysqli->affected_rows</td></tr>";
	echo "</table>";
	$result->close();
?>
    <div class="">
        <a href="cadastrarTCC.php" class="btn btn-success">Cadastrar</a>
    </div>
</div>
</body>
