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
        <li><a href="cadastrarAluno.php"><span class="glyphicon glyphicon-save"></span> Cadatrar Aluno</a></li>
		<li><a href="../Professor/cadastrarProfessor.php"><span class="glyphicon glyphicon-save"></span> Cadatrar Professor</a></li>
		<li style="float:right">><a href="../Login/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
</div>


<div class="container">
<h2>Alunos</h2>
<br>
<?php
	ini_set('display_errors', 1);
	$mysqli = new mysqli("localhost", "root", "teste", "tcc");
	$query = "SELECT idAluno, nome, matricula, curso, instituicao FROM orientando ORDER BY nome";
	$result = $mysqli->query($query, MYSQLI_STORE_RESULT);
	echo "<table class='table table-striped table-responsive table-condensed'>";
	echo "<tr><th>ID</th><th>Nome</th><th>Matricula</th><th>Curso</th><th>Instituição</th><th>Ações</th></tr>";
	while (list($idAluno, $nome, $matricula, $curso, $instituicao) = $result->fetch_row()) {
    	echo "<tr><td>$idAluno</td><td>$nome</td><td>$matricula</td><td>$curso</td><td>$instituicao</td>";
    	echo "<td>
    	<a class='btn btn-default btn-sm' name ='edit' title='Editar' href='editarAluno.php?id=$idAluno'><i class='glyphicon glyphicon-edit'></i></a>
		<a class='btn btn-default btn-sm' name ='delet' title='Deletar' href='excluirAluno.php?id=$idAluno'><i class='glyphicon glyphicon-trash'></i></a></td>";
    	echo "<tr>";
	}
	echo "<tr><td colspan='3'>Total de registros</td><td>$mysqli->affected_rows</td></tr>";
	echo "</table>";
	$result->close();
?>
    <div class="">
        <a href="cadastrarAluno.php" class="btn btn-success">Cadastrar</a>
    </div>
</div>
</body>
