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
        <li><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		<li><a href="viewProfessor.php" id="clique">Visualizar Professores</a></li>
        <li style="float:right">><a href="cadastrarProfessor.php"><span class="glyphicon glyphicon-save"></span> Cadatrar</a></li>
    </ul>
</div>


<div class="container">
<h2>Professores</h2>
<br>
<?php
	ini_set('display_errors', 1);
	$mysqli = new mysqli("localhost", "root", "teste", "tcc");
	$query = "SELECT idProfessor, nome, titulacao, curso, instituicao, area FROM professor ORDER BY nome";
	$result = $mysqli->query($query, MYSQLI_STORE_RESULT);
	echo "<table class='table table-striped table-responsive table-condensed'>";
	echo "<tr><th>Nome</th><th>Titulacao</th><th>Curso</th><th>Instituição</th><th>Área de Atuação</th><th>Ações</th></tr>";
	while (list($id, $nome, $titulacao, $curso, $instituicao, $area) = $result->fetch_row()) {
    	echo "<tr><td>$id</td><td>$nome</td><td>$titulacao</td><td>$curso</td><td>$instituicao</td><td>$area</td>";
    	echo "<td>
    	<a class='btn btn-default btn-sm' name ='edit' title='Editar' href='editarProfessor.php?id=$id'><i class='glyphicon glyphicon-edit'></i></a>
		<a class='btn btn-default btn-sm' name ='delet' title='Deletar' href='excluirProfessor.php?id=$id'><i class='glyphicon glyphicon-trash'></i></a></td>";
    	echo "<tr>";
	}
	echo "<tr><td colspan='3'>Total de registros</td><td>$mysqli->affected_rows</td></tr>";
	echo "</table>";
	$result->close();
?>
    <div class="">
        <a href="cadastrarProfessor.php" class="btn btn-success">Cadastrar</a>
    </div>
</div>
</body>
