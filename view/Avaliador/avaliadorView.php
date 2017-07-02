<?php

$connection = new mysqli("localhost", "root", "teste", "tcc");

$consulta = mysqli_query($connection, "SELECT * FROM `arquivo` ORDER BY `arquivo` ASC");
if ($resultado = mysqli_fetch_array($consulta)){
    do {
        $res = "<a href=\"" . "../upload/". $resultado["arquivo"] . "\">" . $resultado["arquivo"] . "</a><br />";
        }
    while($resultado = mysqli_fetch_array($consulta));
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8"/>
	<meta charset="utf-8">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<script src="../js/jquery.js" type="text/javascript"></script>
</head>
<body>

<div class="navbar">
    <ul>
    </ul>
</div>


<div class="container">
<h2>TCC</h2>
<br>
<?php
	ini_set('display_errors', 1);
	$mysqli = new mysqli("localhost", "root", "teste", "tcc");
	$query = "SELECT * FROM arquivo ORDER BY arquivo";
	$result = $mysqli->query($query, MYSQLI_STORE_RESULT);
	echo "<table class='table table-striped table-responsive table-condensed'>";
	echo "<tr><th>ID</th><th>Titulo</th><th>TCC</th><th>Ações</th></tr>";
	while (list($id, $titulo) = $result->fetch_row()) {
    	echo "<tr><td>$id</td><td>$titulo</td><td>$res</td>";
    	echo"<td>
    	<a class='btn btn-default btn-sm' name ='edit' title='Editar' href='editarTCC.php?id=$id'><i class='glyphicon glyphicon-edit'></i></a>
		<a class='btn btn-default btn-sm' method='POST' name ='delet' title='Deletar' href='excluirTCC.php?id=$id'><i class='glyphicon glyphicon-trash'></i></a></td>";
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
